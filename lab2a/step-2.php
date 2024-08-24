<?php

require "helpers/helper-functions.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $program = trim($_POST['program']);
    $address = trim($_POST['address']);

    if (empty($program) || empty($address)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: step-2.php');
        exit();
    } else {
        $_SESSION['program'] = $program;
        $_SESSION['address'] = $address;
        header('Location: step-3.php');
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
          Registration (Step 2/3)
        </h1>
      </div>
      <div class="p-section--shallow">
        <?php if (isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form action="step-2.php" method="POST">
          <fieldset>
            <label>Program</label>
            <select name="program">
              <option disabled="disabled" selected="">Select an option</option>
              <option value="cs">Computer Science</option>
              <option value="it">Information Technology</option>
              <option value="is">Information Systems</option>
              <option value="se">Software Engineering</option>
              <option value="ds">Data Science</option>
            </select>

            <label>Complete Address</label>
            <textarea name="address" rows="3"></textarea>

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
