<?php
require_once("config/db.php");
require_once("php/header.php");
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

    <div class="container-fluid py-3 px-8">
        <form class="form-inline" action="editsong.php" method="POST">
            <div class="row" style="flex-wrap: nowrap;">
                <div class="col-sm-12 col-md-9 col-lg-9 text-right">
                    <input class="form-control" name="search_query" type="text" placeholder="Find a song to edit"
                        value="<?php echo isset($_POST['search_query']) ? htmlspecialchars($_POST['search_query']) : ''; ?>">
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                    <button class="btn btn-success mb-2 mb-md-0" type="submit">Search</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                    <a href="editsong.php" class="btn btn-secondary" role="button">Reset</a>
                </div>
            </div>
        </form>
    </div>


    <?php

    if (isset($_POST['search_query'])) {
        $searchQuery = $_POST['search_query'];
        if (empty($_POST['search_query'])) {
            echo '<script>window.location.href = "editsong.php";</script>';
            exit;
        }
        $sql = "SELECT Stitle, ID FROM newtable WHERE Stitle LIKE '%" . $searchQuery . "%'";


        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "
        <div class='container-fluid px-5'><table class='table table-borderless'><tr>
        <th>Title</th>
        <th>Edit</th>
        </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["Stitle"] . "</td>" . "
                <td><a href=edit.php?id=" . $row["ID"] . " class='btn btn-primary btn-sm'>Edit</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "No data available";
        }
    } else {
        $sql = "SELECT Stitle,ID FROM newtable";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "
        <div class='container-fluid px-5'><table class='table table-borderless'><tr>
        <th>Title</th>
        <th>Edit</th>
        </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["Stitle"] . "</td>" . "
                <td><a href=edit.php?id=" . $row["ID"] . " class='btn btn-primary btn-sm'>Edit</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "No data available";
        }
    }


    ?>

</body>

</html>