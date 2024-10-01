<?php
    session_start();

    header('Content-Type: application/json');
    $response = [];

    if (isset($_SESSION['username'])) {
        $response['redirect'] = true;
        $response['url'] = '/booknmap/';
        echo json_encode($response);
        exit;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $errors = [];
    $username = $password = "";
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['username'])) {
            $errors['cred_error'] = "Please fill in all the fields above.";
        } else {
            $username = test_input($_POST['username']);
        }

        if (empty($_POST['password'])) {
            $errors['cred_error'] = "Please fill in all the fields above.";
        } else {
            $password = test_input($_POST['password']);
        }

        if (empty($errors)) {
            include '../connection.php';

            $sql = "SELECT username, password FROM users WHERE username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                if (password_verify($password, $row['password'])) {
                    $_SESSION['username'] = $row['username'];
                    $response['success'] = true;
                    $response['url'] = '/booknmap/';
                    echo json_encode($response);
                    exit;
                } else{ 
                    $errors['cred_error'] = "Incorrect username/password";
                }
            } else {
                $errors['cred_error'] = "Incorrect username/password";
            }

            $conn->close();
        }
    }

    $response['success'] = false;
    $response['errors'] = $errors;
    echo json_encode($response);
    exit;
?>