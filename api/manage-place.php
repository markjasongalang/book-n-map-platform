<?php
    header('Content-Type: application/json');

    $location = $name = $amenities_string = "";
    $short_address = $latitude = $longitude = "";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['location_address'])) {
            $errors['location_err'] = "Please specify a location";
        } else {
            $location = test_input($_POST['location_address']);
            $short_address = test_input($_POST['short_address']);
            $latitude = test_input($_POST['latitude']);
            $longitude = test_input($_POST['longitude']);
        }

        if (empty($_POST['place_name'])) {
            $errors['name_err'] = "Name is required";
        } else {
            $name = test_input($_POST['place_name']);
        }

        if (!isset($_FILES['place_images']) || $_FILES['place_images']['error'][0] === UPLOAD_ERR_NO_FILE) {
            $errors['images_err'] = "Images are required";
        }

        if (!empty($_POST['amenities'])) {
            // Sanitize each amenity input and remove empty values
            $amenities = array_map('test_input', $_POST['amenities']);

            // Filter out any empty or blank amenities
            $amenities = array_filter($amenities, function($value) {
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
            // Save place images:
            $total_files = count($_FILES['place_images']['name']);
            
            for ($i = 0; $i < $total_files; $i++) {
                $fileName = $_FILES['place_images']['name'][$i];
                $fileTmpName = $_FILES['place_images']['tmp_name'][$i];
                $fileSize = $_FILES['place_images']['size'][$i];
                $fileError = $_FILES['place_images']['error'][$i];
                
                // Set destination folder
                $uploadDir = "uploads/";

                // Make sure there's no error in file upload
                if ($fileError === 0) {
                    // Generate unique name for the file
                    $fileNewName = uniqid('', true) . "_" . $fileName;
                    $fileDestination = $uploadDir . $fileNewName;

                    // Move the file to the destination folder
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        // TODO: Save to database
                    }
                } else {
                    $errors['images_err'] = "Error uploading $fileName";
                }
            }

            // Save all the other details:
            
        }
    }

    echo json_encode($errors);
?>