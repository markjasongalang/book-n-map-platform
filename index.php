<?php
    session_start();

    $title = "A community-driven platform for quiet spaces";
    $css_file_name = "index";

    include 'connection.php';
    include './partials/header.php';
    
?>

<div class="container">
    <!-- Mapbox -->
    <div id="map"></div>

    <!-- Place List -->
    <div class="place-list">

        <p class="new-library">Didn't find the library? <span class="add-library">Click here to add it!</span></p>
        <!-- <?php if (isset($_SESSION['username'])) { ?>
        <?php } ?> -->

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
                    <h5 class="place-address">Ermita, Manila</h5>
                    <!-- <div class="ratings">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-line"></i>
                        <i class="ri-star-line"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Place Detail -->
    <div class="place-detail">
        <button class="back-btn"><i class="ri-arrow-left-line"></i> Back</button>

        <h1 class="name">National Library of the Philippines</h1>
        <!-- <div class="ratings">
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-half-line"></i>
            <i class="ri-star-line"></i>
        </div>
        <span class="bullet">&bull;</span> -->
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

        <!-- <div class="reviews">
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
        </div> -->
    </div>

    <!-- Manage Place -->
    <div class="manage-place">
        <button class="back-btn"><i class="ri-arrow-left-line"></i> Back</button>
        <h2>Save Library</h2>

        <form id="manage-place-form" method="POST" enctype="multipart/form-data">
            <label for="location-address">Location<span class="special-asterisk">*</span></label>
            <p class="note">Note: You can click <span class="highlight">anywhere on the map</span> - or more simply you can just <span class="highlight">click the button below</span> if you are at the location right now:</p>
            <i class="ri-map-pin-line"></i><button type="button" class="current-loc-btn">Use my current location</button>

            <textarea class="dynamic-textarea" id="location-address" name="location_address" placeholder="No location selected" disabled></textarea>
            <input type="text" name="short_address" id="short-address" hidden>
            <input type="text" name="latitude" id="latitude" hidden>
            <input type="text" name="longitude" id="longitude" hidden>
            <p class="location-error status"></p>
            
            <label for="place-name">Name<span class="special-asterisk">*</span></label>
            <input name="place_name" type="text" placeholder="Enter name of place">
            <p class="name-error status"></p>
            
            <label for="place-about">About</label>
            <textarea class="dynamic-textarea" name="place_content" id="place-about" placeholder="What do you know about this place? (optional)"></textarea>
            
            <label for="">Images<span class="special-asterisk">*</span></label>
            <input type="file" name="place_images[]" id="file-upload" multiple accept="image/*" hidden>
            <p class="place-images-error status"></p>
            <button type="button" id="add-file-btn"><i class="ri-add-circle-line"></i>Add Images</button>
            <ul id="image-preview" class="sortable">
                <!-- Preview images will be added here -->
            </ul>
            
            <label class="amenities-label">Amenities<span class="special-asterisk">*</span></label>
            <p class="amenities-error status"></p>
            <p class="note">Note: You can drag the amenities to change their order.</p>
            <div id="amenities-list">
                <!-- Dynamic inputs will be added here -->
            </div>
            <button type="button" class="add-amenity-btn" onclick="addAmenity()"><i class="ri-add-line"></i> Add Amenity</button>

            <input type="submit" name="submit_place" value="Submit">
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
    document.querySelectorAll('.place-item').forEach((placeItem) => {
        placeItem.addEventListener('click', () => {
            document.querySelector('.place-list').style.display = 'none';
            document.querySelector('.place-detail').style.display = 'block';
        });
    });

    const addLibrary = document.querySelector('.add-library');
    addLibrary.addEventListener('click', () => {
        document.querySelector('.manage-place').style.display = 'block';
        document.querySelector('.place-list').style.display = 'none';
    });

    // Go back to place list
    const backBtns = document.querySelectorAll('.back-btn');
    backBtns.forEach(backBtn => {
        backBtn.addEventListener('click', () => {
            document.querySelector('.place-list').style.display = 'block';
            document.querySelector('.place-detail').style.display = 'none';
            document.querySelector('.manage-place').style.display = 'none';
        });
    });

    // Close newsletter
    const newsletter = document.querySelector('.newsletter');
    const closeBtn = newsletter.querySelector('.close-btn');
    closeBtn.addEventListener('click', () => {
        newsletter.style.display = 'none';
    });

    // Mapbox
    mapboxgl.accessToken = 'pk.eyJ1IjoibWFya2phc29uZ2FsYW5nd29yayIsImEiOiJjbTFrd2VxeWEwMmk3Mmtvdnhld2syazllIn0.OW2XEC08515w9p7HVcAhBA';
    
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [121.0450, 14.5995], // Center to Metro Manila
        zoom: 11, // Set zoom level
        minZoom: 11, // Minimum zoom level (adjust as needed)
        maxZoom: 18 // Maximum zoom level (adjust as needed)
    });

    const destination = [120.979194, 14.581552];

    // Add a marker for the destination
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

    let clickMarkers = [];
    let currentLocMarkers = [];

    savePlaceUsingMapClick();

    function savePlaceUsingMapClick() {
        // Add click event to the map
        map.on('click', (e) => {

            // Clear current location markers
            currentLocMarkers.forEach(marker => marker.remove());
            currentLocMarkers = []; // Reset the markers array

            const lngLat = e.lngLat; // Get the clicked coordinates

            // Clear existing markers
            clickMarkers.forEach(marker => marker.remove());
            clickMarkers = []; // Reset the markers array

            // Add a new marker at the clicked location
            const newMarker = new mapboxgl.Marker({ color: '#E74C3C' })
                .setLngLat([lngLat.lng, lngLat.lat])
                .addTo(map);
            
            // Store the new marker in the array
            clickMarkers.push(newMarker);

            // Call the OpenStreetMap Nominatim reverse geocoding API
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lngLat.lat}&lon=${lngLat.lng}&format=json`)
                .then(response => response.json())
                .then(data => {
                    // console.log(`${data.address.city}, ${data.address.region}`);
                    // console.log(data);

                    // Extract the address from the response
                    const placeName = data.display_name || "No address found";
                    
                    // Display full address in the disabled input field
                    const locationAddress = document.querySelector('#location-address');
                    locationAddress.value = placeName;
                    
                    // Short address
                    const shortAddress = `${data.address.city || data.address.town}, ${data.address.region}` || "No address found";
                    document.querySelector('#short-address').value = shortAddress;

                    // Coordinates
                    const latitude = data.lat;
                    const longitude = data.lon;
                    document.querySelector('#latitude').value = latitude;
                    document.querySelector('#longitude').value = longitude;

                    autoResizeTextarea(locationAddress);
                })
                .catch(error => {
                    console.error('Error with reverse geocoding:', error);
                    document.getElementById('location-address').value = "Error finding the address";
                });
        });
    }

    document.querySelector('.current-loc-btn').addEventListener('click', savePlaceUsingCurrentLoc);
    function savePlaceUsingCurrentLoc() {
        // Clear clicked markers
        clickMarkers.forEach(marker => marker.remove());
        clickMarkers = []; // Reset the markers array

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                const userLocation = [position.coords.longitude, position.coords.latitude];
                // console.log("Current Location:", userLocation);

                // Clear existing markers
                currentLocMarkers.forEach(marker => marker.remove());
                currentLocMarkers = []; // Reset the markers array

                // Optionally, add a marker for the user's location
                const newMarker = new mapboxgl.Marker({ color: '#E74C3C' })
                    .setLngLat(userLocation)
                    .addTo(map);
                
                // Store the new marker in the array
                currentLocMarkers.push(newMarker);
                
                // Center to the user's location
                map.setCenter(userLocation);
                
                // Optionally, call the reverse geocoding API to get the address
                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${userLocation[1]}&lon=${userLocation[0]}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        // console.log(data);

                        // Full address
                        const placeName = data.display_name || "No address found";
                        const locationAddress = document.querySelector('#location-address');
                        locationAddress.value = placeName;
                        autoResizeTextarea(locationAddress);

                        // Short address
                        const shortAddress = `${data.address.city || data.address.town}, ${data.address.region}` || "No address found";
                        document.querySelector('#short-address').value = shortAddress;

                        // Coordinates
                        const latitude = data.lat;
                        const longitude = data.lon;
                        document.querySelector('#latitude').value = latitude;
                        document.querySelector('#longitude').value = longitude;
                    })
                    .catch(error => {
                        console.error('Error with reverse geocoding:', error);
                        document.querySelector('#location-address').value = "Error finding the address";
                    });

            }, (error) => {
                console.error("Error getting location:", error);
            });
        } else {
            console.error("Geolocation is not supported by this browser.");
        }
    }

    function autoResizeTextarea(textarea) {
        textarea.style.height = 'auto'; // Reset the height
        textarea.style.height = textarea.scrollHeight + 'px'; // Set to the new height
    }

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
    // const stars = document.querySelectorAll('.star');
    // const ratingDisplay = document.getElementById('rating-display');
    // stars.forEach(star => {
    //     star.addEventListener('click', () => {
    //         const ratingValue = star.getAttribute('data-value');
    //         ratingDisplay.textContent = `Rating: ${ratingValue}`;

    //         stars.forEach(s => s.classList.remove('selected'));

    //         for (let i = 0; i < ratingValue; i++) {
    //             stars[i].classList.add('selected');
    //         }
    //     });
    // });

    // Manage place form
    document.querySelector('#manage-place-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        const locationAddress = document.querySelector('#location-address');
        locationAddress.disabled = false;

        const formData = new FormData(this); // Create FormData object from the form

        // This will show all form data in the console
        // for (let [key, value] of formData.entries()) {
        //     console.log(`${key} = ${value}`);
        // }

        fetch("./api/manage-place.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            locationAddress.disabled = true;
            
            document.querySelector('.location-error').textContent = data.location_err || "";
            document.querySelector('.name-error').textContent = data.name_err || "";
            document.querySelector('.place-images-error').textContent = data.images_err || "";
            document.querySelector('.amenities-error').textContent = data.amenities_err || "";
        })
        .catch(error => console.error('Error:', error));
    });

    // Preview image uploads
    const fileInput = document.getElementById("file-upload");
    const previewContainer = document.getElementById("image-preview");
    const addFileBtn = document.getElementById("add-file-btn");

    let selectedFiles = []; // Array to hold the currently selected files

    // Function to preview selected images
    const previewImages = (files) => {
        // Clear the current previews
        previewContainer.innerHTML = '';

        // Update the selectedFiles array
        selectedFiles = Array.from(files);

        for (const file of selectedFiles) {
            const reader = new FileReader();
            const listItem = document.createElement("li");

            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                listItem.appendChild(img);

                const removeBtn = document.createElement("span");
                removeBtn.innerHTML = '<i class="ri-close-line"></i>';
                removeBtn.onclick = () => {
                    // Remove the item from the preview
                    listItem.remove();

                    // Remove the file from the selectedFiles array
                    selectedFiles = selectedFiles.filter(selectedFile => selectedFile !== file);
                    
                    // Update the file input
                    updateFileInput();
                };
                listItem.appendChild(removeBtn);

                previewContainer.appendChild(listItem);
            };

            reader.readAsDataURL(file);
        }
    };

    // Function to update the file input based on selectedFiles
    const updateFileInput = () => {
        // Create a new DataTransfer object to hold the updated files
        const dataTransfer = new DataTransfer();

        // Add all remaining files in selectedFiles to the DataTransfer object
        for (const file of selectedFiles) {
            dataTransfer.items.add(file);
        }

        // Update the input element's files
        fileInput.files = dataTransfer.files;
    };

    // Handle file selection
    fileInput.addEventListener("change", function () {
        previewImages(fileInput.files);
    });

    // Add more file input dynamically
    addFileBtn.addEventListener("click", () => {
        fileInput.click(); // Trigger the input when the button is clicked
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