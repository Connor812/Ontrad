<?php
$servername = "sql5c0f.megasqlservers.com";
$username = "ontariotra872276";
$password = "Bianca007";
$dbname = "music_ontariotra872276";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
    echo "Connected successfully";
    $idnumber =  $_REQUEST['idnumber'];
    $name =  $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $three =  $_REQUEST['three'];
    $four = $_REQUEST['four'];
    $sql = "INSERT INTO testfirst VALUES ('$idnumber','$name','$email','$three','$four')";
    // $result = $conn->query($sql);

    if($conn->query($sql) === TRUE){
        echo "<h3>data stored in a database successfully.</h3>";

    } else{
        echo "ERROR: $sql. "
            . mysqli_error($conn);
    }
    $conn->close();
        
?>
<html>
<body>
<h3 style="text-align: center;">PHP</h3>
<div p-4>
Welcome <?php echo $_GET["name"]; ?><br>
Your email address is: <?php echo $_GET["email"]; ?><br>
<hr>
<p>Hello Emma</p>
Three: <?php echo $_GET["three"]; ?><br>
Four: <?php echo $_GET["four"]; ?><br>
</div>
</body>
</html>