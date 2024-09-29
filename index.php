<?php
    $title = "A community-driven platform for quiet spaces";
    $css_file_name = "index";
    include './partials/header.php';
?>

<div class="container">
    <!-- Mapbox -->
    <div id="map"></div>

    <!-- Place List -->
    <div class="place-list">
        <form action="#" method="get" class="search-form">
            <i class="ri-search-line"></i>
            <input name="search-place" class="search-place" type="text" placeholder="Search for a library (＾▽＾)">
        </form>

        <div class="place-grid">
            <div class="place-item">
                <img src="./images/sample-library.jpeg" alt="Place image">
                <div class="content">
                    <h3 class="place-name">National Library of the Philippines</h3>
                    <i class="ri-map-pin-line"></i>
                    <h5 class="place-address">1000 Kalaw Ave, Ermita, Manila</h5>
                    <div class="ratings">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-line"></i>
                        <i class="ri-star-line"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Place Detail -->
    <div class="place-detail">
        <button class="back-btn"><i class="ri-arrow-left-line"></i> Back</button>

        <h1 class="name">National Library of the Philippines</h1>
        <div class="ratings">
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-half-line"></i>
            <i class="ri-star-line"></i>
        </div>
        <span class="bullet">&bull;</span>
        <span class="address">Ermita, Manila</span>
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

        <div class="amenities">
            <h2>Amenities °˖✧◝(⁰▿⁰)◜✧˖°</h2>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Free WiFi</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Fully Air Conditioned</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Charging outlets</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Comfort room (inside)</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Printing/Photocopy Available</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Public PCs Available</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Book Clubs Every Wednesday</p>
        </div>

        <div class="reviews">
            <h2>Reviews - 32</h2>

            <form action="#" method="post" class="review-form">
                <textarea class="my-review dynamic-textarea" name="my_review" type="text" placeholder="Write your review "></textarea>
                <div class="star-rating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                    <div id="rating-display">Rating: 0</div>
                </div>
                <input class="submit-review" name="submit_review" type="submit" value="Submit Review">
            </form>

            <div class="review-item">
                <img src="./images/profile-image.png" alt="Profile image">
                <h4 class="user">Mark Jason</h4><br>
                <div class="ratings">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-half-line"></i>
                    <i class="ri-star-line"></i>
                </div>
                <h5 class="date-posted">Sep 24, 2024</h5>
                <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci error possimus magni expedita commodi necessitatibus quas, at sapiente? Ipsum nostrum quam fugit numquam earum ullam consequuntur molestiae voluptates voluptas est?
                Consectetur neque error in doloribus amet. Deleniti inventore eaque tenetur voluptates, repellat omnis suscipit impedit incidunt ad atque quos obcaecati accusamus, velit facilis. Rem officiis, debitis quasi ipsum reiciendis ullam?</p>
            </div>
        </div>
    </div>

    <!-- Manage Place -->
    <div class="manage-place">
        <button class="back-btn"><i class="ri-arrow-left-line"></i> Back</button>
        <h2>Save Place</h2>

        <form action="#" method="post">
            <label for="location-address">Location<span class="special-asterisk">*</span></label>
            <p class="note">Note: You can click anywhere <span class="highlight">on the map</span> then select an address on the box that will appear - or more simply you can just <span class="highlight">click the button below</span> if you are at the location right now:</p>
            <i class="ri-map-pin-line"></i><button type="button" class="current-loc-btn">Use my current location</button>

            <!-- TODO: Reverse Geocoding -->
            <input id="location-address" name="location_address" type="text" placeholder="No location selected" disabled>

            <label for="place-name">Name<span class="special-asterisk">*</span></label>
            <input name="place_name" type="text" placeholder="Enter name of place">

            <label for="place-about">About</label>
            <textarea class="dynamic-textarea" name="place_content" id="place-about" placeholder="What do you know about this place? (optional)"></textarea>

            <label for="">Images<span class="special-asterisk">*</span></label>
            <input type="file" id="file-upload" multiple accept="image/*" hidden>
            <button type="button" id="add-file-btn"><i class="ri-add-circle-line"></i>Add Images</button>
            <p class="note">Note: You can drag the selected images to change their order.</p>
            <ul id="image-preview" class="sortable">
                <!-- Preview images will be added here -->
            </ul>
            
            <label class="amenities-label">Amenities<span class="special-asterisk">*</span></label>
            <p class="note">Note: You can drag the amenities to change their order.</p>
            <form id="amenities-form">
                <div id="amenities-list">
                    <!-- Dynamic inputs will be added here -->
                </div>
                <button type="button" class="add-amenity-btn" onclick="addAmenity()"><i class="ri-add-line"></i> Add Amenity</button>
            </form>
        </form>
    </div>
</div>


<div class="newsletter">
    <div></div>

    <div class="content">
        <div>
            <h5>Subscribe to our newsletter</h5>
            <p>Get latest updates and news</p>
        </div>
        
        <form action="#" method="post">
            <input name="email" class="email" type="text" placeholder="Enter email">
            <input class="subscribe-btn" type="submit" value="Subscribe (•‿•)">
        </form>
    </div>

    <i class="ri-close-line close-btn"></i>
</div>

<!-- Sortable JS: Drag to change order of image file uploads -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>

<script>
    // Generate dummy places (remove this)
    const placeGrid = document.querySelector('.place-grid');
    for (let i = 0; i < 9; i++) {
        const placeItemClone = document.querySelector('.place-item').cloneNode(true);
        placeGrid.appendChild(placeItemClone);
    }
    document.querySelectorAll('.place-item').forEach((placeItem) => {
        placeItem.addEventListener('click', () => {
            document.querySelector('.place-list').style.display = 'none';
            document.querySelector('.place-detail').style.display = 'block';
        });
    });

    // Go back to place list
    const backBtn = document.querySelector('.back-btn');
    backBtn.addEventListener('click', () => {
        document.querySelector('.place-list').style.display = 'block';
        document.querySelector('.place-detail').style.display = 'none';
        document.querySelector('.manage-place').style.display = 'none';
    });

    // Close newsletter
    const newsletter = document.querySelector('.newsletter');
    const closeBtn = newsletter.querySelector('.close-btn');
    closeBtn.addEventListener('click', () => {
        newsletter.style.display = 'none';
    });

    // Mapbox
    // mapboxgl.accessToken = 'pk.eyJ1IjoibWFya2phc29uZ2FsYW5nd29yayIsImEiOiJjbTFrd2VxeWEwMmk3Mmtvdnhld2syazllIn0.OW2XEC08515w9p7HVcAhBA';
    
    // const map = new mapboxgl.Map({
    //     container: 'map',
    //     style: 'mapbox://styles/mapbox/streets-v11',
    //     center: [121.0450, 14.5995], // Center to Metro Manila
    //     zoom: 11, // Set zoom level
    //     minZoom: 11, // Minimum zoom level (adjust as needed)
    //     maxZoom: 18 // Maximum zoom level (adjust as needed)
    // });

    // // Destination coordinates
    // const destination = [120.979194, 14.581552];

    // // Add a marker for the destination
    // new mapboxgl.Marker({ color: '#E74C3C' })
    //     .setLngLat(destination)
    //     .setPopup(new mapboxgl.Popup({
    //         offset: 25 ,
    //         closeButton: false, // Remove close button
    //         closeOnClick: false // Prevent closing when clicking outside
    //     })
    //     .setText('9.7'))
    //     .addTo(map)
    //     .togglePopup();

    // new mapboxgl.Marker({ color: '#E74C3C' })
    //     .setLngLat([120.9822, 14.5904])
    //     .setPopup(new mapboxgl.Popup({
    //         offset: 25,
    //         closeButton: false, // Remove close button
    //         closeOnClick: false // Prevent closing when clicking outside
    //     })
    //     .setText('8.25'))
    //     .addTo(map)
    //     .togglePopup();

    // new mapboxgl.Marker({ color: '#E74C3C' })
    //     .setLngLat([121.0248, 14.5581])
    //     .setPopup(new mapboxgl.Popup({
    //         offset: 25,
    //         closeButton: false, // Remove close button
    //         closeOnClick: false // Prevent closing when clicking outside
    //     })
    //     .setText('7.9'))
    //     .addTo(map)
    //     .togglePopup();

    // // Function to fetch directions and display the route
    // function displayDirections() {
    //     navigator.geolocation.getCurrentPosition((position) => {
    //     // const userLocation = [position.coords.longitude, position.coords.latitude];
    //     const userLocation = [120.989180, 14.601570];

    //     // Add a marker for user's location
    //     // new mapboxgl.Marker({ color: '#1D1D1D' })
    //     //     .setLngLat(userLocation)
    //     //     .setPopup(new mapboxgl.Popup({ offset: 25 })
    //     //     .setText('You are here (¬‿¬)'))
    //     //     .addTo(map)
    //     //     .togglePopup();

    //     // Fetch directions from user location to destination
    //     const directionsUrl = `https://api.mapbox.com/directions/v5/mapbox/driving/${userLocation.join(',')};${destination.join(',')}?geometries=geojson&access_token=${mapboxgl.accessToken}`;

    //     fetch(directionsUrl)
    //         .then(response => response.json())
    //         .then(data => {
    //             const route = data.routes[0].geometry;
    //             // Add the route as a layer on the map
    //             map.addLayer({
    //                 id: 'route',
    //                 type: 'line',
    //                 source: {
    //                     type: 'geojson',
    //                     data: {
    //                         type: 'Feature',
    //                         properties: {},
    //                         geometry: route
    //                     }
    //                 },
    //                 layout: {
    //                     'line-join': 'round',
    //                     'line-cap': 'round'
    //                 },
    //                 paint: {
    //                     'line-color': '#E74C3C',
    //                     'line-width': 5
    //                 }
    //             });

    //             // Fit the map bounds to show both the user location and destination
    //             const bounds = new mapboxgl.LngLatBounds();
    //             bounds.extend(userLocation); // Extend bounds to include user's location
    //             bounds.extend(destination);  // Extend bounds to include destination
    //             map.fitBounds(bounds, { padding: 100 }); // Adjust map view to fit both points with padding
    //         })
    //         .catch(error => console.error('Error fetching directions:', error));
    //     }, () => {
    //         alert('Unable to retrieve your location');
    //     });
    // }

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

    // Textareas with auto-resize
    const dynamicTextareas = document.querySelectorAll('.dynamic-textarea');
    dynamicTextareas.forEach((dynamicTextarea) => {
        dynamicTextarea.addEventListener('input', () => {
            dynamicTextarea.style.height = 'auto';
            dynamicTextarea.style.height = dynamicTextarea.scrollHeight + 'px';
        });
    });

    // Review Rating Stars
    const stars = document.querySelectorAll('.star');
    const ratingDisplay = document.getElementById('rating-display');
    stars.forEach(star => {
        star.addEventListener('click', () => {
            const ratingValue = star.getAttribute('data-value');
            ratingDisplay.textContent = `Rating: ${ratingValue}`;

            stars.forEach(s => s.classList.remove('selected'));

            for (let i = 0; i < ratingValue; i++) {
                stars[i].classList.add('selected');
            }
        });
    });

    // Sortable image uploads
    const fileInput = document.getElementById("file-upload");
    const previewContainer = document.getElementById("image-preview");
    const addFileBtn = document.getElementById("add-file-btn");

    // Function to preview selected images
    const previewImages = (files) => {
        for (const file of files) {
            const reader = new FileReader();
            const listItem = document.createElement("li");

            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                listItem.appendChild(img);

                const removeBtn = document.createElement("span");
                removeBtn.innerHTML = '<i class="ri-close-line"></i>';
                removeBtn.onclick = () => listItem.remove();
                listItem.appendChild(removeBtn);

                previewContainer.appendChild(listItem);
            };

            reader.readAsDataURL(file);
        }
    };

    // Handle file selection
    fileInput.addEventListener("change", function () {
        previewImages(fileInput.files);
    });

    // Add more file input dynamically
    addFileBtn.addEventListener("click", () => {
        fileInput.click(); // Trigger the input when button is clicked
    });

    // Initialize Sortable.js for the preview container
    new Sortable(previewContainer, {
        animation: 150,
        onEnd: () => {
            // console.log("Order changed!");
        },
    });

    // Make amenities sortable
    function addAmenity() {
        const container = document.createElement('div');
        container.classList.add('input-container');

        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'amenities[]'; // This allows you to submit all inputs as an array
        input.placeholder = 'Enter amenity';

        const removeBtn = document.createElement('button');
        removeBtn.textContent = 'Remove';
        removeBtn.type = 'button';
        removeBtn.classList.add('remove-btn');
        removeBtn.onclick = function () {
            this.parentElement.remove(); // Removes the parent div when clicked
        };

        container.appendChild(input);
        container.appendChild(removeBtn);

        document.getElementById('amenities-list').appendChild(container);
    }

    // Initialize Sortable.js on the amenities-list container
    new Sortable(document.getElementById('amenities-list'), {
        animation: 150, // Smooth dragging animation in ms
        ghostClass: 'sortable-ghost', // Class name for the placeholder element during drag
        handle: '.input-container', // Allows dragging by the entire container
    });

</script>

<?php
    include './partials/footer.php';
?>