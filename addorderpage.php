<?php
session_start();


//1: Global variables
$fullName = "";
$type_beer = "";
$amount = "";
$pickup_day = "";
$pickup_time = "";
$messageOrder = "";

//2: Handle events by calling correct function 
if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {
  if (filter_input(INPUT_POST, "addNewOrder")) {
    newOrder();
  }
  if (filter_input(INPUT_POST, "viewData")) {
    displayData();
  }

}

function newOrder()
{
  global $fullName, $type_beer, $amount, $pickup_day, $pickup_time, $messageOrder;

  //get the inputted values
  $fullName = filter_input(INPUT_POST, "fullName", FILTER_SANITIZE_STRING);
  $type_beer = filter_input(INPUT_POST, "type_beer", FILTER_SANITIZE_STRING);
  $amount = filter_input(INPUT_POST, "amount", FILTER_SANITIZE_STRING);
  $pickup_day = filter_input(INPUT_POST, "pickup_day", FILTER_SANITIZE_STRING);
  $pickup_time = filter_input(INPUT_POST, "pickup_time", FILTER_SANITIZE_STRING);

  // Check if user is logged in before processing further
  $id_customer = isset($_SESSION["ID_customer"]) ? $_SESSION["ID_customer"] : null;

  if (!$id_customer) {
    $messageOrder = "<p> <font color='red'> User is not logged in. Please log in to place an order.</p>";
    header("Location: order.php?message=" . urlencode($messageOrder));
    exit(); // Only redirect if no session exists
  }


  //connect to database
  try {
    require_once "dbconnection.php";


    //check for empty fields
    if (empty($fullName) || empty($type_beer) || empty($amount) || empty($pickup_day) || empty($pickup_time)) {
      $messageOrder = "<p> <font color='red'> One of the fields is empty. Please fill in all fields to submit the form";
      header("Location: order.php?message=" . urlencode($messageOrder));
      exit();
    } else {
      $messageOrder = "<p style='text-align: center; color: green;'> A new order was created</p>";
      header("Location: order.php?message=" . urlencode($messageOrder));

    }


    //SQL INSERT statement STORE PROCEDURE

    $stmt = $conn->prepare("CALL getInsertData(:ID_customer, :fullName, :type_beer, :amount, :pickup_day, :pickup_time)");
    $stmt->bindParam(":ID_customer", $id_customer);
    $stmt->bindParam(":fullName", $fullName);
    $stmt->bindParam(":type_beer", $type_beer);
    $stmt->bindParam(":amount", $amount);
    $stmt->bindParam(":pickup_day", $pickup_day);
    $stmt->bindParam(":pickup_time", $pickup_time);
    $stmt->execute();

    //test if INSERT statement worked
    if (!$stmt) {
      $messageOrder = "<h2><font color='red'>An error ocurred. A new order could not be created</h2>";
    } else {
      $messageOrder = "<h3 style='text-align: center; color: green;'> A new order was created</h3>";
    }
  } catch (PDOException $e) {
    $messageOrder = "Database connection failed with the gollowing error: " . $e->getMessage();
  }
  $conn = null;
}

function displayData()
{
  // Fetch customer ID from session
  $id_customer = $_SESSION['ID_customer'] ?? null;

  // Check if the user is logged in
  if (!$id_customer) {
    $messageCart = "No customer ID found. Please log in.";
    return;
  }
  //retrieve data from newOrder() function from the the same ID from login and order

  try {
    require_once "dbconnection.php";
    //SQL SELECT statement
    $stmt = $conn->prepare("CALL displayData(:ID_customer)");
    $stmt->bindParam(":ID_customer", $id_customer, PDO::PARAM_INT);
    $stmt->execute();

    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($orders) {
      //Store all orders in session
      $_SESSION['orders'] = $orders;
    } else {
      $_SESSION['messageCart'] = "No orders found for this customer";
    }
  } catch (PDOException $e) {
    $_SESSION['messageCart'] = "Database connection failed with the following error: " . $e->getMessage();

  }

  //Redirect to cart.php after processing
  header("Location: cart.php");
  exit();

}


