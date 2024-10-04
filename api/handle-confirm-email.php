<?php
session_start();

header('Content-Type: application/json');
$response = [];

if (isset($_SESSION['register_form_data'])) {
    $register_form_data = $_SESSION['register_form_data'];
    $email = $register_form_data['email'];

    $response['email'] = $email;
}

if (isset($_SESSION['username'])) {
    $response['redirect'] = true;
    $response['url'] = '/booknmap/';
    echo json_encode($response);
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../connection.php';

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

$errors = [];

// Verify Email Form - Resend Code
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['resend_code'])) {

    require '../vendor/autoload.php'; // Use Composer autoloader

    $mail = new PHPMailer(true);

    try {
        // Add new verification code
        $verification_code = rand(100000, 999999);
        $expires_at = date("Y-m-d H:i:s", strtotime("+10 minutes"));
        $sql = "INSERT INTO verification_codes(email, code, expires_at) 
                    VALUES('$email', '$verification_code', '$expires_at')";
        $result = $conn->query($sql);

        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'markjasongalang.work@gmail.com';
        $mail->Password   = 'hehh yaxi bpnv fwqy';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('markjasongalang.work@gmail.com', 'Book n\' Map Mailer');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Book n\' Map: Here is your new verification code';
        $mail->Body    = "This is your code: <b>$verification_code</b><br>Note: The code will expire after 10 mins.";
        $mail->AltBody = "This is your code: $verification_code";

        $mail->send();

        $response['new_code_success'] = true;
        $response['status'] = "A new verification code has been sent to your email";
        echo json_encode($response);
        exit;
    } catch (Exception $e) {
        $errors['new_code_err'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Verify Email Form - Continue
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['continue'])) {
    if (empty($_POST['verification_code'])) {
        $errors['verif_code_err'] = "Please type the verification code first";
    } else {

        $sql = "SELECT code, expires_at FROM verification_codes WHERE email = '$email' AND is_verified = 0 ORDER BY expires_at DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_code = $row['code'];
            $expires_at = $row['expires_at'];

            $current_time = date("Y-m-d H:i:s");
            $input_code = test_input($_POST['verification_code']);

            if ($input_code == $stored_code && $current_time <= $expires_at) {
                // Update is_verified
                $sql = "UPDATE verification_codes SET is_verified = 1 WHERE code = '$stored_code' AND email = '$email' AND is_verified = 0 ORDER BY expires_at DESC LIMIT 1";
                $result = $conn->query($sql);

                $id = generate_uuid();
                $first_name = $register_form_data['first_name'];
                $last_name = $register_form_data['last_name'];
                $email = $register_form_data['email'];
                $username = $register_form_data['username'];
                $password = $register_form_data['password'];
                $terms_privacy_accepted = 0;
                if ($register_form_data['agree_cb'] == "accepted") {
                    $terms_privacy_accepted = 1;
                }

                // Store user in database
                $sql = "INSERT INTO users(id, first_name, last_name, email, username, password, terms_privacy_accepted)
                            VALUES('$id','$first_name', '$last_name', '$email', '$username', '$password', $terms_privacy_accepted)";
                $result = $conn->query($sql);

                $_SESSION['username'] = $username;
                $response['verif_code_success'] = true;
                $response['url'] = '/booknmap/';
                echo json_encode($response);
                exit;
            } else if ($expires_at <= $current_time) {
                $errors['verif_code_err'] = "Verification code has expired. Please resend code";
            } else {
                $errors['verif_code_err'] = "Incorrect verification code.";
            }
        } else {
            $errors['verif_code_err'] = "No verification code found for this email.";
        }
    }
}

// Update Email Form
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_email'])) {
    if (empty($_POST['new_email'])) {
        $errors['update_email_err'] = "Please provide an email";
    } else {
        $new_email = test_input($_POST['new_email']);

        if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
            $errors['update_email_err'] = "Invalid email format";
        } else {
            $_SESSION['register_form_data']['email'] = $new_email;

            $response['update_email_success'] = true;
            $response['new_email'] = $new_email;
            echo json_encode($response);
            exit;
        }
    }
}

$response['success'] = false;
$response['errors'] = $errors;
echo json_encode($response);
