<?php
require_once("config/db.php");
// var_dump($_FILES);
if (isset($_FILES["file"])) {
    $target_dir = 'themeimage_uploads/';
    $file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $file_name; 
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
}

if(isset($_POST['feature']) && $_POST['feature'] === 'on'){
    $featureStatus = "Featured";
}else{
    $featureStatus = "UnFeatured";
}


if(isset($_POST['themetitle']) && !empty($_POST['themetitle']) && !empty($_POST['themeannotation']) ){
    $themetitle = $_POST['themetitle'];
    $themeinfo = $_POST['themeannotation'];
    $themeimage = $_POST['filename'];



    $sql = "INSERT INTO `themes` (`theme_title`, `theme_info`, `theme_image`, `status`) VALUES ('$themetitle', '$themeinfo', '$themeimage', '$featureStatus')";
    $result = mysqli_query($conn, $sql);
    if($result){
                $themeID = mysqli_insert_id($conn);
                if(isset($_POST['transferIds'])){
                    $selectedSongs = $_POST['transferIds'];
                    $selectedSongs = explode("," ,$selectedSongs[0]);
                    foreach($selectedSongs as $songID){
                        $sql = "INSERT INTO `themes_songs` (`theme_id`, `song_id`) VALUES ('$themeID', '$songID')";
                        $result = mysqli_query($conn, $sql);
                    }
                }
                  
                }
            }

?>