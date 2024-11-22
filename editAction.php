<?php
// Include the database connection file
require_once("dbconnection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["editOrder"])) {
    updateOrder($conn);
  }
}

function updateOrder($conn)
{
  // Get the inputted values
  $fullName = filter_input(INPUT_POST, "fullName", FILTER_SANITIZE_STRING);
  $type_beer = filter_input(INPUT_POST, "type_beer", FILTER_SANITIZE_STRING);
  $amount = filter_input(INPUT_POST, "amount", FILTER_SANITIZE_STRING);
  $pickup_day = filter_input(INPUT_POST, "pickup_day", FILTER_SANITIZE_STRING);
  $pickup_time = filter_input(INPUT_POST, "pickup_time", FILTER_SANITIZE_STRING);
  $id_orders = filter_input(INPUT_POST, "id_orders", FILTER_SANITIZE_STRING);

  try {
    // Check if the order exists
    $stmt = $conn->prepare("SELECT * FROM orderBeers WHERE id_orders = :id_orders");
    $stmt->bindParam(":id_orders", $id_orders);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      // Call stored procedure to update the order
      $stmt = $conn->prepare("CALL editData(:fullName, :type_beer, :amount, :pickup_day, :pickup_time, :id_orders)");
      $stmt->bindParam(":fullName", $fullName);
      $stmt->bindParam(":type_beer", $type_beer);
      $stmt->bindParam(":amount", $amount);
      $stmt->bindParam(":pickup_day", $pickup_day);
      $stmt->bindParam(":pickup_time", $pickup_time);
      $stmt->bindParam(":id_orders", $id_orders);
      $stmt->execute();
      $messageEdit = "<p> <font color='green'> <margin = 'auto'> Your order has been successfully updated!" . " <a href='cart.php'>View Order Here</a>";
    } else {
      $messageEdit = "Order not found.";
    }
  } catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    $messageEdit = "An error occurred while updating your order.";
  }

  // Redirect to edit page
  header("Location: edit.php?message=" . urlencode($messageEdit));
  exit;
}
?>