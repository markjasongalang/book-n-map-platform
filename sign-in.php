<?php
    $title = "Sign In";
    include './partials/auth-header.php';
?>

<div class="container">
    <img class="website-logo" src="./images/booknmap-logo.png" alt="Book n' Map logo">
    <h4>A community-driven platform for finding quiet spaces (°◡°♡)</h4>

    <form id="sign-in-form" method="post">
        <label for="username">Username</label>
        <input class="username" name="username" type="text" placeholder="Enter your username"><br>
        
        <label for="password">Password</label>
        <input class="password" name="password" type="password" placeholder="Enter your password"><br>
        <p class="auth-error status"></p>
        
        <input class="submit" name="sign_in" type="submit" value="Sign In">
    </form>

    <p class="auth-redirect-label">Don't have an account yet? <a class="auth-redirect-link" href="register">Register</a></p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Redirect to home page if already signed in
        fetch('./api/authenticate', {
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

    // Sign-in form
    document.querySelector('#sign-in-form').addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);

        fetch("./api/authenticate", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.url;
            } else {
                document.querySelector('.auth-error').textContent = data.errors.cred_error;
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

<?php
    include './partials/auth-footer.php';
?>