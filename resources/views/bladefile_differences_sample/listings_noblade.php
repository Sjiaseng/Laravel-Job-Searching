<!-- Showing Differences between Blade File & Non-Blade File -->

<!-- <h1>Listings</h1> -->
<h1><?php echo $heading; ?></h1>

<?php foreach($listings as $listing): ?>

    <a href='/listingstest/<?php echo $listing['id']?>'>
        <h2>
            <?php echo $listing['title']; ?>
        </h2>
    </a>
    <p>
        <?php echo $listing['description']; ?>
    </p>

<?php endforeach; ?>
