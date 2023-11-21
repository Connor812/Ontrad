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
    $songnum = $_REQUEST['songnum'];
    $songtitle = $_REQUEST['songtitle'];
    $songyear = $_REQUEST['songyear'];
    $songcomposer = $_REQUEST['songcomposer'];
    $songartist = $_REQUEST['songartist'];
    $circa = $_REQUEST['circa'];
    $region = $_REQUEST['region'];
    $shortanno = $_REQUEST['shortanno'];
    $longanno = $_REQUEST['longanno'];
    $imageanno = $_REQUEST['imageanno'];
    $imagemain = $_REQUEST['imagemain'];
    $imagethumb = $_REQUEST['imagethumb'];
    $sheetanno = $_REQUEST['sheetanno'];
    $sheetmusic = $_REQUEST['sheetmusic'];
    $audioanno = $_REQUEST['audioanno'];
    $audio1 = $_REQUEST['audio1'];
    $audio2 = $_REQUEST['audio2'];
    $vidanno = $_REQUEST['vidanno'];
    $video1 = $_REQUEST['video1'];
    $youtube1 = $_REQUEST['youtube1'];
    $video2 = $_REQUEST['video2'];
    $theme1 = $_REQUEST['theme1'];
    $theme2 = $_REQUEST['theme2'];
    $theme3 = $_REQUEST['theme3'];
    $sql = "INSERT INTO songs VALUES ('$songnum', '$songtitle', '$songyear', '$songcomposer', '$songartist', '$circa', '$region', '$shortanno', '$longanno', '$imageanno', '$imagemain', '$imagethumb', '$sheetanno', '$sheetmusic', '$audioanno', '$audio1', '$audio2', '$vidanno', '$video1', '$youtube', '$video2', '$theme1', '$theme2', '$theme3')";
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
</div>
</body>
</html>