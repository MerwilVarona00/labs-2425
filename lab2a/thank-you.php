<?php

require "helpers/helper-functions.php";

session_start();

// Check if session variables are set before using them
$fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : 'N/A';
$birthdate = isset($_SESSION['birthdate']) ? $_SESSION['birthdate'] : 'N/A';
$contact_number = isset($_SESSION['contact_number']) ? $_SESSION['contact_number'] : 'N/A';
$sex = isset($_SESSION['sex']) ? $_SESSION['sex'] : 'N/A';
$program = isset($_SESSION['program']) ? $_SESSION['program'] : 'N/A';
$address = isset($_SESSION['address']) ? $_SESSION['address'] : 'N/A';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'N/A';
$agree = isset($_SESSION['agree']) ? $_SESSION['agree'] : 'N/A';

// Calculate age based on birthdate
$birthdate = date_create($birthdate);
$today = date_create(date('Y-m-d'));
$age = date_diff($today, $birthdate)->y;


?>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank You</title>
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
      <h1>
      Registration Complete
      </h1>
      </div>
      <div class="p-section--shallow">
        <p>Thank you for registering, <?php echo htmlspecialchars($fullname); ?>.</p>
        <p>Your details:</p>
        <ul>
            <li>Complete Name: <?php echo htmlspecialchars($fullname); ?></li>
            <li>Birthdate: <?php echo $birthdate->format('F j, Y'); ?></li>
            <li>Age: <?php echo $age; ?> years old</li>
            <li>Contact Number: <?php echo htmlspecialchars($contact_number); ?></li>
            <li>Sex: <?php echo htmlspecialchars($sex); ?></li>
            <li>Program: <?php echo htmlspecialchars($program); ?></li>
            <li>Complete Address: <?php echo htmlspecialchars($address); ?></li>
            <li>Email: <?php echo htmlspecialchars($email); ?></li>
            <li>Agreed to Terms: <?php echo $agree === 'on' ? 'Yes' : 'No'; ?></li>
        </ul>
      </div>
    </div>

    <div class="col">
      <div class="p-image-container--3-2 is-cover">
        <img class="p-image-container__image" src="https://www.auf.edu.ph/home/images/ittc.jpg" alt="">
      </div>
    </div>
  </div>
</section>

</body>
</html>

<?php
session_unset();
session_destroy();
?>
