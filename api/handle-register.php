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

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Don't forget to check the file path
    include '../connection.php';

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $errors = [];
    $first_name = $last_name = $email = $username = $password = $confirm_pass = $agree_cb = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['first_name'])) {
            $errors['first_name_err'] = "First name is required";
        } else {
            $first_name = test_input($_POST['first_name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
                $errors['first_name_err'] = "Only letters and white space allowed";
            }
        }

        if (empty($_POST['last_name'])) {
            $errors['last_name_err'] = "Last name is required";
        } else {
            $last_name = test_input($_POST['last_name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
                $errors['last_name_err'] = "Only letters and white space allowed";
            }
        }

        if (empty($_POST['email'])) {
            $errors['email_err'] = "Email is required";
        } else {
            $email = test_input($_POST['email']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email_err'] = "Invalid email format";
            } else {
                $sql = "SELECT email FROM users WHERE email = '$email'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $errors['email_err'] = "Email already taken";
                }
            }
        }

        if (empty($_POST['username'])) {
            $errors['username_err'] = "Username is required";
        } else {
            $username = test_input($_POST['username']);
            if (strlen($username) < 4) {
                $errors['username_err'] = "Must be at least 4 characters";
            } else {
                $sql = "SELECT username FROM users WHERE username = '$username'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $errors['username_err'] = "Username already taken";
                }
            }
        }

        if (empty($_POST['password'])) {
            $errors['password_err'] = "Password is required";
        } else {
            $password = test_input($_POST['password']);
            if (strlen($password) < 5) {
                $errors['password_err'] = "Must be at least 5 characters";
            }
        }

        if (empty($_POST['confirm_password'])) {
            $errors['confirm_pass_err'] = "Confirm Password is required";
        } else {
            $confirm_pass = test_input($_POST['confirm_password']);
            if ($confirm_pass !== $password) {
                $errors['confirm_pass_err'] = "Must match with password";
            }
        }

        if (empty($_POST['agree_cb'])) {
            $errors['agree_cb_err'] = "Must agree to terms of service and privacy policy";
        } else {
            $agree_cb = isset($_POST['agree_cb']) ? true : false;
        }

        if (empty($errors)) {
            $_SESSION['register_form_data'] = [];

            $_SESSION['register_form_data']['first_name'] = $first_name;
            $_SESSION['register_form_data']['last_name'] = $last_name;
            $_SESSION['register_form_data']['email'] = $email;
            $_SESSION['register_form_data']['username'] = $username;
            $_SESSION['register_form_data']['password'] = password_hash($password, PASSWORD_BCRYPT);
            $_SESSION['register_form_data']['agree_cb'] = $agree_cb;

            $verification_code = rand(100000, 999999);
            $expires_at = date("Y-m-d H:i:s", strtotime("+10 minutes"));
            $sql = "INSERT INTO verification_codes(email, code, expires_at) 
                    VALUES('$email', '$verification_code', '$expires_at')";

            if ($conn->query($sql) === TRUE) {
                
                require '../vendor/autoload.php'; // Use Composer autoloader

                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.gmail.com';                    
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = 'markjasongalang.work@gmail.com';                
                    $mail->Password   = 'hehh yaxi bpnv fwqy';
                    $mail->SMTPSecure = 'tls';            
                    $mail->Port       = 587;

                    // Recipients
                    $mail->setFrom('your-email@gmail.com', 'Mailer');
                    $mail->addAddress($email); 

                    // Content
                    $mail->isHTML(true);                                 
                    $mail->Subject = 'Book n\' Map: Here is your verification code';
                    $mail->Body    = "This is your code: <b>$verification_code</b><br>Note: The code will expire after 10 mins.";
                    $mail->AltBody = "This is your code: $verification_code";

                    $mail->send();

                    // Proceed to confirmation of email
                    $response['success'] = true;
                    $response['url'] = '/booknmap/confirm-email';
                    echo json_encode($response);
                    exit;
                } catch (Exception $e) {
                    $errors['agree_cb_err'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $errors['agree_cb_err'] = "Error: " . $sql . " - " . $conn->error;
            }
        }
    }

    $response['success'] = false;
    $response['errors'] = $errors;
    echo json_encode($response);
?>