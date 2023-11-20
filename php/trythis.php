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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>OnTrad TestPage </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/ontrad.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
 
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<!--Navbar-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="home.html">ONTRAD TEST</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="home.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.html">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="music.html">Music</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="video.html">Video</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="graphics.html">Graphics</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="themes.html">Themes</a>
        </li>      
      </ul>  
  </nav>

<hr>
<br>
<div class="container-fluid p-5">
    <!--ECHO -->
    <div>
        <p> ECHO 
          <?php
          $pic="hello";
          ECHO $pic; 
          ?>
        </p>
    </div>
      <br>
      <div style="text-align: center;">
        <hr>
        <img src="uploads/abby1.jpg" width="40%">
        <br>
        <input type="file" name="lawyer_image1" class="form-control-file"  aria-describedby="" >
          <h3>Database</h3>
          <br>
          <div>
          <?php
            $sql = "SELECT * FROM testfirst";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
              echo "<table><tr>
                              <th>id</th><th>one</th><th>two</th><th>three</th><th>four</th>
                            </tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["idnumber"]."</td><td>".$row["one"]."</td><td>".$row["two"]."</td><td>".$row["three"]."</td><td> ".$row["four"]."</td>
                      </tr>";
              }
              echo "</table>";
            } else {
              echo "0 results";
            }
            $conn->close();
          ?>
          </div>
      </div>
      <br>

      <form action="updatesong.php" method="post">
      idnumber: <input type="text" name="idnumber"><br>
      Name: <input type="text" name="name"><br>
      E-mail: <input type="text" name="email"><br>
      Three: <input type="text" name="three"><br>
      Four: <input type="text" name="four"><br>
      <input type="submit">
      </form>
      </div>
      <Br>
      <!--uploadfile-->
      <form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</div>
</body>
</html>