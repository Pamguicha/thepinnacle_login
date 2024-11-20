<?php
// Include the database connection file
require_once "dbconnection.php";

// Get the id parameter value from URL (cast to integer)
$id_orders = (int) $_GET['id_orders'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM `orderBeers` WHERE `id_orders` = '$id_orders'");

if (!$result) {
  echo "Error deleting user: " . mysqli_error($mysqli);
} else {
  header("Location: cart.php");
  exit();
}
?>