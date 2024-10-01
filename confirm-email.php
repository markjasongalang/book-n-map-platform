<?php
    $title = "Confirm Email";
    include './partials/auth-header.php';
?>

<div class="container">
    <img class="website-logo" src="./images/booknmap-logo.png" alt="Book n' Map logo">
    <h4>I'll just need to confirm your email ٩(＾◡＾)۶</h4>

    <form method="POST" id="verify-email-form">
        <label for="verification-code">Verification Code<span class="special-asterisk">*</span></label>
        <p class="verification-guidelines">
            We've sent a verification code to <span class="highlight email"></span>.
            Please check your inbox and enter the code below to 
            complete your registration. The code expires after 
            <span class="highlight">10 minutes</span>.
        </p>

        <p class="verification-code-status status"></p>
        <input id="verification-code" class="verification-code" name="verification_code" type="text" placeholder="Enter verification code" pattern="\d*" inputmode="numeric">
        <input type="submit" class="resend-code" name="resend_code" value="Resend Code">

        <input class="submit" type="submit" name="continue" value="Continue" id="continue">
    </form>

    <p class="change-email">Change Email</p>
    
    <form method="POST" class="update-email-form hide">
        <input id="new-email" class="new-email" name="new_email" type="email" placeholder="Enter new email">
        <p class="change-email-status status"></p>

        <input class="outline-submit" type="submit" name="update_email" value="Update">
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded',() => {
        // Redirect to home page if already signed in
        fetch('./api/handle-confirm-email', {
            method: 'GET',
        })
        .then(response => response.json())
        .then(data => {
            if (data.redirect) {
                window.location.href = data.url;
            } else if (data.email) {
                document.querySelector('.email').textContent = data.email;
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Verify email form
    const verifyEmailForm = document.querySelector('#verify-email-form');
    verifyEmailForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        formData.append(e.submitter.name, true);
        // console.log(e.submitter.name);

        fetch("./api/handle-confirm-email", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.new_code_success) {
                document.querySelector('.verification-code-status').textContent = data.status;
            } else if (data.verif_code_success) {
                window.location.href = data.url;
            } else {
                document.querySelector('.verification-code-status').textContent = data.errors.new_code_err || data.errors.verif_code_err;
            }
        })
        .catch(error => console.error('Error:', error));
    });

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

    const updateEmailForm = document.querySelector('.update-email-form');
    updateEmailForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        formData.append(e.submitter.name, true);
        // console.log(e.submitter.name);

        fetch("./api/handle-confirm-email", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.update_email_success) {
                document.querySelector('.email').textContent = data.new_email;
                document.querySelector('.change-email').textContent = 'Change Email';
                updateEmailForm.style.display = "none";
            } else {
                document.querySelector('.change-email-status').textContent = data.errors.update_email_err;
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

<?php
    include './partials/auth-footer.php';
?>