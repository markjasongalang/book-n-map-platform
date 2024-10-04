<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    header('Location: /booknmap/sign-in');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book n' Map (Beta) - <?php echo $title ?></title>

    <!-- Website Icon -->
    <link rel="icon" href="./images/website-icon.png" type="image/png">

    <!-- External CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/<?php echo $css_file_name; ?>.css">

    <!-- Remix Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Mapbox: GL JS -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.js"></script>

    <!-- Mapbox: Directions API -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.3.1/mapbox-gl-directions.css" type="text/css">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.3.1/mapbox-gl-directions.js"></script>
</head>

<body>
    <nav>

        <div class="logo-section">
            <a href="/booknmap">
                <img class="logo" src="./images/booknmap-logo.png" alt="Book n' map logo">
            </a>
            <a class="suggestions" href="https://forms.gle/zF6wZrXQj7JLyr4T7" target="_blank">Share your feedback</a>
        </div>

        <div class="menu">
            <ul>

                <?php if (!isset($_SESSION['username'])) { ?>
                    <li class="sign-in"><a href="sign-in">Sign In</a></li>
                    <li class="register"><a href="register">Register</a></li>
                <?php } else { ?>
                    <!-- <li class="notifs-icon"><i class="ri-notification-line"></i></li> -->
                    <li class="profile"><img class="profile-image" src="./images/profile-image.png" alt="Profile image"></li>

                    <div class="profile-dropdown">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="logout-form">
                            <button class="logout-btn" type="submit" name="logout"><i class="ri-logout-box-line"></i>Logout</button>
                        </form>
                    </div>
                <?php } ?>
            </ul>
        </div>
    </nav>