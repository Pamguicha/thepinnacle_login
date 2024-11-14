<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Here</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Nunito:wght@300;600;800;1000&family=Shadows+Into+Light&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Order page | The Pinnacle </title>
</head>

<?php
session_start();
$fullName = isset($_SESSION['fullName']) ? $_SESSION['fullName'] : '';
$type_beer = isset($_SESSION['type_beer']) ? $_SESSION['type_beer'] : '';
$amount = isset($_SESSION['amount']) ? $_SESSION['amount'] : '';
$pickup_day = isset($_SESSION['pickup_day']) ? $_SESSION['pickup_day'] : '';
$pickup_time = isset($_SESSION['pickup_time']) ? $_SESSION['pickup_time'] : '';


// Clear specific order details after processing
unset($_SESSION['fullName']);
unset($_SESSION['type_beer']);
unset($_SESSION['amount']);
unset($_SESSION['pickup_day']);
unset($_SESSION['pickup_time']);
//include the database connection file
require_once("dbConnection.php");
?>

<body>

  <img class="logo" src="images/pinnacle-logo.png" alt="an image of the logo of Pinnacle">
  <?php
  include 'navigation.php';
  ?>
  <h1 class="title-order"> Order Your Beers Here</h1>

  <form class="orderForm" method="POST" action="addorderpage.php">
    <label class="orderInputLabel" for="fullName">Full name
      <input class="orderInputClass" type="text" name="fullName" value="<?php echo $fullName; ?>">
    </label>
    <br>
    <label class="orderInputLabel" for="beerstype">Beer type
      <input class="orderInputClass" type="text" name="type_beer" value="<?php echo $type_beer; ?>">
    </label>
    <br>
    <label class="orderInputLabel" for="amount">Amount
      <input class="orderInputClass" type="text" name="amount" value="<?php echo $amount; ?>">
    </label>
    <br>
    <label class="orderInputLabel" for="pickUpDay">Pick up day
      <input class="orderInputClass" type="text" name="pickup_day" value="<?php echo $pickup_day; ?>">
    </label>
    <br>
    <label class="orderInputLabel" for="pickUpTime">Pick up time
      <input class="orderInputClass" type="text" name="pickup_time" value="<?php echo $pickup_time; ?>"
        placeholder="Only from 9:00 am to 5:00 pm">
    </label>
    <br>
    <div class="containerBtns">
      <input class="addBtn" type="submit" name="addNewOrder" value="Add New Order">
      <br>
      <input class="viewBtn" type="submit" name="viewData" value="View Cart">
    </div>
    <div name="messageOrder">
      <?php
      if (isset($_GET['message'])) {
        $messageOrder = urldecode($_GET['message']);
        echo $messageOrder;
      }
      ?>
    </div>
  </form>


  <?php
  include 'footer.php';
  ?>
</body>

</html>