<h1><?php echo $heading; ?>Listing</h1>
<?php foreach($listings as $listing): ?>
    <h2><?php echo $listing['title']; ?></h2>
    <h3><?php echo $listing['id']; ?></h3>
    <p><?php echo $listing['desc']; ?></p>
<?php endforeach; ?>