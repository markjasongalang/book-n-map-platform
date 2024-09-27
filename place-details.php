<?php
    $title = "Place details (for now)";
    $css_file_name = "place-details";
    include './partials/header.php';

    // $url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // echo $url . "<br>";
    // $parts = parse_url($url);
    // parse_str($parts['query'], $query);
    // echo "param - id: " . $query['id'] .  "<br>";
    // echo "param - name: " . $query['name'] . "<br>";
?>

<div class="outer-container">
    <button class="back-btn"><i class="ri-arrow-left-line"></i> Back</button>

    <div class="inner-container">

        <div class="main">
            <h1 class="name">National Library of the Philippines</h1>
            <div class="ratings">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-half-line"></i>
                <i class="ri-star-line"></i>
            </div>
            <span class="bullet">&bull;</span>
            <span class="city">Ermita, Manila</span>
            <span class="bullet">&bull;</span>
            <span class="last-updated">Last Updated: Sep 25, 2024</span><br>

            <div class="image-slideshow">
                <div class="slides">
                    <img src="./images/sample-library.jpeg" alt="Slide image">
                </div>
                <div class="slides">
                    <img src="./images/sample-library-2.jpg" alt="Slide image">
                </div>
                <div class="slides">
                    <img src="./images/sample-library-3.jpg" alt="Slide image">
                </div>
                <div class="slides">
                    <img src="./images/sample-library-4.jpg" alt="Slide image">
                </div>
                
                <button class="prev-btn"><i class="ri-arrow-left-s-line"></i></button>
                <button class="next-btn"><i class="ri-arrow-right-s-line"></i></button>

                <div class="row">
                    <img class="thumbnails" src="./images/sample-library.jpeg" alt="Slide image">
                    <img class="thumbnails" src="./images/sample-library-2.jpg" alt="Slide image">
                    <img class="thumbnails" src="./images/sample-library-3.jpg" alt="Slide image">
                    <img class="thumbnails" src="./images/sample-library-4.jpg" alt="Slide image">
                </div>
            </div>

            <h2>About</h2>
            <p class="about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo molestias non alias qui, debitis repudiandae delectus cum quidem corrupti enim provident et ab ex praesentium! Provident eaque placeat ad nostrum.
            Possimus, beatae ipsam! Ipsa rerum illo assumenda in reprehenderit culpa quae explicabo distinctio provident reiciendis qui quasi dolore minus omnis magnam odio non, iure quaerat ea labore porro quibusdam? Quas!</p>

            <h2>Location</h2>
            <p class="location">1000 Kalaw Ave, Ermita, Manila, 1000 Metro Manila</p>
            <h4>Nearby landmarks / other notes:</h4>
            <p>Near Rizal Park</p>

            <!-- TODO: Map -->
            
        </div>

        <div class="side">
            <h2>Amenities °˖✧◝(⁰▿⁰)◜✧˖°</h2>

            <!-- Amenities -->
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Free WiFi</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Fully Air Conditioned</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Charging outlets</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Comfort room (inside)</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Printing/Photocopy Available</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Public PCs Available</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Book Clubs Every Wednesday</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Back button
        const backBtn = document.querySelector('.back-btn');
        backBtn.addEventListener('click', () => {
            history.back();
        });
    
        // Image slideshow
        let slideIndex = 1;
        showSlides(slideIndex);
        
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        
        prevBtn.addEventListener('click', () => {
            showSlides(slideIndex -= 1);
        });
        
        nextBtn.addEventListener('click', () => {
            showSlides(slideIndex += 1);
        });
        
        function showSlides(current) {
            const slides = document.querySelectorAll('.slides');
            const thumbnails = document.querySelectorAll('.thumbnails');

            // Reset slide index (when it reaches the end or the beginning)
            current = ((current - 1 + slides.length) % slides.length) + 1;

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }
            for (let i = 0; i < thumbnails.length; i++) {
                thumbnails[i].classList.remove('active');
            }

            slides[current - 1].style.display = 'block';
            thumbnails[current - 1].classList.add('active');

            slideIndex = current;
        }

        const thumbnails = document.querySelectorAll('.thumbnails');
        for (let i = 0; i < thumbnails.length; i++) {
            thumbnails[i].addEventListener('click', () => {
                showSlides(i + 1);
            });
        }
    });
</script>

<?php
    include './partials/footer.php';
?>