<?php
require_once("config/db.php");
require_once("php/header.php");

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
$imageFull = $_FILES['uploadfile'];
$imageThumb = $_FILES['imagethumb'];

// Error handling function
function handleError($message)
{
  echo "Error: " . $message;
  exit(); // Stop execution after encountering an error
}

// This handles the imageFull

if (isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] == 0 && $_FILES['uploadfile']['size'] > 0) {
  // Get the file details
  $file_name = $_FILES['uploadfile']['name'];
  $file_tmp = $_FILES['uploadfile']['tmp_name'];

  // Extract the base file name and sanitize
  $base_file_name = basename($file_name);
  // Set the destination directory and file name
  $upload_dir = 'images/';
  $upload_path = $upload_dir . $base_file_name;

  echo $upload_path . " <--- Upload Path <br>";

  // Check if the file already exists in the destination directory
  if (file_exists($upload_path)) {
    echo "This File Exists <br>";
    $imageFull = $base_file_name;
    echo $imageFull . " <---ImageFull <br>";
  } else {
    // Move the uploaded file to the destination directory
    if (move_uploaded_file($file_tmp, $upload_path)) {
      $imageFull = $base_file_name;
    } else {
      $uploadError = $_FILES['uploadfile']['error'];
      $moveError = error_get_last();
      handleError("Error moving file '$file_name' to '$upload_path'. Error code: $uploadError. Additional info: " . print_r($moveError, true));
    }
  }
} else {
  // Handle case when no image is uploaded
  echo "No image uploaded or error in file upload.";
}


// This handles the imageThumb

if (isset($_FILES['imagethumb']) && $_FILES['imagethumb']['error'] == 0 && $_FILES['imagethumb']['size'] > 0) {
  // Get the file details
  $file_name = $_FILES['imagethumb']['name'];
  $file_tmp = $_FILES['imagethumb']['tmp_name'];

  // Extract the base file name and sanitize
  $base_file_name = basename($file_name);
  // Set the destination directory and file name
  $upload_dir = 'images/';
  $upload_path = $upload_dir . $base_file_name;

  echo $upload_path . " <--- Upload Path <br>";

  // Check if the file already exists in the destination directory
  if (file_exists($upload_path)) {
    echo "This File Exists <br>";
    $imageThumb = $base_file_name;
    echo $imageThumb . " <---imageThumb <br>";
  } else {
    // Move the uploaded file to the destination directory
    if (move_uploaded_file($file_tmp, $upload_path)) {
      $imageThumb = $base_file_name;
    } else {
      $uploadError = $_FILES['imagethumb']['error'];
      $moveError = error_get_last();
      handleError("Error moving file '$file_name' to '$upload_path'. Error code: $uploadError. Additional info: " . print_r($moveError, true));
    }
  }
} else {
  // Handle case when no image is uploaded
  echo "No image uploaded or error in file upload for imageThumb.";
}


// This handles the sheet music

$sheetanno = mysqli_real_escape_string($conn, $_POST['sheetanno']);
$sheetmusic = null;

if (isset($_FILES['sheetmusic']) && $_FILES['sheetmusic']['error'] == 0 && $_FILES['sheetmusic']['size'] > 0) {
  // Get the file details
  $file_name = $_FILES['sheetmusic']['name'];
  $file_tmp = $_FILES['sheetmusic']['tmp_name'];

  // Extract the base file name and sanitize
  $base_file_name = basename($file_name);

  // Set the destination directory and file name
  $upload_dir = 'musicsheet/';
  $upload_path = $upload_dir . $base_file_name;

  echo $upload_path . " <--- Upload Path <br>";

  // Check if the file already exists in the destination directory
  if (file_exists($upload_path)) {
    echo "This File Exists <br>";
    $sheetmusic = $base_file_name;
    echo $sheetmusic;
  } else {
    // Move the uploaded file to the destination directory
    if (move_uploaded_file($file_tmp, $upload_path)) {
      $sheetmusic = $base_file_name;
    } else {
      $uploadError = $_FILES['sheetmusic']['error'];
      $moveError = error_get_last();
      handleError("Error moving file '$file_name' to '$upload_path'. Error code: $uploadError. Additional info: " . print_r($moveError, true));
    }
  }
} else {
  // Handle case when no file is uploaded
  echo "No file uploaded or error in file upload for sheetmusic.";
}

// This handles audio1

$audioanno = mysqli_real_escape_string($conn, $_POST['audioanno']);
$audio1 = null;

if (isset($_FILES['audio1']) && $_FILES['audio1']['error'] == 0) {
  // Get the file details
  $file_name = $_FILES['audio1']['name'];
  $file_size = $_FILES['audio1']['size'];
  $file_tmp = $_FILES['audio1']['tmp_name'];
  $file_type = $_FILES['audio1']['type'];

  // Set the destination directory and file name
  $upload_dir = 'audio/';
  $upload_path = $upload_dir . $file_name;

  echo $upload_path . " <--- Upload Path <br>";

  // Check if the file already exists in the destination directory
  if (file_exists($upload_path)) {
    echo "File Exists <br>";
    $audio1 = $file_name;
    echo $audio1;
  } else {
    // Move the uploaded file to the destination directory
    if (move_uploaded_file($file_tmp, $upload_path)) {
      $audio1 = $file_name;
    } else {
      handleError("Error uploading file. Please try again.");
    }
  }
}

// This handles audio2

$audio2 = null;
if (isset($_FILES['audio2']) && $_FILES['audio2']['error'] == 0) {
  // Get the file details
  $file_name = $_FILES['audio2']['name'];
  $file_size = $_FILES['audio2']['size'];
  $file_tmp = $_FILES['audio2']['tmp_name'];
  $file_type = $_FILES['audio2']['type'];

  // Set the destination directory and file name
  // Set the destination directory and file name
  $upload_dir = 'audio/';
  $upload_path = $upload_dir . $file_name;

  echo $upload_path . " <--- Upload Path <br>";

  // Check if the file already exists in the destination directory
  if (file_exists($upload_path)) {
    echo "File Exists <br>";
    $audio2 = $file_name;
    echo $audio2;
  } else {
    // Move the uploaded file to the destination directory
    if (move_uploaded_file($file_tmp, $upload_path)) {
      $audio2 = $file_name;
    } else {
      handleError("Error uploading file. Please try again.");
    }
  }
}

// This handles the Video

$videoanno = mysqli_real_escape_string($conn, $_POST['videoanno']);
$video1 = null;
if (isset($_FILES['video1']) && $_FILES['video1']['error'] == 0) {
  // Get the file details
  $file_name = $_FILES['video1']['name'];
  $file_size = $_FILES['video1']['size'];
  $file_tmp = $_FILES['video1']['tmp_name'];
  $file_type = $_FILES['video1']['type'];

  // Set the destination directory and file name
  $upload_dir = 'video/';
  $upload_path = $upload_dir . $file_name;

  if (file_exists($upload_path)) {
    echo "file exists <br>";
    $video1 = $file_name;
    echo $video1 . "<br>";
  } else {
    // Move the uploaded file to the destination directory
    if (move_uploaded_file($file_tmp, $upload_path)) {
      $video1 = $file_name;
    } else {
      handleError("Error uploading file. Please try again.");
    }
  }

  $fileToUpload = null;
  if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
    // Get the file details
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];

    // Set the destination directory and file name
    $upload_dir = 'images/';
    $upload_path = $upload_dir . $file_name;

    // Move the uploaded file to the destination directory
    if (move_uploaded_file($file_tmp, $upload_path)) {
      $fileToUpload = $file_name;
    } else {
      handleError("Error uploading file. Please try again.");
    }
  }
}



// // Prepare the SQL statement to insert data into the database
if (isset($_POST['title']) && !empty($_POST['title'])) {
  $selectedThemes = isset($_POST['selectedThemes']) ? $_POST['selectedThemes'] : array(); // Set to empty array if not set
  echo "Before filling with null: " . implode(', ', $selectedThemes) . "<---- selected themes <br>";

  // If the array is empty, set each element to null
  if (empty($selectedThemes)) {
    $selectedThemes = array_fill(0, 3, null);
  }

  echo "After filling with null: ";
  var_dump($selectedThemes);

  echo "These are all the files: <br>";
  echo "Stitle: $Stitle<br>";
  echo "songyear: $songyear<br>";
  echo "songcomposer: $songcomposer<br>";
  echo "songartist: $songartist<br>";
  echo "circa: $circa<br>";
  echo "region: $region<br>";
  echo "shortanno: $shortanno<br>";
  echo "longanno: $longanno<br>";
  echo "imageanno: $imageanno<br>";
  echo "imageFull: $imageFull<br>";
  echo "imageThumb: $imageThumb<br>";
  echo "sheetanno: $sheetanno<br>";
  echo "sheetmusic: $sheetmusic<br>";
  echo "audioanno: $audioanno<br>";
  echo "audio1: $audio1<br>";
  echo "audio2: $audio2<br>";
  echo "videoanno: $videoanno<br>";
  echo "video1: $video1<br>";
  echo "video2: $video2<br>";
  echo "selectedThemes[0]: {$selectedThemes[0]}<br>";
  echo "selectedThemes[1]: {$selectedThemes[1]}<br>";
  echo "selectedThemes[2]: {$selectedThemes[2]}<br>";
  echo "fileToUpload: $fileToUpload<br>";



  // Use prepared statement
  $stmt = $conn->prepare("INSERT INTO newtable (Stitle, songyear, songcomposer, songartist, circa, region, shortanno, longanno, imageanno, imageFull, imageThumb, sheetanno, sheetmusic, audioanno, audio1, audio2, videoanno, video1, video2, theme1, theme2, theme3, fileToUpload) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  // Bind parameters
  $stmt->bind_param("sssssssssssssssssssssss", $Stitle, $songyear, $songcomposer, $songartist, $circa, $region, $shortanno, $longanno, $imageanno, $imageFull, $imageThumb, $sheetanno, $sheetmusic, $audioanno, $audio1, $audio2, $videoanno, $video1, $video2, $selectedThemes[0], $selectedThemes[1], $selectedThemes[2], $fileToUpload);

  if ($stmt->execute()) {
    // Rest of your code remains unchanged
    echo print_r($selectedThemes);
    if (!$selectedThemes[0] == "" && !$selectedThemes[1] == "" & !$selectedThemes[2] == "") {
      // Assuming $conn is your database connection object
      $query = "SELECT MAX(id) AS latest_id FROM newtable";
      $result = $conn->query($query);

      if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $latestId = $row['latest_id'];
        echo "Latest ID from newtable: $latestId";

        foreach ($selectedThemes as $theme) {
          // Sanitize the theme variable if needed
          $sanitizedTheme = mysqli_real_escape_string($conn, $theme);

          // SQL query to retrieve the id from the 'themes' table
          $selectThemeIdSQL = "SELECT id FROM themes WHERE theme_title = '$sanitizedTheme'";

          // Execute the query
          $result = $conn->query($selectThemeIdSQL);

          // Check if the query was successful
          if ($result) {
            // Fetch the result as an associative array
            $row = $result->fetch_assoc();

            // Check if a row was returned
            if ($row) {
              // Access the 'id' column
              $themeId = $row['id'];
              echo "Theme Title: $theme, Theme ID: $themeId<br>";

              // SQL query to insert into 'theme_songs' table
              $insertThemeSongSQL = "INSERT INTO themes_songs (song_id, theme_id) VALUES ($latestId, $themeId)";

              // Execute the insert query
              $insertResult = $conn->query($insertThemeSongSQL);

              // Check if the insert query was successful
              if ($insertResult) {
                echo "Inserted into theme_songs successfully<br>";
              } else {
                handleError("Error inserting into theme_songs: " . $conn->error);
              }
            } else {
              echo "No matching theme found for Theme Title: $theme<br>";
            }

            // Free the result set
            $result->free();
          } else {
            // Handle query error
            handleError("Error in SQL query: " . $conn->error);
          }
        }
        echo "<script> location.replace('songmanager.php?message=Song+Inserted+Successfully') </script>";

      } else {
        echo "Error retrieving the latest ID: " . $conn->error;
      }


    } else {
      echo "<script> location.replace('songmanager.php?message=Song+Inserted+Successfully') </script>";
    }

  } else {
    handleError("Error inserting data into the database: " . $stmt->error);
  }
}
?>