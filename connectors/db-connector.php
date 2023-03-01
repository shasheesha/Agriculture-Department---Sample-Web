<?php
include('php/config.php');
// $servername = "localhost";
// $username = "root";
// $password = "123456";
// $database = "doa_99_40";

$con = new mysqli($servername, $username, $password, $database);
try {
  if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "<script>console.log ('Connected successfully.')</script>";
} catch(Exception $error) {
  echo "Connection failed: " . $error->getMessage();
}


?>