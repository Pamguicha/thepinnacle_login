<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Nunito:wght@300;600;800;1000&family=Shadows+Into+Light&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Edit page</title>
</head>
<?php
session_start();
//include the database connection file
require_once("dbConnection.php");
?>

<body>
  <img class="logo" src="images/pinnacle-logo.png" alt="an image of the logo of Pinnacle">
  <?php
  include 'navigation.php';
  ?>

  <img class="bigLogo" src="images/pinnacle-logo.png" alt="an image of the logo of Pinnacle">
  <h1 class="title-order"> Edit Page</h1>



  <?php
  include 'footer.php';
  ?>
</body>

</html>