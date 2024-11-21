<?php
// Include the database conneciton file
require_once("dbConnection.php");
session_start();

/*
if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {
  if (filter_input(INPUT_POST, "addNewOrder")) {
    updateOrder();
  }
}

function updateOrder()
{
  global $id_orders, $fullName, $type_beer, $amount, $pickup_day, $pickup_time, $messageEdit;

  try {
    //SQL UPDATE statement
    if ($resultData !== null) {
      $stmt = $conn->prepare("CALL editData(:id_orders, :fullName, :type_beer, :amount, :pickup_day, :pickup_time)");

      $stmt->bindParam(":id_orders", $id_orders);
      $stmt->bindParam(":fullName", $fullName);
      $stmt->bindParam(":type_beer", $type_beer);
      $stmt->bindParam(":amount", $amount);
      $stmt->bindParam(":pickup_day", $pickup_day);
      $stmt->bindParam(":pickup_time", $pickup_time);
      $stmt->execute();
      $messageEdit = "<p>your account has been successfully updated!</p>";
    } else {
      $messageEdit = "An error occurred";
    }
  } catch (PDOException $e) {
    $messageEdit = "database connection failed with the following error: " . $e->getMessage();
  }
  //redirect to cart page
  header("Location: cart.php?message=" . urlencode($messageEdit));
  exit;

}

*/