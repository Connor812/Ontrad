<?php
require_once ("config/db.php");
require_once ("php/header.php");
$id = $_POST['id'];
// $songnum = mysqli_real_escape_string($conn, $_POST['songnum']);
$Stitle = mysqli_real_escape_string($conn, $_POST['title']);
$songyear = mysqli_real_escape_string($conn, $_POST['songyear']);
$songcomposer = mysqli_real_escape_string($conn, $_POST['songcomposer']);
$songartist = mysqli_real_escape_string($conn, $_POST['songartist']);
$circa = mysqli_real_escape_string($conn, $_POST['circa']);
$region = mysqli_real_escape_string($conn, $_POST['region']);
$shortanno = mysqli_real_escape_string($conn, $_POST['shortanno']);

$longanno = mysqli_real_escape_string($conn, $_POST['longanno']);
$imageanno = mysqli_real_escape_string($conn, $_POST['imageanno']);
$imageFull = null; 
$imageThumb = null;
$old_file = mysqli_real_escape_string($conn, $_POST['old_image']);
$old_thumb= mysqli_real_escape_string($conn, $_POST['thumb_image']);
$checkbox= mysqli_real_escape_string($conn, $_POST['checkbox']);


  if(isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] == 0) {
  echo "here";
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
  else{
    $imageFull = $old_file;
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
  else{
    $imageThumb = $old_thumb;
  }

  $sheetanno = mysqli_real_escape_string($conn, $_POST['sheetanno']);
  $sheetmusic = null;
  $oldmusic = mysqli_real_escape_string($conn, $_POST['sheetmusic_image']);

  if(isset($_FILES['sheetmusic']) && $_FILES['sheetmusic']['error'] == 0) 
  {
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
  else{
    $sheetmusic = $oldmusic;
  }
  $audioanno = mysqli_real_escape_string($conn, $_POST['audioanno']);
  $audio1 = null;
  $oldaudio1 = mysqli_real_escape_string($conn, $_POST['old_audio1']);

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
  else{
    $audio1 = $oldaudio1;
  }


  $audio2 = null;
  $oldaudio2 = mysqli_real_escape_string($conn, $_POST['old_audio2']);

  if(isset($_FILES['audio2']) && $_FILES['audio2']['error'] == 0) 
  {
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
  else{
    $audio2 = $oldaudio2;
  }

  $videoanno = mysqli_real_escape_string($conn, $_POST['videoanno']);
  $oldvideo1 = mysqli_real_escape_string($conn, $_POST['old_video1']);
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
  else{
    $video1 = $oldvideo1;
  }
  $oldvideo2 = mysqli_real_escape_string($conn, $_POST['video2']);
  $video2 = mysqli_real_escape_string($conn, $_POST['video2']);
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
  // else{
  //   $video2 = $oldvideo2;
  // }

  // $fileToUpload = null;
  // // $oldfileToUpload = mysqli_real_escape_string($conn, $_POST['old_fileToUpload']);
  // if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) 
  // {
  //   // Get the file details
  //   $file_name = $_FILES['fileToUpload']['name'];
  //   $file_size = $_FILES['fileToUpload']['size'];
  //   $file_tmp = $_FILES['fileToUpload']['tmp_name'];
  //   $file_type = $_FILES['fileToUpload']['type'];
    
  //   // Set the destination directory and file name
  //   $upload_dir = 'images/';
  //   $upload_path = $upload_dir . $file_name;
    
  //   // Move the uploaded file to the destination directory
  //   if(move_uploaded_file($file_tmp, $upload_path)) {
  //       $fileToUpload = $file_name;
  //   } else {
  //     echo "Error uploading file. Please try again.";
  //   }
  // }
  // else{
  //   // echo "check";exit;
  //   // $fileToUpload = $oldfileToUpload;
  // }



  
  if(isset($_POST['title']) && !empty($_POST['title'])){
  // echo $_POST['title'];
  $selectedThemes = $_POST['selectedThemes'];

  $sql = "UPDATE newtable SET 
  Stitle='$Stitle',
  songyear='$songyear', 
  songcomposer='$songcomposer', 
  songartist='$songartist', 
  circa='$circa', 
  region='$region',
  shortanno='$shortanno',
  longanno='$longanno',
  imageanno='$imageanno',
  imageFull='$imageFull',
  imageThumb='$imageThumb',
  sheetanno='$sheetanno',
  sheetmusic='$sheetmusic',
  audioanno='$audioanno',
  audio1='$audio1',
  audio2='$audio2',
  videoanno='$videoanno',
  video1='$video1',
  video2='$video2',
  theme1='$selectedThemes[0]',
  theme2='$selectedThemes[1]',
  theme3='$selectedThemes[2]'
  WHERE ID='$id'";

  $result = mysqli_query($conn, $sql);

    if ($result) 
    {
      if(isset($_POST['selectedIds']) && !empty($_POST['selectedIds'])){
        $ids = $_POST['selectedIds'];
        $current_song_id = $_POST['id'];
        $idsArray = explode(",", $ids[0]);
        $deleteSql = "DELETE FROM `themes_songs` WHERE `song_id` = '$current_song_id'";
        $deleteResult = mysqli_query($conn, $deleteSql);
        // print_r($idsArray);
        foreach($idsArray as $theme_id){
          $sql1 = "INSERT INTO `themes_songs` (song_id, theme_id) VALUES ('$current_song_id', '$theme_id')";
          $result1 = mysqli_query($conn, $sql1);
        }
        if($result1){
          echo "<script> location.replace('edit.php?message=Song+Updated+Successfully&id=".$id."') </script>";
          // echo "success";
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
}

?>