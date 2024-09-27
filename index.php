<?php
    $title = "A community-driven platform for quiet spaces";
    $css_file_name = "index";
    include './partials/header.php';
?>

<div class="place-list">
    <form action="#" method="get" class="search-form">
        <i class="ri-search-line"></i>
        <input name="search-place" class="search-place" type="text" placeholder="Search for a library (＾▽＾)">
    </form>

    <div class="place-grid">
        <a href="place-details" class="place-item">
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
        </a>
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

<script>
    // Generate dummy places (remove this)
    const placeGrid = document.querySelector('.place-grid');
    for (let i = 0; i < 9; i++) {
        const placeItemClone = document.querySelector('.place-item').cloneNode(true);
        placeGrid.appendChild(placeItemClone);
    }

    // Close newsletter
    const newsletter = document.querySelector('.newsletter');
    const closeBtn = newsletter.querySelector('.close-btn');
    closeBtn.addEventListener('click', () => {
        newsletter.style.display = 'none';
    });
</script>

<?php
    include './partials/footer.php';
?>