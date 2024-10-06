<?php
session_start();
header('Content-Type: application/json');

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function generate_uuid()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff), // 32 bits for "time_low"
        mt_rand(0, 0xffff), // 16 bits for "time_mid"
        mt_rand(0, 0x0fff) | 0x4000, // 16 bits for "time_hi_and_version", four most significant bits are for version 4
        mt_rand(0, 0x3fff) | 0x8000, // 16 bits, 8 bits for "clk_seq_hi_res", 8 bits are for "clk_seq_low"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff) // 48 bits for "node"
    );
}

$response = [];
$errors = [];

$library_id = "";
$location_address = $name = $about = $amenities_string = "";
$short_address = $latitude = $longitude = "";

$existing_images = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit_place'])) {
    if ($_POST['library_id'] == "") {
        $library_id = generate_uuid();
    } else {
        $library_id = $_POST['library_id'];
    }

    if (empty($_POST['location_address'])) {
        $errors['location_err'] = "Please specify a location";
    } else {
        $location_address = test_input($_POST['location_address']);
        $short_address = test_input($_POST['short_address']);
        $latitude = test_input($_POST['latitude']);
        $longitude = test_input($_POST['longitude']);
    }

    if (empty($_POST['place_name'])) {
        $errors['name_err'] = "Name is required";
    } else {
        $name = test_input($_POST['place_name']);
    }

    if (!empty($_POST['place_about'])) {
        $about = test_input($_POST['place_about']);
    }

    $existing_images = json_decode($_POST['existing_images'], true);
    $existing_images = $existing_images ? $existing_images : [];
    if (!isset($_FILES['place_images']) || $_FILES['place_images']['error'][0] === UPLOAD_ERR_NO_FILE) {
        if (empty($existing_images)) {
            $errors['images_err'] = "Images are required";
        }
    }
    if (!empty($existing_images)) {
        $existing_images = json_decode($_POST['existing_images'], true);
    }

    if (!empty($_POST['amenities'])) {
        // Sanitize each amenity input and remove empty values
        $amenities = array_map('test_input', $_POST['amenities']);

        // Filter out any empty or blank amenities
        $amenities = array_filter($amenities, function ($value) {
            return !empty(trim($value)); // Remove values that are empty or just spaces
        });

        // Check if there are any valid amenities left
        if (!empty($amenities)) {
            // Convert the array to a comma-separated string
            $amenities_string = implode(", ", $amenities);
        } else {
            $errors['amenities_err'] = "All amenities are blank. Please provide valid amenities.";
        }
    } else {
        $errors['amenities_err'] = "Amenities are required";
    }

    if (empty($errors)) {
        include '../connection.php';

        // Set destination folder
        $base_dir = "../uploads/libraries/";
        $library_dir = $base_dir . (string)$library_id . "/";

        try {
            if (!is_dir($library_dir)) {
                mkdir($library_dir, 0755, true);
            }
        } catch (Exception $e) {
            $response['success'] = false;
            $response['errors']['images_err'] = "Error creating directory: " . $e->getMessage();
            echo json_encode($response);
            exit;
        }

        $username = $_SESSION['username'];

        // Save place details:
        try {
            if ($_POST['library_id'] != "") {
                $sql = "UPDATE libraries SET 
                            location_address = '$location_address',
                            short_address = '$short_address',
                            latitude = '$latitude',
                            longitude = '$longitude',
                            name = '$name',
                            about = '$about',
                            amenities = '$amenities_string',
                            username = '$username',
                            date_updated = CURRENT_TIMESTAMP
                        WHERE id = '$library_id'";
            } else {
                $sql = "INSERT INTO libraries(id, location_address, short_address, latitude, longitude, name, about, amenities, username)
                        VALUES('$library_id', '$location_address', '$short_address', '$latitude', '$longitude', '$name', '$about', '$amenities_string', '$username')";
            }

            $conn->query($sql);
        } catch (Exception $e) {
            $errors['db_err'] = "Couln't save place details: " . $conn->error;
            $response['success'] = false;
            $response['errors'] = $errors;
            echo json_encode($response);
            exit;
        }

        // Update existing images (if applicable)
        if ($_POST['library_id'] != "") {
            try {
                $sql = "SELECT file_path FROM library_images WHERE library_id = '$library_id'";
                $result = $conn->query($sql);

                $original_images = [];
                while ($row = $result->fetch_assoc()) {
                    $original_images[] = $row['file_path'];
                }

                $deleted_images = array_diff($original_images, $existing_images);

                foreach ($deleted_images as $image_path) {
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }

                    $sql = "DELETE FROM library_images WHERE file_path = '$image_path'";
                    $conn->query($sql);
                }
            } catch (Exception $e) {
                $errors['db_err'] = "Couldn't process existing images: " . $conn->error;
                $response['success'] = false;
                $response['errors'] = $errors;
                echo json_encode($response);
                exit;
            }
        }

        // Save new place images:
        $total_files = count($_FILES['place_images']['name']);

        for ($i = 0; $i < $total_files; $i++) {
            $fileName = test_input($_FILES['place_images']['name'][$i]);
            $fileTmpName = $_FILES['place_images']['tmp_name'][$i];
            $fileSize = $_FILES['place_images']['size'][$i];
            $fileError = $_FILES['place_images']['error'][$i];

            if ($fileName == "") {
                continue;
            }

            // Make sure there's no error in file upload
            if ($fileError === 0) {
                // Generate unique name for the file
                $fileNewName = uniqid('', true) . "_" . $fileName;
                $fileDestination = $library_dir . $fileNewName;

                // Move the file to the destination folder and save file paths in db
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $sql = "INSERT INTO library_images(file_path, library_id)
                                VALUES('$fileDestination', '$library_id')";

                    if (!$conn->query($sql)) {
                        $conn->close();

                        $errors['db_err'] = "Database error on image upload: " . $conn->error;
                        $response['success'] = false;
                        $response['errors'] = $errors;
                        echo json_encode($response);
                        exit;
                    }
                }
            } else {
                $conn->close();

                $errors['images_err'] = "Error uploading $fileName";
                $response['success'] = false;
                $response['errors'] = $errors;
                echo json_encode($response);
                exit;
            }
        }

        $conn->close();

        $response['success'] = true;
        echo json_encode($response);
        exit;
    }
}

$response['success'] = false;
$response['errors'] = $errors;
echo json_encode($response);
exit;
