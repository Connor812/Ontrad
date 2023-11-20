<?php
// $file_name = "";
// if (isset($_FILES["uploadfile"])) {
//     $target_dir = 'themeimage_uploads/';
//     $file_name = basename($_FILES["uploadfile"]["name"]);
//     $target_file = $target_dir . $file_name; 
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//     move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file);
// }


echo "Hello";
exit;


$file_name = "";
$upload_dir = 'themeimage_uploads/';

if (isset($_FILES["uploadfile"])) {
    // Get the target file path
    $file_name = basename($_FILES["uploadfile"]["name"]);
    $target_file = $upload_dir . $file_name;

    // Get the file extension
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an image (you can customize this check further)
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_extensions)) {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit();
    }

    // Check file size (adjust the maximum size as needed)
    if ($_FILES["uploadfile"]["size"] > 5 * 1024 * 1024) { // 5 MB
        echo "Error: File is too large. Maximum file size is 5 MB.";
        exit();
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error: There was an issue uploading the file.";
    }
} else {
    echo "Error: No file was uploaded.";
}
?>
