<?php
require_once("config/db.php");
require_once("php/header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ontrad Themes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/ontrad.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>

  </style>
</head>

<body>
  <!--Start-->
  <div class="jumbotron text-center" style="padding: 2%;">
    <h1>Theme Manager</h1>
    <p>Edit themes </p>
    <div class="textarea" style="text-align: left; padding-left: 15%; padding-right: 15%;">
      <div style="font-size: medium;">Select a theme to edit, all themes are listed below</div>
      <br>
    </div>
    <h3 class="label" style="text-align: center;"> <label for="choosesong"></label></h3>
    <div class="container-fluid px-5" style="width: 50%; height: auto;">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <form class="form-inline" action="/action_page.php">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </nav>
    </div>
    <!--Gender Buttons-->
    <div class="container-fluid" style="text-align: center; padding-left: 10%; padding-right: 10%;">
      <br>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th>TITLE</th>
            <th>TITLE</th>
            <th>TITLE</th>
            <th>TITLE</th>
          </tr>
          <tr>
            <th>TITLE</t>
            <th>TITLE</th>
            <th>TITLE</th>
            <th>TITLE</th>
          </tr>
          <tr>
            <th>TITLE</th>
            <th>TITLE</th>
            <th>TITLE</th>
            <th>TITLE</th>
          </tr>
          <tr>
            <th>TITLE</th>
            <th>TITLE</th>
            <th>TITLE</th>
            <th>TITLE</th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!--Results-->

  <hr>
  <div class="jumbotron text-center" style="margin-bottom:5%">
    <p>Footer</p>
  </div>
  </div>
  <!--END-->
  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }
  </script>

</body>

</html>