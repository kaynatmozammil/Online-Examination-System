<?php

error_reporting(0);
// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";  // Use an empty string if no password is set for root
$database = "registerform";

$conn = mysqli_connect($servername, $username, $password, $database, 3307);
if ($conn) {
//   echo "Connection Ok <br>";
} else {
  echo "Connection Faild <br>" . mysqli_connect_error();
}

?>