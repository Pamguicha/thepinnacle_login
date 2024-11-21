<?php
session_start();
//include the database connection file
require_once("dbconnection.php");

$orders = $_SESSION['orders'] ?? [];
$messageCart = $_SESSION['messageCart'] ?? null;

?>



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
    <?php echo htmlspecialchars($_SESSION['fullName'] ?? ''); ?>
    <?php echo htmlspecialchars($_SESSION['type_beer'] ?? ''); ?>
    <?php echo htmlspecialchars($_SESSION['amount'] ?? ''); ?>
    <?php echo htmlspecialchars($_SESSION['pickup_day'] ?? ''); ?>
    <?php echo htmlspecialchars($_SESSION['pickup_time'] ?? ''); ?>


    <tr>
      <th> Full name </th>
      <th> Beer type </th>
      <th> Amount </th>
      <th> Pick up day </th>
      <th> Pick up time</th>
    </tr>

    <?php foreach ($orders as $order): ?>
      <tr>
        <td><?php echo htmlspecialchars($order['fullName']); ?></td>
        <td><?php echo htmlspecialchars($order['type_beer']); ?></td>
        <td><?php echo htmlspecialchars($order['amount']); ?></td>
        <td><?php echo htmlspecialchars($order['pickup_day']); ?></td>
        <td><?php echo htmlspecialchars($order['pickup_time']); ?></td>
        <td>
          <?php echo "<a href=\"edit.php?id_orders=" . htmlspecialchars($order['id_orders']) . "\">Edit</a> | 
               <a href=\"delete.php?id_orders=" . htmlspecialchars($order['id_orders']) . "\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"; ?>

        </td>
      </tr>
    <?php endforeach; ?>
  </table>


  <?php
  include 'footer.php';
  ?>
</body>

</html>