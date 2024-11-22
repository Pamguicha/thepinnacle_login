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


try {
  $id_orders = (int) $_GET['id_orders'];
  $stmt = $conn->prepare("SELECT * FROM orderBeers WHERE id_orders = :id_orders");
  $stmt->bindParam(":id_orders", $id_orders, PDO::PARAM_INT);
  $stmt->execute();

  //fetch the next row of the result set as an associative array
  $resultData = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($resultData) {
    $fullName = $resultData['fullName'];
    $type_beer = $resultData['type_beer'];
    $amount = $resultData['amount'];
    $pickup_day = $resultData['pickup_day'];
    $pickup_time = $resultData['pickup_time'];
  } else {
    echo " ";
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>

<body>
  <img class="logo" src="images/pinnacle-logo.png" alt="an image of the logo of Pinnacle">
  <?php
  include 'navigation.php';
  ?>
  <h1 class="title-order"> Edit Page</h1>

  <form class="editForm" method="POST" action="editAction.php">
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
      <input class="orderInputClass" type="text" name="pickup_time" placeholder="Only from 9:00 am to 5:00 pm"
        value="<?php echo $pickup_time; ?>">
    </label>
    <br>
    <input type="hidden" name="id_orders" value="<?php echo $id_orders; ?>">


    <input class="editBtnClass" type="submit" name="editOrder" value="Update Order">
    <br>
    <?php
    if (isset($_GET['message'])) {
      $messageEdit = urldecode($_GET['message']);
      echo $messageEdit;
    }
    ?>
    </div>
  </form>


  <?php
  include 'footer.php';
  ?>
</body>

</html>