<?php
// Include the database connection file
require_once "dbconnection.php";

// Get the id parameter value from URL (cast to integer)
$id_orders = (int) $_GET['id_orders'];

// Delete row from the database table
try {
  $stmt = $conn->prepare("CALL deleteOrder(:id_orders)");
  $stmt->bindParam(":id_orders", $id_orders, PDO::PARAM_INT);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    //redirect if the record is successfully deleted
    header("Location: order.php");
    exit();
  } else {
    echo "No record found with ID: $id_orders.";
  }
} catch (PDOException $e) {
  // Log error and show a friendly message
  error_log("Error deleting record: " . $e->getMessage());
  echo "An error occurred while trying to delete the record. Please try again later.";
}
?>