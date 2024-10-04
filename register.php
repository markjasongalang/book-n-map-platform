<?php
$title = "Register";
include './partials/auth-header.php';
?>

<div class="container">
    <img class="website-logo" src="./images/booknmap-logo.png" alt="Book n' Map logo">
    <h4>Join our community (*^‿^*)</h4>

    <form id="register-form" method="POST">
        <label for="first-name">First Name<span class="special-asterisk">*</span></label>
        <input id="first-name" class="first-name" name="first_name" type="text" placeholder="Enter first name">
        <p class="first-name-error status"></p>

        <label for="last-name">Last Name<span class="special-asterisk">*</span></label>
        <input id="last-name" class="last-name" name="last_name" type="text" placeholder="Enter last name">
        <p class="last-name-error status"></p>

        <label for="email">Email<span class="special-asterisk">*</span></label>
        <input id="email" class="email" name="email" type="email" placeholder="Enter email">
        <p class="email-error status"></p>

        <label for="username">Username<span class="special-asterisk">*</span></label>
        <input id="username" class="username" name="username" type="text" placeholder="Enter username">
        <p class="username-error status"></p>

        <label for="password">Password<span class="special-asterisk">*</span></label>
        <input id="password" class="password" name="password" type="password" placeholder="Enter password">
        <p class="password-error status"></p>

        <label for="confirm-password">Confirm Password<span class="special-asterisk">*</span></label>
        <input id="confirm-password" class="confirm-password" name="confirm_password" type="password" placeholder="Enter confirm password">
        <p class="confirm-password-error status"></p>

        <input id="agree-cb" class="agree-cb" name="agree_cb" value="accepted" type="checkbox">
        <!-- TODO: Redirect terms of service and privacy policy to an actual page -->
        <label class="agree-label" for="agree-cb">I agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a></label><br>
        <p class="terms-privacy-error status"></p>

        <input class="submit" type="submit" name="register" value="Register">
    </form>
    <p id="loading">Processing your registration, please wait...</p>

    <p class="auth-redirect-label">Already have an account? <a class="auth-redirect-link" href="sign-in">Sign In</a></p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Redirect to home page if already signed in
        fetch('./api/handle-register', {
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
                if (data.redirect) {
                    window.location.href = data.url;
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Register form
    document.querySelector('#register-form').addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);

        document.querySelector('#loading').style.display = 'block';

        fetch("./api/handle-register", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.querySelector('#loading').style.display = 'none';

                if (data.success) {
                    window.location.href = data.url;
                } else {
                    document.querySelector('.first-name-error').textContent = data.errors.first_name_err;
                    document.querySelector('.last-name-error').textContent = data.errors.last_name_err;
                    document.querySelector('.email-error').textContent = data.errors.email_err;
                    document.querySelector('.username-error').textContent = data.errors.username_err;
                    document.querySelector('.password-error').textContent = data.errors.password_err;
                    document.querySelector('.confirm-password-error').textContent = data.errors.confirm_pass_err;
                    document.querySelector('.terms-privacy-error').textContent = data.errors.agree_cb_err;
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<?php
include './partials/auth-footer.php';
?>