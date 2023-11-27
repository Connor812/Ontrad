<?php
require_once("config/db.php");
require_once("php/header.php");
if (isset($_FILES["uploadfile"])) {
    $target_dir = 'themeimage_uploads/';
    $file_name = basename($_FILES["uploadfile"]["name"]);
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file);
}
if (isset($_POST['feature']) && $_POST['feature'] === 'on') {
    $featureStatus = "Featured";
} else {
    $featureStatus = "UnFeatured";
}


if (isset($_POST['themetitle']) && !empty($_POST['themetitle'])) {
    $themetitle = $_POST['themetitle'];
    $themeinfo = $_POST['themeannotation'];
    $themeimage = $_POST['filename'];



    $sql = "INSERT INTO `themes` (`theme_title`, `theme_info`, `theme_image`, `status`) VALUES ('$themetitle', '$themeinfo', '$themeimage', '$featureStatus')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $themeID = mysqli_insert_id($conn);
        if (isset($_POST['transferIds'])) {
            $selectedSongs = $_POST['transferIds'];
            $selectedSongs = explode(",", $selectedSongs[0]);
            foreach ($selectedSongs as $songID) {
                $sql = "INSERT INTO `themes_songs` (`theme_id`, `song_id`) VALUES ('$themeID', '$songID')";
                $result = mysqli_query($conn, $sql);
            }
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Song </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
</style>

<body>
    <div class="container-fluid py-3 px-5">
        <form class="form-inline" action="/action_page.php">
            <div class="row pt-0">
                <div class="col-sm-12 col-md-10 col-lg-9 " style="text-align: right;">
                    <input class="form-control ml-sm-2" id="search_query" type="text"
                        placeholder="Find a Theme to Edit">
                </div>
                <div class="col-sm-12 col-md-2 col-lg-3 " style="text-align: center;">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
                <?php
                if (isset($_GET['success'])) {
                    ?>
                    <div class="col-sm-12 col-md-3 col-lg-3 text-center btn btn-success">
                        Theme Deleted Successfully
                    </div>
                    <?php
                }
                ?>
            </div>
        </form>
    </div>
    <?php

    $sql = "SELECT * FROM `themes`";


    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {

        echo "
    <div class='container-fluid px-5'><table class='table table-borderless'><tr>
    <th>Theme Title</th>
    <th>Action</th>
    </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["theme_title"] . "</td>" . "
            <td><a href=editTheme.php?id=" . $row["id"] . " class='btn btn-primary btn-sm'>Edit</a>
            <a href=functions/delete_theme.php?id=" . $row["id"] . " class='btn btn-danger btn-sm'>Delete</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No data available";
    }
    ?>

</body>

</html>