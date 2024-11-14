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
  <title>Cart Page</title>
</head>

<?php
session_start();
//include the database connection file
require_once("dbconnection.php");

// Call the displayData function to fetch and store data
displayData();

?>

<body>
  <img class="logo" src="images/pinnacle-logo.png" alt="an image of the logo of Pinnacle">
  <?php
  include 'navigation.php';
  ?>
  <h1 class="title-order"> Shopping Cart</h1>
  <div name="messageCart">
    <?php
    if (isset($_SESSION['messageCart'])) {
      echo "<p>" . htmlspecialchars($_SESSION['messageCart']) . "</p>";
      unset($_SESSION['messageCart']); // Clear the message after displaying
    } ?>
  </div>
  <table class="databaseContainer">
    <tr>
      <td><strong>Full name</strong></td>
      <td><strong>Beer type</strong></td>
      <td><strong>Amount</strong></td>
      <td><strong>Pick up day</strong></td>
      <td><strong>Pick up time</strong></td>
    </tr>
    <tr>
      <td><strong><?php echo htmlspecialchars($_SESSION['fullName'] ?? ''); ?> </strong></td>
      <td><strong><?php echo htmlspecialchars($_SESSION['type_beer'] ?? ''); ?> </strong></td>
      <td><strong><?php echo htmlspecialchars($_SESSION['amount'] ?? ''); ?></strong></td>
      <td><strong><?php echo htmlspecialchars($_SESSION['pickup_day'] ?? ''); ?> </strong></td>
      <td><strong><?php echo htmlspecialchars($_SESSION['pickup_time'] ?? ''); ?> </strong></td>
    </tr>
  </table>
  <form action="addorderpage.php" method="post">
    <input type="submit" value="edit" name="edit">
    <br>
    <input type="submit" value="delete" name="delete">
  </form>
  <?php
  include 'footer.php';
  ?>
</body>

</html>