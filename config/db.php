<?php
$servername = "sql5c0f.megasqlservers.com";
$username = "ontariotra872276";
$password = "Bianca007";
$dbname = "Ontarionew4989_ontariotra872276";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
#echo "Connected successfully";
?>