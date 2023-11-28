<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/ontrad.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<style>
  /*all input style */
  .input-clr input {
    padding: 10px;
    border: navajowhite;
    box-shadow: 0px 0px 11px 0px #7d757585;
    font-family: sans-serif;
  }

  .input-clr textarea {
    padding: 10px;
    border: navajowhite;
    box-shadow: 0px 0px 11px 0px #7d757585;
    font-family: sans-serif;
  }

  /* alert style */
  .alert.alert-secondary {
    background: white;
    border: navajowhite;
    padding: 0;

  }

  .alert.alert-secondary select {
    padding: 10px;
    border: navajowhite;
    box-shadow: 0px 0px 11px 0px #7d757585;
    font-family: sans-serif;
  }

  /* labels style  */
  h4.label label {
    font-size: 27px;
    font-family: sans-serif;
    font-weight: 600;
  }

  /* uploaded image css  */
  .img img {

    border-radius: 30px;
    box-shadow: 0px 0px 9px 0px #82828259;
  }

  img.image-set {
    height: max-content;
  }

  /* upload btn style  */
  .upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
  }

  .btn {
    border: 2px solid gray;
    color: gray;
    background-color: white;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 20px;
    font-weight: bold;
  }

  .upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
  }

  .fileuploader {
    display: flex;
    justify-content: center;
    gap: 15px;
    align-items: center;
  }

  /* view table and result table */
  .cont {
    width: 70% !important;
    margin: 0 auto;
    overflow: auto;
    border: 1px solid #ddd;
    border-collapse: collapse;
    overflow: auto;
    border-radius: 10px;

  }

  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
  }

  th,
  td {
    text-align: left;
    padding: 8px;
    text-align: left;
    padding: 8px;
    font-family: sans-serif;
    border: 1px solid #8080802e;

  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  /* search form */
  .contain {
    width: 70% !important;
    margin: 0 auto;
    gap: 20px;
  }

  .serch {
    color: white;
  }

  /* search result found */
  p.contain.search-rs {
    font-size: 22px;
    font-weight: bold;
  }

  /* search result not found */
  .nf {
    font-size: 22px;
    font-weight: bold;
  }


  ::-webkit-scrollbar {
    width: 20px;
  }

  /* Track */
  .cont::-webkit-scrollbar-track {
    background: #f1f1f1;
  }

  /* Handle */
  .cont::-webkit-scrollbar-thumb {
    background: #888;
  }

  /* Handle on hover */
  .cont::-webkit-scrollbar-thumb:hover {
    background: #555;
  }

  .search-frm {
    border: none;
    box-shadow: 0px 0px 2px 0px gray;
    border-radius: 10px;
    width: 100%;
    color: white;
    background: #8a757517;
    padding: 10px;
    border: 1px solid gray;
  }
</style>

<body>

  <!--nav-->
  <nav class="navbar navbar-expand-md ontradgreen">
    <!-- Brand/logo -->
    <a class="navbar-brand ontradwhite" href="index.php">
      <img src="images/ontradlogo.jpg" style="width: 200px; height: auto; min-width: 200px; border-radius: 5px;  ">
    </a>

    <!-- Links -->
    <ul class="navbar-nav ontradnav" style="text-align: left;">
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php" style="color: whitesmoke;">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php" style="color: whitesmoke;">Songs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="themelist.php" style="color: whitesmoke;">Themes</a>
      </li>
    </ul>

    <?php

    require_once("config-url.php");

    if (isset($_GET['id'])) {
      $id = base64_decode($_GET['id']);

      $sql = 'SELECT `ID`, `Stitle` FROM `newtable`;';
      $result = $conn->query($sql);

      if ($result) {
        // Check if there are any rows
        if ($result->num_rows > 0) {
          // Fetch all rows into an associative array
          $rows = $result->fetch_all(MYSQLI_ASSOC);

          // Initialize variables to store the results
          $beforeID = null;
          $afterID = null;
          $beforeStitle = null;
          $afterStitle = null;

          // Iterate through the array to find the elements
          foreach ($rows as $key => $item) {
            if ($item['ID'] == $id) {
              // Found the ID, get the IDs and Stitles before and after
              $beforeID = ($key > 0) ? $rows[$key - 1]['ID'] : null;
              $afterID = (isset($rows[$key + 1])) ? $rows[$key + 1]['ID'] : null;

              $beforeStitle = ($key > 0) ? $rows[$key - 1]['Stitle'] : null;
              $afterStitle = (isset($rows[$key + 1])) ? $rows[$key + 1]['Stitle'] : null;

              // No need to continue the loop once found
              break;
            }
          }



          echo ' <div class="container-fluid" style="text-align: right; max-width:10%">';
          if (!empty($beforeID)) {
            ?>
            <!-- <?php echo $beforeStitle ?> -->
            <a href="<?php echo BASE_URL . "/song1.php?id=" . base64_encode($beforeID) ?>" type="button"
              class="btn ontradgreen me-1">
              <svg width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path
                  d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
              </svg>
            </a>
            <?php
          }
          if (!empty($afterID)) {
            ?>

            <a href="<?php echo BASE_URL . "/song1.php?id=" . base64_encode($afterID) ?>" type="button" class="btn ontradgreen me-1">
              <svg width="30" height="30" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                <path
                  d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
              </svg>
            </a>
            <!-- <?php echo $afterStitle ?> -->
            <?php
          }
          echo '</div>';

        } else {
          echo "No rows found.";
        }
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    ?>




  </nav>
