<?php
header('Content-Type: application/json');

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$response = [];
$errors = [];

$email = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['newsletter_subscribe'])) {
    if (empty($_POST['email'])) {
        $errors['email_err'] = "No email provided";
    } else {
        $email = test_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email_err'] = "Not a valid email";
        }
    }

    if (empty($errors)) {
        include '../connection.php';

        try {
            $sql = "INSERT INTO newsletter_subs(email) VALUES('$email')";
            $conn->query($sql);

            $response['success'] = true;
            $response['message'] = "Thank you for subscribing!";
            echo json_encode($response);
            exit;
        } catch (Exception $e) {
            $errors['db_err'] = "Couldn't save email. Please try again later :)";
        }

        $conn->close();
    }
}
$response['success'] = false;
$response['errors'] = $errors;
echo json_encode($response);
