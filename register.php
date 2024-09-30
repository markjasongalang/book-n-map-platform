<?php
    session_start();

    $title = "Register";
    include './partials/auth-header.php';

    $first_name_err = $last_name_err = $email_err = $username_err = $password_err = $confirm_pass_err = $agree_cb_err = "";
    $first_name = $last_name = $email = $username = $password = $confirm_pass = $agree_cb = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {
        if (empty($_POST['first_name'])) {
            $first_name_err = "First name is required";
        } else {
            $first_name = test_input($_POST['first_name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
                $first_name_err = "Only letters and white space allowed";
            }
        }

        if (empty($_POST['last_name'])) {
            $last_name_err = "Last name is required";
        } else {
            $last_name = test_input($_POST['last_name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
                $last_name_err = "Only letters and white space allowed";
            }
        }

        if (empty($_POST['email'])) {
            $email_err = "Email is required";
        } else {
            $email = test_input($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "Invalid email format";
            }
        }

        if (empty($_POST['username'])) {
            $username_err = "Username is required";
        } else {
            $username = test_input($_POST['username']);
            if (strlen($username) < 5) {
                $username_err = "Must be at least 5 characters";
            }

            // TODO: Check if username exists in the database
        }

        if (empty($_POST['password'])) {
            $password_err = "Password is required";
        } else {
            $password = test_input($_POST['password']);
            if (strlen($password) < 5) {
                $password_err = "Must be at least 5 characters";
            }
        }

        if (empty($_POST['confirm_password'])) {
            $confirm_pass_err = "Confirm Password is required";
        } else {
            $confirm_pass = test_input($_POST['confirm_password']);
            if ($confirm_pass !== $password) {
                $confirm_pass_err = "Must match with password";
            }
        }

        if (empty($_POST['agree_cb'])) {
            $agree_cb_err = "Must agree to the terms of service and privacy policy";
        } else {
            $agree_cb = $_POST['agree_cb'];
        }

        if ($first_name_err == "" && $last_name_err == "" && $email_err == "" && $username_err == "" && 
            $password_err == "" && $agree_cb_err == "") {

            $_SESSION['register_form_data'] = $_POST;
            $_SESSION['register_form_data']['password'] = password_hash($password, PASSWORD_BCRYPT);
            $_SESSION['register_form_data']['confirm_password'] = password_hash($confirm_pass, PASSWORD_BCRYPT);
            header('Location: confirm-email');
            exit();
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<div class="container">
    <img class="website-logo" src="./images/booknmap-logo.png" alt="Book n' Map logo">
    <h4>Join our community (*^‿^*)</h4>

    <form action="/booknmap/register" method="POST">
        <label for="first-name">First Name<span class="special-asterisk">*</span></label>
        <input id="first-name" class="first-name" name="first_name" type="text" placeholder="Enter first name" value="<?php echo $first_name; ?>">
        <?php if ($first_name_err !== "") { ?>
            <p class="status"><?php echo $first_name_err; ?></p>
        <?php } ?>
        
        <label for="last-name">Last Name<span class="special-asterisk">*</span></label>
        <input id="last-name" class="last-name" name="last_name" type="text" placeholder="Enter last name" value="<?php echo $last_name; ?>">
        <?php if ($last_name_err !== "") { ?>
            <p class="status"><?php echo $last_name_err; ?></p>
        <?php } ?>
        
        <label for="email">Email<span class="special-asterisk">*</span></label>
        <input id="email" class="email" name="email" type="email" placeholder="Enter email" value="<?php echo $email; ?>">
        <?php if ($email_err !== "") { ?>
            <p class="status"><?php echo $email_err; ?></p>
        <?php } ?>
        
        <label for="username">Username<span class="special-asterisk">*</span></label>
        <input id="username" class="username" name="username" type="text" placeholder="Enter username" value="<?php echo $username; ?>">
        <?php if ($username_err !== "") { ?>
            <p class="status"><?php echo $username_err; ?></p>
        <?php } ?>
        
        <label for="password">Password<span class="special-asterisk">*</span></label>
        <input id="password" class="password" name="password" type="password" placeholder="Enter password">
        <?php if ($password_err !== "") { ?>
            <p class="status"><?php echo $password_err; ?></p>
        <?php } ?>
        
        <label for="confirm-password">Confirm Password<span class="special-asterisk">*</span></label>
        <input id="confirm-password" class="confirm-password" name="confirm_password" type="password" placeholder="Enter confirm password">
        <?php if ($confirm_pass_err !== "") { ?>
            <p class="status"><?php echo $confirm_pass_err; ?></p>
        <?php } ?>
        
        <input id="agree-cb" class="agree-cb" name="agree_cb" value="accepted" type="checkbox">
        <label class="agree-label" for="agree-cb">I agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a></label><br>
        <?php if ($agree_cb_err !== "") { ?>
            <p class="status"><?php echo $agree_cb_err; ?></p>
        <?php } ?>
        <!-- TODO: Redirect terms of service and privacy policy to an actual page -->

        <input class="submit" type="submit" name="register" value="Register">
    </form>

    <p class="auth-redirect-label">Already have an account? <a class="auth-redirect-link" href="sign-in">Sign In</a></p>
</div>

<?php
    include './partials/auth-footer.php';
?>