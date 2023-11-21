<?php
require_once ("config/db.php");
require_once ("php/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ontrad Graphics</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/ontrad.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <style>

  </style>
</head>
<body>
    <!--Start-->
    <div class="jumbotron text-center pt-3 p-1">
      <h1>Graphics</h1>
      <p>Ontario Traditional Graphics</p> 
     <!--search--> 
     <div class="input-group pl-5 pr-5">
      <input type="search" class="form-control" size="50" placeholder="Find a song" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-success">Search</button>
      </div>
    </div>
      <button class="accordion" style="text-align: center;"><h6>Search With Filters</h6></button>
      <div class="panel">
        <div class="container-fluid" style="text-align: right;">
          <div class="row blurbtext" style="text-align: center;">
              <div class="col-sm-1"></div>
              <div class="col-sm-2">
              <div class="checkbox">
                <label><input type="checkbox">&nbsp; 1750-1799</label>
                </div>
            </div>
            <div class="col-sm-2">
              <div class="checkbox">
                <label><input type="checkbox">&nbsp; 1800-1849</label>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="checkbox">
                <label><input type="checkbox">&nbsp; 1850-1899</label>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="checkbox">
                <label><input type="checkbox">&nbsp; 1900-1949</label>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="checkbox">
                <label><input type="checkbox">&nbsp; 1950-1999</label>
              </div>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>
      </div> 
      <div class="textarea" style="text-align: left; padding-left: 10%; padding-right: 10%;">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat<//p>
    </div>
     </div>
      <h2 style="text-align: center;">Results</h2>
      <div class="blurbtitle" style="text-align: center;">Scrolling List</div>
    
   <!--Theme Buttons
      <div class="container-fluid" style="text-align: center; padding-left: 10%; padding-right: 10%;">
        <br><table class="table table-bordered">
          <tbody>
            <tr>
              <th>Theme</th>
              <th>Theme</th>
              <th>Theme</th>
              <th>Theme</th>
            </tr>
            <tr>
                <th>Theme</th>
                <th>Theme</th>
                <th>Theme</th>
                <th>Theme</th>
              </tr><tr>
                <th>Theme</th>
                <th>Theme</th>
                <th>Theme</th>
                <th>Theme</th>
              </tr>
          </tbody>
        </table>
      </div>-->
      
  <div class="containerfluid"><!--lower container-->
                <!--start of songlist-->
      <div class="alert alert-secondary songlist">
              <div class="container mt-2 ">
                <div class="media border pt-3">
                  <img src="images/Abbie Andrews Ranch Boys.jpg" alt="John Doe" class="m-2 mt-1 thumbnail" style="width:60px;">
                  <div class="media-body">
                    <div class="row">
                        <div class="col-sm-6">
                          <h5>Lord Alexander's Reel</h5>
                            <h6>Abbie Andrews</h3>
                        </div>
                        <div class="col-sm-6 songitem">
                          <h6>1950-1999 </h6>
                            <h6>Southwest Region</h6>
                          </div> 
                    </div>
                <div class="songitem blurbtext"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>      
                  </div>
                </div>
                </div>
              </div>
              <div class="container mt-2 ">
                <div class="media border p-1">
                  <img src="images/Abbie Andrews Ranch Boys.jpg" alt="John Doe" class="m-2 mt-1 thumbnail" style="width:60px;">
                  <div class="media-body">
                    <div class="row">
                        <div class="col-sm-6">
                          <h5>Lord Alexander's Reel</h5>
                            <h6>Abbie Andrews</h3>
                        </div>
                        <div class="col-sm-6 songitem">
                          <h6>1950-1999 </h6>
                            <h6>Southwest Region</h6>
                          </div> 
                    </div>
                <div class="songitem blurbtext"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>      
                  </div>
                </div>
                </div>
              </div><div class="container mt-2 ">
                <div class="media border p-1">
                  <img src="images/Abbie Andrews Ranch Boys.jpg" alt="John Doe" class="m-2 mt-1 thumbnail" style="width:60px;">
                  <div class="media-body">
                    <div class="row">
                        <div class="col-sm-6">
                          <h5>Lord Alexander's Reel</h5>
                            <h6>Abbie Andrews</h3>
                        </div>
                        <div class="col-sm-6 songitem">
                          <h6>1950-1999 </h6>
                            <h6>Southwest Region</h6>
                          </div> 
                    </div>
                <div class="songitem blurbtext"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>      
                  </div>
                </div>
                </div>
              </div><div class="container mt-2 ">
                <div class="media border p-1">
                  <img src="images/Abbie Andrews Ranch Boys.jpg" alt="John Doe" class="m-2 mt-1 thumbnail" style="width:60px;">
                  <div class="media-body">
                    <div class="row">
                        <div class="col-sm-6">
                          <h5>Lord Alexander's Reel</h5>
                            <h6>Abbie Andrews</h3>
                        </div>
                        <div class="col-sm-6 songitem">
                          <h6>1950-1999 </h6>
                            <h6>Southwest Region</h6>
                          </div> 
                    </div>
                <div class="songitem blurbtext"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>      
                  </div>
                </div>
                </div>
              </div><div class="container mt-2 ">
                <div class="media border p-1">
                  <img src="images/Abbie Andrews Ranch Boys.jpg" alt="John Doe" class="m-2 mt-1 thumbnail" style="width:60px;">
                  <div class="media-body">
                    <div class="row">
                        <div class="col-sm-6">
                          <h5>Lord Alexander's Reel</h5>
                            <h6>Abbie Andrews</h3>
                        </div>
                        <div class="col-sm-6 songitem">
                          <h6>1950-1999 </h6>
                            <h6>Southwest Region</h6>
                          </div> 
                    </div>
                <div class="songitem blurbtext"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>      
                  </div>
                </div>
                </div>
              </div><div class="container mt-2 ">
                <div class="media border p-1">
                  <img src="images/Abbie Andrews Ranch Boys.jpg" alt="John Doe" class="m-2 mt-1 thumbnail" style="width:60px;">
                  <div class="media-body">
                    <div class="row">
                        <div class="col-sm-6">
                          <h5>Lord Alexander's Reel</h5>
                            <h6>Abbie Andrews</h3>
                        </div>
                        <div class="col-sm-6 songitem">
                          <h6>1950-1999 </h6>
                            <h6>Southwest Region</h6>
                          </div> 
                    </div>
                <div class="songitem blurbtext"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>      
                  </div>
                </div>
                </div>
              </div>
          </div> 
      </div>  <!--end of songlist-->
    
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
