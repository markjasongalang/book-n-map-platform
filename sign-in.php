<?php
    session_start();
    if (isset($_SESSION['username'])) {
        header('Location: /booknmap/');
        exit;
    }

    $title = "Sign In";
    include './partials/auth-header.php';
?>

<div class="container">
    <img class="website-logo" src="./images/booknmap-logo.png" alt="Book n' Map logo">
    <h4>A community-driven platform for finding quiet spaces (°◡°♡)</h4>

    <form action="#" method="post">
        <label for="username">Username</label>
        <input class="username" name="username" type="text" placeholder="Enter your username"><br>
        
        <label for="password">Password</label>
        <input class="password" name="password" type="password" placeholder="Enter your password"><br>
        
        <input class="submit" name="sign_in" type="submit" value="Sign In">
    </form>

    <p class="auth-redirect-label">Don't have an account yet? <a class="auth-redirect-link" href="register">Register</a></p>
</div>

<?php
    include './partials/auth-footer.php';
?>