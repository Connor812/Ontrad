<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ontrad";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  echo 'cant open database';
  die("Connection failed: " . $conn->connect_error);
} 
#echo "Connected successfully";
?>