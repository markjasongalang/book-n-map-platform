<?php
    session_start();

    if (isset($_SESSION['username'])) {
        header('Location: /booknmap/');
        exit;
    }
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    include 'connection.php';

    $title = "Confirm Email";
    include './partials/auth-header.php';
    
    $register_form_data = $_SESSION['register_form_data'];
    $email = $register_form_data['email'];

    $status = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['resend_code'])) {
        
        require 'vendor/autoload.php'; // Use Composer autoloader
        
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
            $mail->Body    = "This is your code: <b>$verification_code</b>";
            $mail->AltBody = "This is your code: $verification_code";

            $mail->send();

            $status = "A new verification code has been sent to your email";
        } catch (Exception $e) {
            $status = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['continue'])) {
        if (empty($_POST['verification_code'])) {
            $status = "Please type the verification code first";
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
                    header('Location: /booknmap/');
                    exit();
                } else if ($expires_at <= $current_time) {
                    $status = "Verification code has expired. Please resend code";
                } else {
                    $status = "Incorrect verification code.";
                }
            } else {
                $status = "No verification code found for this email.";
            }
        }
    }

    $update_email_status = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_email'])) {
        if (empty($_POST['new_email'])) {
            $update_email_status = "*Please provide an email*";
        } else {
            $new_email = test_input($_POST['new_email']);
            $register_form_data['email'] = $new_email;
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function generate_uuid() {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), // 32 bits for "time_low"
            mt_rand(0, 0xffff), // 16 bits for "time_mid"
            mt_rand(0, 0x0fff) | 0x4000, // 16 bits for "time_hi_and_version", four most significant bits are for version 4
            mt_rand(0, 0x3fff) | 0x8000, // 16 bits, 8 bits for "clk_seq_hi_res", 8 bits are for "clk_seq_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff) // 48 bits for "node"
        );
    }
?>

<div class="container">
    <img class="website-logo" src="./images/booknmap-logo.png" alt="Book n' Map logo">
    <h4>I'll just need to confirm your email ٩(＾◡＾)۶</h4>

    <form action="/booknmap/confirm-email" method="POST">
        <label for="verification-code">Verification Code<span class="special-asterisk">*</span></label>
        <p class="verification-guidelines">
            We've sent a verification code to <span class="highlight"><?php echo $email; ?></span>.
            Please check your inbox and enter the code below to 
            complete your registration. The code expires after 
            <span class="highlight">10 minutes</span>.
        </p>

        <?php if ($status !== "") { ?>
            <p class="status"><?php echo $status; ?></p>
        <?php } ?>
        <input id="verification-code" class="verification-code" name="verification_code" type="text" placeholder="Enter verification code" pattern="\d*" inputmode="numeric">
        <input class="resend-code" name="resend_code" type="submit" value="Resend Code">

        <input class="submit" type="submit" name="continue" value="Continue">
    </form>

    <p class="change-email">Change Email</p>
    <?php if ($update_email_status !== "") { ?>
        <p class="status"><?php echo $update_email_status; ?></p>
    <?php } ?>

    <form action="/booknmap/confirm-email" method="post" class="update-email-form hide">
        <input id="new-email" class="new-email" name="new_email" type="email" placeholder="Enter new email">
        <input class="outline-submit" type="submit" name="update_email" value="Update">
    </form>
</div>

<script>
    // Toggle visibility of update email form
    const changeEmail = document.querySelector('.change-email');
    changeEmail.addEventListener('click', () => {
        const updateEmailForm = document.querySelector('.update-email-form');
        
        if (!updateEmailForm.classList.contains('hide')) {
            changeEmail.textContent = 'Change Email';
        } else {
            changeEmail.textContent = 'Cancel';
        }

        updateEmailForm.classList.toggle('hide');
    });

</script>

<?php
    include './partials/auth-footer.php';
?>