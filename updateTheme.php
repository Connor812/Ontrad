<?php
require_once("config/db.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
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
    
    if(isset($_POST['themetitle']) ){
        
        $themetitle = $_POST['themetitle'];
        $themeinfo = $_POST['themeannotation'];
        $themeimage = $_POST['filename'];
        $sql = "UPDATE `themes` SET `theme_title` = '$themetitle', `theme_info` = '$themeinfo', `theme_image` = '$themeimage', `status` = '$featureStatus' WHERE `themes`.`id` = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){  
            if (isset($_POST['transferIds']) && !empty($_POST['transferIds'])) {
                // print_r($_POST['transferIds']); exit;
                $selectedSongs = $_POST['transferIds'];
                $selectedSongs = explode(",", $selectedSongs[0]);
                $sqlDelete = "DELETE FROM `themes_songs` WHERE `theme_id` = '$id'";
                $resultDelete = mysqli_query($conn, $sqlDelete);
                
                foreach ($selectedSongs as $songID) {
                    $sql1 = "INSERT INTO `themes_songs` (`theme_id`, `song_id`) VALUES ('$id', '$songID')";
                    $result1 = mysqli_query($conn, $sql1);
                }
            }
        }else{
            echo "Error";
        }
    }
    
    
}

?>