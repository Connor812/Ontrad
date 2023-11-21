<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /admin_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

    /* .btn {
    border: 2px solid gray;
    color: gray;
    background-color: white;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 20px;
    font-weight: bold;
} */

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

    .navbar-nav .nav-item {
        transition: background-color 0.3s;
    }

    /* Style for active link */
    .navbar-nav .nav-item:active {
        background-color: #007bff;
        /* Change this to your desired active link color */
    }

    input.larger {
        transform: scale(1.75);
        margin-bottom: 5%;
    }

    .row-label {
        display: block;
        cursor: pointer;
        width: 100%;
    }
</style>

<body id="thememanager">


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark headpad pl-5">
        <div class="container">
            <a class="navbar-brand" href="home.html">ONTRAD ADMIN</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li
                        class="nav-item <?php echo basename($_SERVER['PHP_SELF']) === 'songmanager.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="songmanager.php">Add Song</a>
                    </li>
                    <li
                        class="nav-item <?php echo basename($_SERVER['PHP_SELF']) === 'editsong.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="editsong.php">Edit Song</a>
                    </li>
                    <li
                        class="nav-item <?php echo basename($_SERVER['PHP_SELF']) === 'thememanager.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="thememanager.php">Add Theme</a>
                    </li>
                    <li
                        class="nav-item <?php echo basename($_SERVER['PHP_SELF']) === 'editThemeHome.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="editThemeHome.php">Edit Theme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="functions/admin_logout.inc.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>