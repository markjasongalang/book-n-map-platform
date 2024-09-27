<?php
    $title = "Confirm Email";
    include './partials/auth-header.php';
?>

<div class="container">
    <img class="website-logo" src="./images/booknmap-logo.png" alt="Book n' Map logo">
    <h4>I'll just need to confirm your email ٩(＾◡＾)۶</h4>

    <form action="#" method="post">
        <label for="verification-code">Verification Code<span class="special-asterisk">*</span></label>
        <p class="verification-guidelines">
            We've sent a verification code to <span class="highlight">user@example.com</span>.
            Please check your inbox and enter the code below to 
            complete your registration. The code expires after 
            <span class="highlight">10 minutes</span>.
        </p>

        <input id="verification-code" class="verification-code" name="verification_code" type="text" placeholder="Enter verification code" pattern="\d*" inputmode="numeric">
        <input class="resend-code" name="resend_code" type="submit" value="Resend Code">

        <input class="submit" type="submit" name="continue" value="Continue">
    </form>

    <p class="change-email">Change Email</p>

    <form action="#" method="post" class="update-email-form hide">
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