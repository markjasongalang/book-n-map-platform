<?php
    session_start();
    if (isset($_SESSION['username'])) {
        header('Location: /booknmap/');
        exit;
    }

    $title = "Sign In";
    include './partials/auth-header.php';

    $cred_error = "";
    $username = $password = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sign_in'])) {
        if (empty($_POST['username'])) {
            $cred_error = "Please fill in all the fields above.";
        } else {
            $username = test_input($_POST['username']);
        }

        if (empty($_POST['password'])) {
            $cred_error = "Please fill in all the fields above.";
        } else {
            $password = test_input($_POST['password']);
        }

        if (empty($cred_error)) {
            include 'connection.php';

            $sql = "SELECT username, password FROM users WHERE username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['username'] = $row['username'];

                    header('Location: /booknmap/');
                    exit;
                } else{ 
                    $cred_error = "Incorrect username/password";
                }
            } else {
                $cred_error = "Incorrect username/password";
            }
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
    <h4>A community-driven platform for finding quiet spaces (°◡°♡)</h4>

    <form action="/booknmap/sign-in" method="post">
        <label for="username">Username</label>
        <input class="username" name="username" type="text" placeholder="Enter your username" value="<?php echo $username; ?>"><br>
        
        <label for="password">Password</label>
        <input class="password" name="password" type="password" placeholder="Enter your password" value="<?php echo $password; ?>"><br>
        <?php if ($cred_error != "") { ?>
            <p class="status"><?php echo $cred_error; ?></p>
        <?php } ?>
        
        <input class="submit" name="sign_in" type="submit" value="Sign In">
    </form>

    <p class="auth-redirect-label">Don't have an account yet? <a class="auth-redirect-link" href="register">Register</a></p>
</div>

<?php
    include './partials/auth-footer.php';
?>