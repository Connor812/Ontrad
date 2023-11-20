<?php
require_once ("config/db.php");
require_once ("php/header.php");
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Song Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/ontrad.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style></style>

</head>
<body>
    
<div class="containerfluid" style="padding: 2% 5%; min-width: 400px;">
 <!--Song Data-->        
        <div class="containerfluid">
            <h1>Lord Alexander's Reel</h1>
            <h3>Abbie Andrews</h3>
            <div class="row">
                <div class="col-sm-3 col-lg-2"><h5>1950-1999</h5></div>
                <div class="col-sm-9"><h5>Southwest Region</h5></div> 
            </div>
       
            <div class="input" style="padding: 2% 2% 0% 2%;">Here's a rockin' little number by Abbie Andrews and His Canadian Ranch Boys. Lord Alexander's Reel was his big "hit", recorded in the mid '50s. Abbie was from Niagara Falls and his band sometimes included a young accordion player named Walter Ostenek. (Sorry, that's not him in the band picture) The sheet music is an Abbie Andrews medley I put together for the Crooked Stovepipe Folk Orchestra.</div>
        </div>
        <hr>
        <div class="row" >
            <div class="col-sm-6" style="text-align: center;">
                <div style="margin-top: 10%; margin-bottom: 5%;">
                    <audio controls>
                    <source src="audio/LordAlexandersReel.mp3" type="audio/ogg">
                    <source src="audio/LordAlexandersReel.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
                </div>
                <div style="padding: 0% 5%"><p class="blurbtext">This example sdasdasd fdsd dfsd sdf fdsf
                    sdfs asddasad sdad asaSDS asdsA dfsdf sdfs asddasad sdad asaSDS asdsA dfsdf </p>
                </div>
            </div>
            <div class="col-sm-6" style="text-align: center">
              <div class="embed-responsive embed-responsive-16by9"> 
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rlWQFQQHDdg?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="blurbtext">This example sdasdasd fdsd dfsd sdf fdsf
                sdfs asddasad sdad asaSDS asdsA dfsdf sdfdf  sd  dsf sdf  sdf sdf SD
                use media queries to re-arrange the images on different screen sizes:</div>
          </div>
        </div>
        <hr>
     <!--Gallery-->
        <div class="responsive">
            <div class="row">
               <div class="col-sm-8 blurbtitle">Early Band</div>
                <div class="col-sm-4 blurbyear">1954</div>
            </div>
            <div class="gallery">
            <a target="_blank" href="images/Abbie Andrews Ranch Boys.jpg">
              <img src="images/Abbie Andrews Ranch Boys.jpg" alt="no image" width="600" height="400"></a>
            <div class="blurbtext">This example sdasdasd fdsd dfsd sdf fdsf
                sdfs asddasad sdad asaSDS asdsA dfsdf sdfdf  sd  dsf sdf  sdf sdf SD
                use media queries to re-arrange the images on different screen sizes:</div>
          </div>
          </div>
        <div class="responsive">
            <div class="row">
                <div class="col-sm-8 blurbtitle">Radio Show</div>
                 <div class="col-sm-4 blurbyear">1958</div>
             </div>
          <div class="gallery">
            <a target="_blank" href="images/abby1.jpg">
              <img src="images/abby1.jpg" alt="Forest" width="600" height="400">
            </a>
            <div class="blurbtext">Add a description of the image here  asaSDS asdsA dfsdf sdfdf  sd  dsf sdf  sdf sdf SD
                use media queries to re-arrange the images on different</div>
          </div>
        </div>
         <div class="responsive">
            <div class="row">
                <div class="col-sm-8 blurbtitle">Ian Bell</div>
                 <div class="col-sm-4 blurbyear">2021</div>
             </div>
          <div class="gallery">
            <a target="_blank" href="images/ABBIE ANDREWS SET.jpg">
              <img src="images/ABBIE ANDREWS SET.jpg" alt="Mountains" width="600" height="400">
            </a>
            <div class="blurbtext">Add a descriptdiv clAdd a description of the image here  asaSDS asdsA dfsdf sdfdf  sd  dsf sdf  sdf sdf SD
                use media queries to re-arrange the images on differention of the image here</div>
          </div>
        </div>
        
        <div class="clearfix"></div>
        
        <div style="padding:6px;"></div>
        
</div> 
        
    </body>
    </html>
    