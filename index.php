<?php
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

        <?php if (isset($_SESSION['username'])) { ?>
            <p class="new-library">Didn't find the library? <span class="add-library">Click here to add it!</span></p>
        <?php } ?>

        <form class="search-form" id="search-place-form">
            <i class="ri-search-line"></i>
            <input name="search-place" class="search-place" id="search-place-input" type="text" placeholder="Search for a library (＾▽＾)">
        </form>

        <div class="place-grid">
            <!-- <div class="place-item">
                <div class="content">
                    <h3 class="place-name">National Library of the Philippines</h3>
                    <i class="ri-map-pin-line"></i>
                    <h5 class="place-address">Ermita, Manila</h5>
                </div>
            </div> -->
        </div>
    </div>

    <!-- Place Detail -->
    <div class="place-detail">
        <button class="back-btn"><i class="ri-arrow-left-line"></i> Back</button>

        <h1 class="name"></h1>
        <!-- <div class="ratings">
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-half-line"></i>
            <i class="ri-star-line"></i>
        </div>
        <span class="bullet">&bull;</span> -->

        <p class="last-updated"></p>
        <p class="address"></p>

        <div class="place-images-preview">
            <!-- <img src="./images/sample-library.jpeg" alt="">
            <img src="./images/sample-library-2.jpg" alt="">
            <img src="./images/sample-library-3.jpg" alt="">
            <img src="./images/sample-library-4.jpg" alt="">
            <img src="./images/sample-library-2.jpg" alt=""> -->
        </div>

        <h2 class="about">About</h2>
        <p style="white-space: pre-wrap;" class="about-content"></p>

        <div class="amenities">
            <!-- <h2>Amenities °˖✧◝(⁰▿⁰)◜✧˖°</h2>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Free WiFi</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Fully Air Conditioned</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Charging outlets</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Comfort room (inside)</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Printing/Photocopy Available</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Public PCs Available</p>
            <p class="amenity"><i class="ri-checkbox-circle-fill"></i>Book Clubs Every Wednesday</p> -->
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

        <?php if (isset($_SESSION['username'])) { ?>
            <p class="edit-place-redirect"><i class="ri-pencil-line"></i>Edit place</p>
        <?php } ?>
    </div>

    <!-- Manage Place -->
    <div class="manage-place">
        <button type="button" class="back-btn"><i class="ri-arrow-left-line"></i> Back</button>
        <h2>Save Library</h2>

        <form id="manage-place-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="library_id" id="library-id">

            <label for="location-address">Location<span class="special-asterisk">*</span></label>
            <p class="note">Note: You can click <span class="highlight">anywhere on the map</span> - or more simply you can just <span class="highlight">click the button below</span> if you are at the location right now:</p>
            <i class="ri-map-pin-line"></i><button type="button" class="current-loc-btn">Use my current location</button>

            <textarea class="dynamic-textarea" id="location-address" name="location_address" placeholder="No location selected" disabled></textarea>
            <input type="text" name="short_address" id="short-address" hidden>
            <input type="text" name="latitude" id="latitude" hidden>
            <input type="text" name="longitude" id="longitude" hidden>
            <p class="location-error status"></p>

            <label for="place-name">Name<span class="special-asterisk">*</span></label>
            <input id="place-name" name="place_name" type="text" placeholder="Enter name of place">
            <p class="name-error status"></p>

            <label for="place-about">About</label>
            <textarea class="dynamic-textarea" name="place_about" id="place-about" placeholder="What do you know about this place? (optional)"></textarea>

            <label for="file-upload">Images<span class="special-asterisk">*</span></label>
            <input type="file" name="place_images[]" id="file-upload" multiple accept="image/*" hidden>
            <p class="place-images-error status"></p>
            <button type="button" id="add-file-btn"><i class="ri-add-circle-line"></i>Add Images</button>
            <ul id="image-preview" class="sortable">
                <!-- Preview images will be added here -->
            </ul>
            <input type="hidden" name="existing_images" id="existing-images">

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

        <form id="newsletter-form" method="POST">
            <input name="email" class="email" type="text" placeholder="Enter email">
            <input class="subscribe-btn" name="newsletter_subscribe" type="submit" value="Subscribe (•‿•)">
            <span class="status"></span>
        </form>
    </div>

    <i class="ri-close-line close-btn"></i>
</div>

<!-- Sortable JS: Drag to change order of items in a list -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>

<script>
    // Newsletter functionalities:
    const newsletter = document.querySelector('.newsletter');
    const newsletterForm = document.querySelector('#newsletter-form');
    const newsletterStatus = newsletterForm.querySelector('.status');

    // Hide/display
    if (localStorage.getItem('newsletter_subscribed') === null) {
        newsletter.style.display = 'flex';
    } else {
        newsletter.style.display = 'none';
    }

    // Subscribe
    newsletterForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        formData.append('newsletter_subscribe', true);

        fetch('./api/newsletter-subscribe', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                newsletterStatus.style.display = 'inline';

                if (data.success) {
                    localStorage.setItem('newsletter_subscribed', true);
                    newsletterStatus.textContent = data.message;
                    setTimeout(() => {
                        newsletter.style.display = 'none';
                    }, 1800);
                } else {
                    newsletterStatus.textContent = data.errors.email_err || data.errors.db_err;
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Close
    newsletter.querySelector('.close-btn').addEventListener('click', () => {
        localStorage.setItem('newsletter_subscribed', true);
        newsletter.style.display = 'none';
    });

    function showPlaceDetail(library) {
        const placeDetail = document.querySelector('.place-detail');
        placeDetail.querySelector('.name').innerHTML = library.name;

        const date = new Date(library.date_updated || library.date_added);
        // Format the date and time
        const options = {
            year: 'numeric',
            month: 'long', // e.g., "October"
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            hour12: true // Change to false for 24-hour format
        };
        const formattedDate = date.toLocaleString('en-US', options);
        placeDetail.querySelector('.last-updated').innerHTML = `Last updated: ${formattedDate} by <span class="contributor">${library.username}</span>`;

        placeDetail.querySelector('.address').innerHTML = `<i class="ri-map-pin-line"></i><span class="full">${library.location_address}</span>`;

        const placeImagesPreview = document.querySelector('.place-images-preview');
        placeImagesPreview.innerHTML = '';
        library.place_images?.forEach(placeImage => {
            const img = document.createElement('img');
            img.src = placeImage.file_path.slice(1);
            img.alt = "Place image";
            placeImagesPreview.appendChild(img);
        });

        if (library.about !== "") {
            placeDetail.querySelector('.about').style.display = 'block';
            placeDetail.querySelector('.about-content').style.display = 'block';
            placeDetail.querySelector('.about-content').innerHTML = library.about;
        } else {
            placeDetail.querySelector('.about').style.display = 'none';
            placeDetail.querySelector('.about-content').style.display = 'none';
            placeDetail.querySelector('.about-content').innerHTML = '';
        }

        const amenities = placeDetail.querySelector('.amenities');
        amenities.innerHTML = '<h2>Amenities °˖✧◝(⁰▿⁰)◜✧˖°</h2>';
        library.amenities.split(", ").forEach(amenity => {
            const amenityItem = document.createElement('p');
            amenityItem.classList.add('amenity');
            amenityItem.innerHTML = `<i class="ri-checkbox-circle-fill"></i>${amenity}`;
            amenities.appendChild(amenityItem);
        });

        document.querySelector('.edit-place-redirect')?.addEventListener('click', () => {
            enableMapClick();
            editPlace(library);
        });

        document.querySelector('.place-list').style.display = 'none';
        placeDetail.style.display = 'block';
    }

    function decodeHTMLEntities(str) {
        const textArea = document.createElement('textarea');
        textArea.innerHTML = str;
        return textArea.value;
    }

    function editPlace(library) {
        const managePlace = document.querySelector('.manage-place');

        const locationAddress = managePlace.querySelector('#location-address');
        locationAddress.innerHTML = library.location_address;
        autoResizeTextarea(locationAddress);

        managePlace.querySelector('#library-id').value = library.id;
        managePlace.querySelector('#short-address').value = library.short_address;
        managePlace.querySelector('#latitude').value = library.latitude;
        managePlace.querySelector('#longitude').value = library.longitude;
        managePlace.querySelector('#place-name').value = decodeHTMLEntities(library.name);

        const placeAbout = managePlace.querySelector('#place-about');
        placeAbout.innerHTML = library.about;
        autoResizeTextarea(placeAbout);

        previewContainer.innerHTML = '';
        existingImageFilePaths = [];
        library.place_images?.forEach(image => {
            const listItem = document.createElement("li");
            const img = document.createElement("img");
            img.src = image.file_path.slice(1);
            listItem.appendChild(img);

            existingImageFilePaths.push(image.file_path);
            document.querySelector('#existing-images').value = JSON.stringify(existingImageFilePaths);

            const removeBtn = document.createElement("span");
            removeBtn.innerHTML = '<i class="ri-close-line"></i>';
            removeBtn.onclick = () => {
                listItem.remove();
                existingImageFilePaths = existingImageFilePaths.filter(path => path !== image.file_path);
                document.querySelector('#existing-images').value = JSON.stringify(existingImageFilePaths);
            };

            listItem.appendChild(removeBtn);
            previewContainer.appendChild(listItem);
        });

        const amenitiesList = document.getElementById('amenities-list');
        amenitiesList.innerHTML = '';
        library.amenities.split(",").forEach(amenity => {
            const container = document.createElement('div');
            container.classList.add('input-container');

            const input = document.createElement('input');
            input.type = 'text';
            input.value = decodeHTMLEntities(amenity);
            input.name = 'amenities[]'; // This allows you to submit all inputs as an array
            input.placeholder = 'Enter amenity';

            const removeBtn = document.createElement('button');
            removeBtn.textContent = 'Remove';
            removeBtn.type = 'button';
            removeBtn.classList.add('remove-btn');
            removeBtn.onclick = function() {
                this.parentElement.remove(); // Removes the parent div when clicked
            };

            container.appendChild(input);
            container.appendChild(removeBtn);

            amenitiesList.appendChild(container);
        });


        document.querySelector('.place-detail').style.display = 'none';
        managePlace.style.display = 'block';
    }

    function setupLibraryMarker(library) {
        const popup = new mapboxgl.Popup({
                offset: 25,
                closeButton: false, // Remove close button
                closeOnClick: false // Prevent closing when clicking outside
            })
            .setHTML('<i class="ri-book-marked-line"></i>');

        const marker = new mapboxgl.Marker({
                color: '#E74C3C'
            })
            .setLngLat([library.longitude, library.latitude])
            .setPopup(popup)
            .addTo(map);

        popup.addTo(map);

        markers.push(marker);

        marker.getElement().addEventListener('click', () => {
            map.setCenter([library.longitude, library.latitude]);
            map.setZoom(14);

            markers.forEach(current => {
                if (current !== marker) {
                    // remove() only removes the marker from being displayed on the map, but doesn't alter the markers array
                    current.remove();
                }
            });
            showPlaceDetail(library);
        });

        return marker;
    }

    let markers = [];

    // Retrieve libraries
    function retrieveLibraries() {
        const placeGrid = document.querySelector('.place-grid');
        // To refresh the UI with new data again
        placeGrid.innerHTML = '';

        markers.forEach(marker => marker.remove());

        fetch("./api/retrieve-place-list", {
                method: "GET"
            })
            .then(response => response.json())
            .then(data => {
                // Initial list
                if (data.success) {
                    data.places.forEach(library => {
                        const placeItem = document.createElement('div');
                        placeItem.classList.add('place-item');

                        placeItem.innerHTML = `
                            <div class="content">
                                <h3 class="place-name">${library.name}</h3>
                                <i class="ri-map-pin-line"></i>
                                <h5 class="place-address">${library.short_address}</h5>
                            </div>
                        `;

                        if (library.preview_image_file_path != null) {
                            placeItem.style.backgroundImage = `url('${library.preview_image_file_path.slice(1)}')`;
                        } else {
                            placeItem.style.background = "#1D1D1D";
                        }

                        const marker = setupLibraryMarker(library);

                        placeItem.addEventListener('click', () => {
                            markers.forEach(current => current.remove());
                            marker.addTo(map);

                            map.setCenter([library.longitude, library.latitude]);
                            map.setZoom(14);

                            showPlaceDetail(library);
                        });

                        placeGrid.appendChild(placeItem);
                    });

                    // List with searching
                    const searchPlaceInput = document.querySelector('#search-place-input');
                    searchPlaceInput.addEventListener('input', () => {
                        const searchTerm = searchPlaceInput.value.toLowerCase();
                        const filteredLibraries = data.places.filter(library =>
                            library.name.toLowerCase().includes(searchTerm) ||
                            library.short_address.toLowerCase().includes(searchTerm)
                        );

                        // Clear existing items
                        placeGrid.innerHTML = '';

                        markers.forEach(marker => marker.remove());
                        markers = [];

                        filteredLibraries.forEach(library => {
                            const placeItem = document.createElement('div');
                            placeItem.classList.add('place-item');

                            placeItem.innerHTML = `
                            <div class="content">
                                <h3 class="place-name">${library.name}</h3>
                                <i class="ri-map-pin-line"></i>
                                <h5 class="place-address">${library.short_address}</h5>
                            </div>
                        `;

                            placeItem.style.backgroundImage = `url('${library.preview_image_file_path.slice(1)}')`;

                            const marker = setupLibraryMarker(library);

                            placeItem.addEventListener('click', () => {
                                markers.forEach(current => current.remove());
                                marker.addTo(map);

                                map.setCenter([library.longitude, library.latitude]);
                                map.setZoom(14);

                                showPlaceDetail(library);
                            });

                            placeGrid.appendChild(placeItem);
                        });
                    });
                } else {
                    if (data.errors) {
                        console.log(data.errors);
                    } else {
                        console.log(data.message);
                    }
                }
            })
            .catch(error => console.error('Error:', error));
    }

    document.addEventListener('DOMContentLoaded', () => {
        retrieveLibraries();
    });

    // Go back to place list
    const backBtns = document.querySelectorAll('.back-btn');
    backBtns.forEach(backBtn => {
        backBtn.addEventListener('click', () => {
            // Handle UI changes
            document.querySelector('.place-list').style.display = 'block';
            document.querySelector('.place-detail').style.display = 'none';
            document.querySelector('.manage-place').style.display = 'none';

            document.querySelector('#search-place-form').reset();

            // From: Place list or detail
            markers.forEach(marker => marker.remove());
            // markers.forEach(marker => {
            //     marker.addTo(map).togglePopup();
            // });
            retrieveLibraries();
            map.setZoom(11);

            // From: Manage place
            clickMarkers.forEach(clickMarker => clickMarker.remove());
            clickMarkers = [];
            currentLocMarkers.forEach(currentLocMarker => currentLocMarker.remove());
            currentLocMarkers = [];
            disableMapClick();
            resetManagePlaceForm();
        });
    });

    // Prevent search place from refreshing the page
    document.querySelector('#search-place-form').addEventListener('submit', (e) => {
        e.preventDefault();
    });

    document.querySelector('.add-library')?.addEventListener('click', () => {
        document.querySelector('.manage-place').style.display = 'block';
        document.querySelector('.place-list').style.display = 'none';

        markers.forEach(marker => marker.remove());
        enableMapClick();
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

    let clickMarkers = [];
    let currentLocMarkers = [];
    let isMapClickEnabled = false;

    function handleMapClick(e) {
        savePlaceUsingMapClick(e);
    }

    function enableMapClick() {
        if (!isMapClickEnabled) {
            map.on('click', handleMapClick);
            isMapClickEnabled = true;
        }
    }

    function disableMapClick() {
        if (isMapClickEnabled) {
            map.off('click', handleMapClick);
            isMapClickEnabled = false;
        }
    }

    function savePlaceUsingMapClick(e) {
        // Clear current location markers
        currentLocMarkers.forEach(marker => marker.remove());
        currentLocMarkers = []; // Reset the markers array

        // Clear displayed markers
        markers.forEach(marker => marker.remove());

        const lngLat = e.lngLat; // Get the clicked coordinates

        // Clear existing markers
        clickMarkers.forEach(marker => marker.remove());
        clickMarkers = []; // Reset the markers array

        // Add a new marker at the clicked location
        const newMarker = new mapboxgl.Marker({
                color: '#E74C3C'
            })
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
    }

    document.querySelector('.current-loc-btn').addEventListener('click', savePlaceUsingCurrentLoc);

    function savePlaceUsingCurrentLoc() {
        // Clear clicked markers
        clickMarkers.forEach(marker => marker.remove());
        clickMarkers = []; // Reset the markers array

        // Clear displayed markers
        markers.forEach(marker => marker.remove());

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                const userLocation = [position.coords.longitude, position.coords.latitude];
                // console.log("Current Location:", userLocation);

                // Clear existing markers
                currentLocMarkers.forEach(marker => marker.remove());
                currentLocMarkers = []; // Reset the markers array

                // Optionally, add a marker for the user's location
                const newMarker = new mapboxgl.Marker({
                        color: '#E74C3C'
                    })
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
        /*
            - Using setTimeout with a delay of 0 milliseconds effectively places 
            the resizing of the textarea at the end of the event queue.

            - Using setTimeout with a delay of 0 milliseconds is a handy trick 
            in JavaScript. It allows you to defer execution until the current 
            call stack is clear, effectively waiting for the browser to complete
            its rendering before proceeding with the next action. This is 
            useful for tasks like resizing elements or updating the UI to ensure 
            they reflect the latest state accurately.
        */
        setTimeout(() => {
            textarea.style.height = textarea.scrollHeight + 'px'; // Set to the new height
        }, 0);
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

    // Textareas with auto-resize
    const dynamicTextareas = document.querySelectorAll('.dynamic-textarea');
    dynamicTextareas.forEach((dynamicTextarea) => {
        dynamicTextarea.addEventListener('input', () => {
            dynamicTextarea.style.height = 'auto';
            dynamicTextarea.style.height = dynamicTextarea.scrollHeight + 'px';
        });
    });

    function resetManagePlaceForm() {
        document.querySelector('#manage-place-form').reset();

        document.querySelector('#library-id').value = '';
        document.querySelector('#file-upload').value = '';
        document.querySelector('#existing-images').value = '';

        document.querySelector('#location-address').innerHTML = '';
        document.querySelector('#place-about').innerHTML = '';
        document.querySelector('#image-preview').innerHTML = '';
        document.querySelector('#amenities-list').innerHTML = '';

        existingImageFilePaths = [];
        selectedFiles = [];

        document.querySelector('.location-error').textContent = "";
        document.querySelector('.name-error').textContent = "";
        document.querySelector('.place-images-error').textContent = "";
        document.querySelector('.amenities-error').textContent = "";
    }

    // Manage place form
    document.querySelector('#manage-place-form').addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent the default form submission

        const locationAddress = document.querySelector('#location-address');
        locationAddress.disabled = false;

        const formData = new FormData(e.target); // Create FormData object from the form
        formData.append(e.submitter.name, true);

        // This will show all form data in the console
        // for (let [key, value] of formData.entries()) {
        //     console.log(`${key} = ${value}`);
        // }

        // console.log(JSON.parse(formData.get('existing_images')));

        fetch("./api/manage-place", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                locationAddress.disabled = true;
                if (data.success) {
                    resetManagePlaceForm();
                    markers.forEach(marker => marker.remove());
                    retrieveLibraries();
                    map.setZoom(11);

                    document.querySelector('.manage-place').style.display = 'none';
                    document.querySelector('.place-list').style.display = 'block';

                    clickMarkers.forEach(marker => marker.remove());
                    clickMarkers = [];

                    currentLocMarkers.forEach(marker => marker.remove());
                    currentLocMarkers = [];

                    disableMapClick();
                } else {
                    console.log(data);

                    document.querySelector('.location-error').textContent = data.errors.location_err || "";
                    document.querySelector('.name-error').textContent = data.errors.name_err || "";
                    document.querySelector('.place-images-error').textContent = data.errors.images_err || "";
                    document.querySelector('.amenities-error').textContent = data.errors.amenities_err || "";
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Preview image uploads
    const fileInput = document.getElementById("file-upload");
    const previewContainer = document.getElementById("image-preview");
    const addFileBtn = document.getElementById("add-file-btn");

    let existingImageFilePaths = [];
    let selectedFiles = []; // Array to hold the currently selected files

    // Function to preview selected images
    const previewImages = (newFiles) => {
        const newSelectedFiles = Array.from(newFiles);

        // Update the selectedFiles array without overriding existing files
        selectedFiles = [...selectedFiles, ...newSelectedFiles];

        newSelectedFiles.forEach((file) => {
            const reader = new FileReader();
            const listItem = document.createElement("li");

            reader.onload = function(e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                listItem.appendChild(img);

                const removeBtn = document.createElement("span");
                removeBtn.innerHTML = '<i class="ri-close-line"></i>';
                removeBtn.onclick = () => {
                    // Remove the item from the preview
                    listItem.remove();

                    // Remove the file from selectedFiles array
                    selectedFiles = selectedFiles.filter(f => f !== file);

                    // Update the file input after removal
                    updateFileInput();
                };
                listItem.appendChild(removeBtn);

                previewContainer.appendChild(listItem);
            };

            reader.readAsDataURL(file);
        });

        // Update the file input after adding new files
        updateFileInput();
    };

    // Function to update the file input based on selectedFiles
    const updateFileInput = () => {
        const dataTransfer = new DataTransfer();

        // Add all remaining files in selectedFiles to the DataTransfer object
        selectedFiles.forEach(file => dataTransfer.items.add(file));

        // Update the input element's files
        fileInput.files = dataTransfer.files;
    };

    // Handle file selection
    fileInput.addEventListener("change", function() {
        // Pass only the newly selected files
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
        removeBtn.onclick = function() {
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