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
echo "Connected successfully";

echo "Hello Emma and Dave hope this works hello";

$sql = "INSERT INTO testfirst (`one`, `two`, `three`, `four`) VALUES (\"Lisa\",\"bianca\",\"ringo\",\"callum\")";


$sql = "SELECT * FROM testfirst";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  echo "<table><tr><th>one</th><th>two</th><th>three</th><th>four</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["one"]."</td><td>".$row["two"]."</td><td>".$row["three"]." ".$row["four"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
?>

