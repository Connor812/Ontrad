<?php
require_once ("config/db.php");
require_once ("php/header.php");
// $songnum = mysqli_real_escape_string($conn, $_POST['songnum']); This is not being added for Now
$Stitle = mysqli_real_escape_string($conn, $_POST['title']);
$songyear = mysqli_real_escape_string($conn, $_POST['songyear']);
$songcomposer = mysqli_real_escape_string($conn, $_POST['songcomposer']);
$songartist = mysqli_real_escape_string($conn, $_POST['songartist']);
$circa = mysqli_real_escape_string($conn, $_POST['circa']);
$region = mysqli_real_escape_string($conn, $_POST['region']);
$shortanno = mysqli_real_escape_string($conn, $_POST['shortanno']);
$longanno = mysqli_real_escape_string($conn, $_POST['longanno']);
$imageanno = mysqli_real_escape_string($conn, $_POST['imageanno']);
$video2 = mysqli_real_escape_string($conn, $_POST['video2']);
$imageFull = null; 
$imageThumb = null;


if(isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] == 0) {
    // Get the file details
    $file_name = $_FILES['uploadfile']['name'];
    $file_size = $_FILES['uploadfile']['size'];
    $file_tmp = $_FILES['uploadfile']['tmp_name'];
    $file_type = $_FILES['uploadfile']['type'];
    
    // Set the destination directory and file name
    $upload_dir = 'images/';
    $upload_path = $upload_dir . $file_name;
    
    // Move the uploaded file to the destination directory
    if(move_uploaded_file($file_tmp, $upload_path)) {
      $imageFull = $file_name;
    } else {
      echo "Error uploading file. Please try again.";
    }
  } 
  if(isset($_FILES['imagethumb']) && $_FILES['imagethumb']['error'] == 0) {
    // Get the file details
    $file_name = $_FILES['imagethumb']['name'];
    $file_size = $_FILES['imagethumb']['size'];
    $file_tmp = $_FILES['imagethumb']['tmp_name'];
    $file_type = $_FILES['imagethumb']['type'];
    
    // Set the destination directory and file name
    $upload_dir = 'images/';
    $upload_path = $upload_dir . $file_name;
    
    // Move the uploaded file to the destination directory
    if(move_uploaded_file($file_tmp, $upload_path)) {
        $imageThumb = $file_name;
    } else {
      echo "Error uploading file. Please try again.";
    }
  } 
  $sheetanno = mysqli_real_escape_string($conn, $_POST['sheetanno']);
  $sheetmusic = null;
  if(isset($_FILES['sheetmusic']) && $_FILES['sheetmusic']['error'] == 0) {
    // Get the file details
    $file_name = $_FILES['sheetmusic']['name'];
    $file_size = $_FILES['sheetmusic']['size'];
    $file_tmp = $_FILES['sheetmusic']['tmp_name'];
    $file_type = $_FILES['sheetmusic']['type'];
    
    // Set the destination directory and file name
    $upload_dir = 'musicsheet/';
    $upload_path = $upload_dir . $file_name;
    
    // Move the uploaded file to the destination directory
    if(move_uploaded_file($file_tmp, $upload_path)) {
        $sheetmusic = $file_name;
    } else {
      echo "Error uploading file. Please try again.";
    }
  } 
  $audioanno = mysqli_real_escape_string($conn, $_POST['audioanno']);
  $audio1 = null;
  if(isset($_FILES['audio1']) && $_FILES['audio1']['error'] == 0) {
    // Get the file details
    $file_name = $_FILES['audio1']['name'];
    $file_size = $_FILES['audio1']['size'];
    $file_tmp = $_FILES['audio1']['tmp_name'];
    $file_type = $_FILES['audio1']['type'];
    
    // Set the destination directory and file name
    $upload_dir = 'audio/';
    $upload_path = $upload_dir . $file_name;
    
    // Move the uploaded file to the destination directory
    if(move_uploaded_file($file_tmp, $upload_path)) {
        $audio1 = $file_name;
    } else {
      echo "Error uploading file. Please try again.";
    }
  }
  $audio2 = null;
  if(isset($_FILES['audio2']) && $_FILES['audio2']['error'] == 0) {
    // Get the file details
    $file_name = $_FILES['audio2']['name'];
    $file_size = $_FILES['audio2']['size'];
    $file_tmp = $_FILES['audio2']['tmp_name'];
    $file_type = $_FILES['audio2']['type'];
    
    // Set the destination directory and file name
    $upload_dir = 'audio/';
    $upload_path = $upload_dir . $file_name;
    
    // Move the uploaded file to the destination directory
    if(move_uploaded_file($file_tmp, $upload_path)) {
        $audio2 = $file_name;
    } else {
      echo "Error uploading file. Please try again.";
    }
  }
  $videoanno = mysqli_real_escape_string($conn, $_POST['videoanno']);
  $video1 = null;
  if(isset($_FILES['video1']) && $_FILES['video1']['error'] == 0) {
    // Get the file details
    $file_name = $_FILES['video1']['name'];
    $file_size = $_FILES['video1']['size'];
    $file_tmp = $_FILES['video1']['tmp_name'];
    $file_type = $_FILES['video1']['type'];
    
    // Set the destination directory and file name
    $upload_dir = 'video/';
    $upload_path = $upload_dir . $file_name;
    
    // Move the uploaded file to the destination directory
    if(move_uploaded_file($file_tmp, $upload_path)) {
        $video1 = $file_name;
    } else {
      echo "Error uploading file. Please try again.";
    }
  }

  // if(isset($_FILES['video2']) && $_FILES['video2']['error'] == 0) {
  //   // Get the file details
  //   $file_name = $_FILES['video2']['name'];
  //   $file_size = $_FILES['video2']['size'];
  //   $file_tmp = $_FILES['video2']['tmp_name'];
  //   $file_type = $_FILES['video2']['type'];
    
  //   // Set the destination directory and file name
  //   $upload_dir = 'video/';
  //   $upload_path = $upload_dir . $file_name;
    
  //   // Move the uploaded file to the destination directory
  //   if(move_uploaded_file($file_tmp, $upload_path)) {
  //       $video2 = $file_name;
  //   } else {
  //     echo "Error uploading file. Please try again.";
  //   }
  // }
  // $theme1 = mysqli_real_escape_string($conn, $_POST['theme1']);
  // $theme2 = mysqli_real_escape_string($conn, $_POST['theme2']);
  // $theme3 = mysqli_real_escape_string($conn, $_POST['theme3']);
  $fileToUpload = null;
  if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
    // Get the file details
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    
    // Set the destination directory and file name
    $upload_dir = 'images/';
    $upload_path = $upload_dir . $file_name;
    
    // Move the uploaded file to the destination directory
    if(move_uploaded_file($file_tmp, $upload_path)) {
        $fileToUpload = $file_name;
    } else {
      echo "Error uploading file. Please try again.";
    }
  }


  // Prepare the SQL statement to insert data into the database
  // if(isset($_POST['selectedIds'])){
  //   echo "here"; 
  //   $ids = $_POST['selectedIds'];
  //   $idsArray = explode(",", $ids);
  //   echo($idsArray);
  // }else{
  //   echo "not getting ids";
  // }





if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['selectedThemes'])){
  $selectedThemes = $_POST['selectedThemes'];
  $sql = "INSERT INTO newtable (Stitle, songyear, songcomposer, songartist, circa, region, shortanno, longanno, imageanno, imageFull, imageThumb, sheetanno, sheetmusic, audioanno, audio1, audio2, videoanno, video1, video2, theme1, theme2, theme3, fileToUpload) VALUES ('$Stitle', '$songyear', '$songcomposer', '$songartist', '$circa', '$region', '$shortanno', '$longanno', '$imageanno','$imageFull', '$imageThumb', '$sheetanno', '$sheetmusic', '$audioanno','$audio1','$audio2', '$videoanno','$video1','$video2', '$selectedThemes[0]','$selectedThemes[1]','$selectedThemes[2]','$fileToUpload')";
  if (mysqli_query($conn, $sql)) {
      if(isset($_POST['selectedIds'])){
        $ids = $_POST['selectedIds'];
        $current_song_id = mysqli_insert_id($conn);
        $idsArray = explode(",", $ids[0]);
        // print_r($idsArray);
        foreach($idsArray as $theme_id){
          $sql1 = "INSERT INTO themes_songs (song_id, theme_id) VALUES ('$current_song_id', '$theme_id')";
          $result1 = mysqli_query($conn, $sql1);
        }
        if($result1){
          echo "<script> location.replace('songmanager.php?message=Song+Inserted+Successfully') </script>";
        }
      }else{
        echo "not getting ids <br>";
      }

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}







?>