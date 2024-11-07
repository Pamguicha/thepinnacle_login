<?php
$message = "";
$email;
$firstName;
$password;

session_start(); //start web session

if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {
  if (filter_input(INPUT_POST, "logincredentials")) {
    checkCustomerCredentials();
  }
}

function checkCustomerCredentials()
{
  global $message, $email, $firstName, $password;

  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
  $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

  try {
    require_once "dbconnection.php";

    //SQL STORE PROCEDURE
    $stmt = $conn->prepare("CALL GetCustomerByEmailAndPassword(:email, :password)");
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
    $result = $stmt->fetch();

    //test if function worked
    if ($result) {
      $_SESSION["email"] = $result["email"];
      $_SESSION["firstName"] = $result["firstName"];
      header("location: index.php");
      exit();
    } else {
      $message = "The email or password is incorrect";
      $_SESSION['error'] = $message;
      header("location: login.php");
      exit();
    }


  } catch (PDOException $e) {
    $message = "Database connection failed with the following error: " . $e->getMessage();
  }

  $_SESSION['error'] = $message;
  header("location: login.php");
  exit();


}