<?php

require "helpers/helper-functions.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = trim($_POST['fullname']);
    $birthdate = trim($_POST['birthdate']);
    $contact_number = trim($_POST['contact_number']);
    $sex = trim($_POST['sex']);

    if (empty($fullname) || empty($birthdate) || empty($contact_number) || empty($sex)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: step-1.php');
        exit();
    } else {
        $_SESSION['fullname'] = $fullname;
        $_SESSION['birthdate'] = $birthdate;
        $_SESSION['contact_number'] = $contact_number;
        $_SESSION['sex'] = $sex;
        header('Location: step-2.php');
        exit();
    }
}

?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
      <h1>
      Registration (Step 1/3)
      </h1>
      </div>
      <div class="p-section--shallow">
        <?php if (isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form action="step-1.php" method="POST">
            <fieldset>
                <label>Complete Name</label>
                <input type="text" name="fullname" placeholder="John Doe">

                <label>Birthdate</label>
                <input type="date" name="birthdate">

                <label>Contact Number</label>
                <input type="text" name="contact_number" placeholder="+639123456789">

                <label>Sex</label>
                <br />
                <input type="radio" name="sex" value="male" checked="checked">Male
                <br />
                <input type="radio" name="sex" value="female">Female
                <br />

                <button type="submit">Next</button>
            </fieldset>
        </form>
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
