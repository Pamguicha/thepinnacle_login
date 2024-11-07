<?php
$dsn = "mysql:host=localhost;dbname=pinnacle_customers";
$databaseUsername = 'santa';
$databasePassword = '1234';

//connect to database
try {
  $conn = new PDO($dsn, $databaseUsername, $databasePassword);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection Failed: " . $e->getMessage();
  $conn = null;

}