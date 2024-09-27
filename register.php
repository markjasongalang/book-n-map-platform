<?php
    $title = "Register";
    include './partials/auth-header.php';
?>

<div class="container">
    <img class="website-logo" src="./images/booknmap-logo.png" alt="Book n' Map logo">
    <h4>Join our community (*^‿^*)</h4>

    <form action="confirm-email" method="post">
        <label for="first-name">First Name<span class="special-asterisk">*</span></label>
        <input id="first-name" class="first-name" name="first_name" type="text" placeholder="Enter first name">

        <label for="last-name">Last Name<span class="special-asterisk">*</span></label>
        <input id="last-name" class="last-name" name="last_name" type="text" placeholder="Enter last name">

        <label for="email">Email<span class="special-asterisk">*</span></label>
        <input id="email" class="email" name="email" type="email" placeholder="Enter email">

        <label for="username">Username<span class="special-asterisk">*</span></label>
        <input id="username" class="username" name="username" type="text" placeholder="Enter username">

        <label for="password">Password<span class="special-asterisk">*</span></label>
        <input id="password" class="password" name="password" type="password" placeholder="Enter password">

        <label for="confirm-password">Confirm Password<span class="special-asterisk">*</span></label>
        <input id="confirm-password" class="confirm-password" name="confirm_password" type="password" placeholder="Enter confirm password">
        
        <input id="agree-cb" class="agree-cb" name="agree_cb" value="true" type="checkbox">
        <label class="agree-label" for="agree-cb">I agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a></label><br>

        <input class="submit" type="submit" name="register" value="Register">
    </form>

    <p class="auth-redirect-label">Already have an account? <a class="auth-redirect-link" href="sign-in">Sign In</a></p>
</div>

<?php
    include './partials/auth-footer.php';
?>