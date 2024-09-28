<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book n' Map - <?php echo $title ?></title>

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
            <a href="/booknmap">
                <img class="logo" src="./images/booknmap-logo.png" alt="Book n' map logo">
            </a>
            
            <div class="menu">
                <ul>
                    <li><a href="sign-in" class="sign-in">Sign In</a></li>
                    <li><a href="register" class="register">Register</a></li>
                </ul>
            </div>
        </nav>