<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Nunito:wght@300;600;800;1000&family=Shadows+Into+Light&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Homepage</title>
</head>

<body>

  <img class="logo" src="images/pinnacle-logo.png" alt="an image of the logo of Pinnacle">
  <?php
  include 'navigation.php';
  ?>

  <img class="bigLogo" src="images/pinnacle-logo.png" alt="an image of the logo of Pinnacle">
  <?php
  require_once("dbconnection.php");
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }


  if (isset($_SESSION["firstName"])) {
    echo "<h1>Welcome to our online shop " . htmlspecialchars($_SESSION["firstName"]) . " submit your order <a href='order.php'>here </a> </h1>";
  } else {
    echo "<h1>You need to log in here to use this website: <a href='login.php'> Login Page </a> </h1>";
  }
  ?>
  <form action="logout.php" method="post">
    <input class="logoutBtn" type="submit" value="Logout">
  </form>


  <?php
  include 'footer.php';
  ?>
</body>

</html>