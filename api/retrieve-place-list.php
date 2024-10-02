<?php
    header('Content-Type: application/json');

    include '../connection.php';

    $response = [];
    $errors = [];

    try {
        $sql = "SELECT id, short_address, latitude, longitude, name FROM libraries ORDER BY date_added DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $places = [];
            while ($row = $result->fetch_assoc()) {
                $library_id = $row['id'];

                $preview_image_sql = "SELECT file_path FROM library_images WHERE library_id = '$library_id' LIMIT 1";
                $preview_image_res = $conn->query($preview_image_sql);

                $image_row = $preview_image_res->fetch_assoc();
                $row['preview_image_file_path'] = $image_row['file_path'];
                
                $places[] = $row;
            }

            $response['success'] = true;
            $response['places'] = $places;
        } else {
            $response['success'] = false;
            $response['message'] = "No libraries found";
        }
    } catch (Exception $e) {
        $errors['db_err'] = "An error has occurred in retrieving data";
        $response['success'] = false;
        $response['errors'] = $errors;
    }

    $conn->close();

    echo json_encode($response);
?>