<!DOCTYPE html>
<html lang="en">

<head>
  <title>OnTrad Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/ontrad.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--nav-->
  <nav class="navbar navbar-expand-sm ontradgreen">
        <!-- Brand/logo -->
        <a class="navbar-brand ontradwhite" href="#">ONTRAD</a>

        <!-- Links -->
        <ul class="navbar-nav ontradnav">
            <li class="nav-item">
                <a class="nav-link" href="aboutus.php" style="color: whitesmoke;">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="home1.php" style="color: whitesmoke;">Songs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="themelist.php" style="color: whitesmoke;">Themes</a>
            </li>
        </ul>
    </nav>
  <!--end of nav-->
  <div class="wrapper">
    <div style="height: 50px;"></div>
    <div class="container-fluid p-3" style="text-align: center;"><img src="images/ontradlogo.jpg" style="width: 50%; height: auto;">
    </div>
    <div class="container-fluid" style="padding: 0% 10% 1% 10%;">
      <h5 style="line-height: 120%;"><small>Welcome to the Ontario Traditional Music Library. This resource has
          been created especially for singers and instrumentalists looking for songs and tunes from Ontario's
          living
          musical traditions and for music from historical sources.</small></h5>
    </div>
    <!--general search-->
    <div class="ontradgreenlite ontradred p-4">
      <!--main search box-->
      <form style="padding: 0% 20%;">
        <div class="input-group">
          <input type="search" class="form-control" size="40" placeholder="Search by titles or keywords">
        </div>
      </form>
      <!--checkboxes-->
      <div class="row" style="text-align: center; padding: 2% 15% 0% 15%;">
        <div class="col-sm-4 p-0">
          <label for="scores">Instrumentals</label>
          <input type="checkbox" id="scores" onclick="myFunction()">
          <p id="textscores" style="display:none">Checkbox is CHECKED!</p>
        </div>
        <div class="col-sm-4 p-0">
          <label for="video">Songs</label>
          <input type="checkbox" id="video" onclick="myFunction()">
          <p id="textvideo" style="display:none">Checkbox is CHECKED!</p>
        </div>
        <div class="col-sm-4 p-0">
          <label for="images">Images</label>
          <input type="checkbox" id="images" onclick="myFunction()">
          <p id="textimage" style="display:none">Checkbox is CHECKED!</p>
        </div>
      </div>
      <!--circa nad region-->
      <!--Year Checkbox-->
      <div class="alert p-2" role="alert" style="text-align:center" ;>
        <div class="row input-clr ontradred px-5">
          <div class="col-sm-6" style="text-align: center;">
            <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example" name="circa">
              <option value="">Circa</option>
              <option value="1750-1799">1750-1799</option>
              <option value="1800-1849">1800-1849</option>
              <option value="1849-1900">1850-1900</option>
              <option value="1900-1949">1900-1949</option>
              <option value="1950-1999">1950-1999</option>
            </select>
          </div>
          <div class="col-sm-6" style="text-align: center;">
            <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example" name="region">
              <option value="">Region</option>
              <option value="East">East</option>
              <option value="South Central">South Central</option>
              <option value="South West">South West</option>
              <option value="Central">Central</option>
              <option value="North">North</option>
            </select>
          </div>
        </div>
      </div>

      <div class="input-group-btn" style="text-align: center;">
        <button type="button" class="button1">Search</button>
      </div>
    </div>
  </div>
  <!--results-->
  <div class="ontradbg1" style="padding: 2% 10% 2% 10%;">
    <div class="resultscreen py-2">
      <div class="ontradred" style="text-align: center;">
        <h4>RESULTS</h4>
      </div>

      <div class="resultsdata mb-3">
        <div class="row pt-0">
          <div class="col-sm-3">Thumbnail</div>
          <div class="col-sm-5">Title</div>
          <div class="col-sm-2">Open</div>
        </div>
        <hr style="margin-top: 0;">
        <div class="row pt-0">
          <div class="col-sm-3">Thumbnail</div>
          <div class="col-sm-5">Title</div>
          <div class="col-sm-2">Open</div>
        </div>
      </div>

    </div>
  </div>

  <div class="ontradgreenlite ontradred p-4 text-center">
    <h4>FEATURED THEMES</h4>

    <div class="input-group-btn" style="text-align: center;">
      <button type="button" class="button1">All Themes</button>
    </div>
  </div>

  <!--dslsdkfjsdlfkjsd-->
  <div class="ontradbg2 px-4 py-2 ontradred" style="text-align: center;">
    <div class="row">
      <div class="col"></div>
      <div class="col-sm-3 py-2" style="background-color: hsla(89, 35%, 37%, 0.1); border-radius: 10px; margin: 1%;">
        <h5>ONTARIO FIDDLE<br>HIT PARADE</h5>
        <img src="homeimage/on_0004_fiddle.jpg" style="width: 90%; margin-bottom: 5%; border-radius: 15px; outline-color: darkgreen; outline-style: solid;">
        <button type="button" class="button1">Open</button>
      </div>
      <div class="col-sm-3 py-2" style="background-color: hsla(89, 35%, 37%, 0.1); border-radius: 10px; margin: 1%;">
        <h5>INSTRUMENTAL MUSIC</h5>
        <img src="homeimage/on_0002_band.jpg" style="width: 90%; margin-bottom: 5%; border-radius: 15px; outline-color: darkgreen; outline-style: solid;">
        <button type="button" class="button1">Open</button>
      </div>
      <div class="col-sm-3 py-2" style="background-color: hsla(89, 35%, 37%, 0.1); border-radius: 10px; margin: 1%;">
        <h5>SONGS OF<br>LARINA CLARK</h5>
        <img src="homeimage/on_0005_laura.jpg" style="width: 90%; margin-bottom: 5%; border-radius: 15px; outline-color: darkgreen; outline-style: solid;">

        <button type="button" class="button1">Open</button>
      </div>
      <div class="col"></div>
    </div>
    <div class="row">
      <div class="col"></div>
      <div class="col-sm-3 py-2" style="background-color: hsla(89, 35%, 37%, 0.1); border-radius: 10px; margin: 1%;">
        <h5>LAKES &amp; RIVERS</h5>
        <img src="homeimage/on_0003_lakes.jpg" style="width: 90%; margin-bottom: 5%; border-radius: 15px; outline-color: darkgreen; outline-style: solid;">
        <button type="button" class="button1">Open</button>
      </div>
      <div class="col-sm-3 py-2" style="background-color: hsla(89, 35%, 37%, 0.1); border-radius: 10px; margin: 1%;">
        <h5>CONFLICT </h5>
        <img src="homeimage/on_0000_conflict.jpg" style="width: 90%; margin-bottom: 5%; border-radius: 15px; outline-color: darkgreen; outline-style: solid;">
        <button type="button" class="button1">Open</button>
      </div>
      <div class="col-sm-3 py-2" style="background-color: hsla(89, 35%, 37%, 0.1); border-radius: 10px; margin: 1%;">
        <h5>DANCE &amp; SOCIAL</h5>
        <img src="homeimage/on_0001_dance.jpg" style="width: 90%; margin-bottom: 5%; border-radius: 15px; outline-color: darkgreen; outline-style: solid;">
        <button type="button" class="button1">Open</button>
      </div>
      <div class="col"></div>
    </div>
  </div>
  <!-- Container (Contact Section) -->
  <div class="container-fluid ontradgreenlite ontradred py-3" style="width: 100%;">
    <h5 class="text-center">CONTACT US</h5>
    <div class="row">
      <div class="col" style="width: 100%; text-align: center;">
        <h5> mail@ontariotraditionalmusic.ca</h5>
      </div>
    </div>
    <br>
    <!-- Button to Open the Modal -->
    <div style="text-align: center;">
      <button type="button" class="button1" data-toggle="modal" data-target="#dropline">
        Drop us a line
      </button>
    </div>
    <!-- The Modal -->
    <div class="modal" id="dropline">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="alert alert-light m-3" style="padding: 3% 10% 3% 10%">
            <p style="text-align: center;">
              <img src="images/ontradlogo160px.jpg" style="text-align: center;">
              <hr>
              We welcome your comments and suggestions
            </p>
            <div class="row">
              <div class="col-sm-6 form-group">
                <input class="form-control" style="width: 100%;" id="name" name="name" placeholder="Name" type="text" required>
              </div>
              <div class="col-sm-6 form-group">
                <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
              </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
            <div class="row">
              <div class="col-sm-12 form-group">
                <button class="button1 pull-right" type="submit">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <div style="text-align: center;">
      <p><small>- CREATED BY BUSINESSLORE -</small>
      </p>
    </div>
  </div>
  <!--end of contact-->
  </div>
  <!--end of wrapper-->
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

    function myFunction() {
      var checkBox = document.getElementById("scores");
      var text = document.getElementById("textscores");
      if (checkBox.checked == true) {
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }

    function myFunction() {
      var checkBox = document.getElementById("images");
      var text = document.getElementById("textimages");
      if (checkBox.checked == true) {
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }

    function myFunction() {
      var checkBox = document.getElementById("video");
      var text = document.getElementById("textvideo");
      if (checkBox.checked == true) {
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }

    function myFunction() {
      var checkBox = document.getElementById("load");
      var text = document.getElementById("textload");
      if (checkBox.checked == true) {
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }
  </script>
</body>

</html>