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
  <title>Welcome to the login page</title>
</head>
<?php
require_once("dbconnection.php");
session_start();

?>

<body>
  <img class="logo" src="images/pinnacle-logo.png" alt="an image of the logo of Pinnacle">
  <?php
  include 'navigation.php';
  ?>

  <main class="containerDiv">
    <h1 class="title-beer containerOne">
      Craft <br>Amber <br>Ale<br>
    </h1>
    <form action="add.php" method="post" name="add" class="loginForm containerTwo">
      <h2 class="loginTitle">Login</h2>
      <label class="inputText" for="email">Email
        <br>
        <input class="inputClassLogin" type="text" name="email">
      </label>
      <br>
      <label class="inputText" for="firstName">Name
        <br>
        <input class="inputClassLogin" type="text" name="firstName">
      </label>
      <br>
      <label class="inputText" for="password">Password
        <br>
        <input class="inputClassLogin" type="password" name="password">
      </label>
      <br>
      <input class="loginbtn" type="submit" name="logincredentials" value="Login">
      <br>
      <?php
      if (isset($_SESSION['error'])) {
        echo "<label> {$_SESSION['error']} </label>";
        unset($_SESSION['error']); //clear the error message
      }
      ?>
    </form>
    <div class="containerThree">
      empty
      empty
    </div>
  </main>
  <?php
  include 'footer.php';
  ?>
</body>

</html>