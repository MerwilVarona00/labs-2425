<?php

require "Profile.php";

// Create a new Profile object
$profile = new Profile(
    "Varona",
    "Merwil",
    "Garabiles"
);

// Set email and address
$profile->setEmail('varona.merwil@auf.edu.ph');
$profile->setAddress('Barangay Cuayan, Angeles City, Philippines 2009');

// Set favorite quote
$profile->setFavoriteQuote('"Most powerful is he who has himself in his own power."');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profile: <?php echo $profile->getCompleteName(); ?></title>
</head>
<body>
<div class="card">
    <div class="card2">
        <h1><?php echo $profile->getCompleteName(); ?></h1>
        <h2><?php echo $profile->getEmail(); ?></h2>
        <h2><?php echo $profile->getAddress(); ?></h2>
        <p><?php echo $profile->getFavoriteQuote(); ?></p>
    </div>
</div>
</body>
</html>
