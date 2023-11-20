<?php
require_once ("config/db.php");
require_once ("php/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ontrad Video</title>
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
    <div class="jumbotron text-center" style="padding: 5%;">
      <h1>Video</h1>
      <p>Ontario Traditional Videos</p> 
     <!--search--> <form>
        <input type="text" name="search" placeholder="Search..">
      </form>
      <br>
      
      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Browse Library</button>
      
    </div>

    <!--browse-->
    
       
        
       
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog" style="width: 80%;">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style="text-align: center;">
                
                <h4 class="modal-title">Video Browser</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="row" style="padding-left: 10%; padding-right: 10%;">
                <div class="col-6" style="text-align: left">Next</div>
                    <div class="col-6"style="text-align: right">Last</div>
                </div>
             <div class="modal-body">
                <div class="groovebox">
                    <div class="row" >
                        <div class="col-sm-7 groovetype">
                            <h5 class="media-heading">John Doe</h5>
                            <div class="groovetype">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                        <div class="col-sm-5" style=" text-align: center">
                            <div class="groovebox">
                                <img src="images/placeholder.jpg" style="width:100%">
                            </div>
                            <div>
                            <image src="images/downloadblack.png" class="thumbnail" style="max-width: 20%;">
                                <div>DOWNLOAD</div>
                                </image>
                            </div>
                        </div>
                    </div>
                    <!--video control-->
                    <video width="100%" controls>
                        <source src="mov_bbb.mp4" type="video/mp4">
                        <source src="mov_bbb.ogg" type="video/ogg">
                        Your browser does not support HTML video.
                      </video>
                </div>
              </div>
              <div class="modal-footer">
                
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
        
     
      

     <!--time  buttons-->
     <div class="container-fluid" style="text-align: right;">
        <div class="row" style="text-align: center;">
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

      <!--Gender Buttons-->
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
      </div>
    
    <!--Results-->
    <div class="container-fluid">
            <h2 style="text-align: center;">Results</h2>
            <hr>
            <div class="textarea" style="text-align: left; padding-left: 5%; padding-right: 5%;">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat<//p>
            </div>
            <hr>
        <!--Audio Links-->
        <div class="container-fluid" >
            <h4 style="text-align: center;">Video</h4>
                <div class="row">
                    <div class="col-6" style="text-align: center;">
                        <div class="scrollfield">
                            <div class="groovebox">
                              
                                <div class="row">
                                  <div class="col-sm-7 groovetype">
                                    <h5 class="media-heading">John Doe</h5>
                                    <p >Lorem ipsum dolossssdssdsr sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                  </div>
                                  <div class="col-sm-5" style=" text-align: center" >
                                    <div class="groovebox"><img src="images/placeholder.jpg" style="width:100%"></div> 
                                   </div>
                                </div>
                                <video width="100%" controls>
                                    <source src="mov_bbb.mp4" type="video/mp4">
                                    <source src="mov_bbb.ogg" type="video/ogg">
                                    Your browser does not support HTML video.
                                  </video>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="text-align: center;">
                        <div class="scrollfield" >
                            <div class="groovebox">
                                <div class="row">
                                    <div class="col-sm-7 groovetype">
                                        <h5 class="media-heading">John Doe</h5>
                                        <div class="groovetype">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                    </div>
                                    <div class="col-sm-5" style=" text-align: center">
                                        <div class="groovebox">
                                            <img src="images/placeholder.jpg" style="width:100%">
                                        </div>
                                        <div>
                                        <image src="images/downloadblack.png" class="thumbnail" style="max-width: 20%;">
                                            <div>DOWNLOAD</div>
                                            </image>
                                        </div>
                                    </div>
                                </div>
                                <!--video control-->
                                <video width="100%" controls>
                                    <source src="mov_bbb.mp4" type="video/mp4">
                                    <source src="mov_bbb.ogg" type="video/ogg">
                                    Your browser does not support HTML video.
                                  </video>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div> 
  

                
        
           
    </div>
    <!--end of audio container-->
        </div>
      </div>
      </div>
        </div>
          </div>
          </div>
      </div>
    </div>
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
