<?php
require_once ("config/db.php");
require_once ("php/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Song Manager </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
    #progressBar {
    width: 0%;
    height: 24px;
    background-color: #6ecd75;
    border-radius: 20px;
    text-align: center;
    margin-top: 20px;
}
</style>
</head>

<body id="songmanager">
  <!--start-->
    <form action="uploadsong.php" method="post" enctype="multipart/form-data" id="uploadsong">
        <div class="container-fluid pt-3" style="max-width: 70%;">
                <!--search and load-->
            <div class="row d-none">
                <div class="col-8">
                    <h3>Song Manager</h3>
                    <div class="input-group mb-3 d-none">
                    <input type="text" class="form-control" placeholder="SEARCH SONG NAME" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="searchsong">SEARCH</button>
                    </div>
                </div>
            </div>
                <!--search results-->
            <div class="d-none" style="color: grey;">...search results</div>
                <!--title and date-->
            <div class="row input-clr py-2 mt-5">
                <div class="col-lg-4 col-md-4  col-sm-2 ">
                    <input type="text" class="form-control" placeholder="catalog number" name="songnum">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-8">
                    <h4><input type="text" class="form-control " placeholder="Song Title" name="title"></h4>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-2">
                    <input type="text" class="form-control" placeholder="Year" name="songyear">
                </div>
            </div>
                <!--Composer/artist-->
                <div class="row input-clr py-2">
                    <div class="col-sm-6">
                        <h3><input type="text" class="form-control " placeholder="Composer" name="songcomposer"></h3>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Aritst" name="songartist">
                    </div>
                </div>
                <!--Year Checkbox-->
                <div class="alert alert-secondary py-2" role="alert" style="text-align:center";>
                    <div class="row input-clr">
                        <div class="col">
                            <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example" name="circa">
                            <option  value="">CIRCA</option>
                            <option value="1750-1799">1750-1799</option>
                            <option value="1800-1849">1800-1849</option>
                            <option value="1849-1900">1850-1900</option>
                            <option value="1900-1949">1900-1949</option>
                            <option value="1950-1999">1950-1999</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example" name="region">
                            <option  value="">REGION</option>
                            <option value="East">East</option>
                            <option value="South Central">South Central</option>
                            <option value="South West">South West</option>
                            <option value="Central">Central</option>
                            <option value="North">North</option>
                            </select>
                        </div>
                     </div>
                </div>
                    <!--Annootation-->
                <h4 class = "label"> <label for="shortannotation">Annotations</label></h4>
                <div class="row input-clr">       
                    <textarea class="form-control m-2 mb-3" rows="2" id="comment" placeholder="Short Annotation" name="shortanno"></textarea>
                    <textarea class="form-control m-2 mb-2" rows="5" id="comment" placeholder="Long Annotation" name="longanno"></textarea>
                </div>
                <div class="row input-clr py-3">
                    <div class="col-sm-6" >
                    <!--Images-->
                        <div>
                            <div class="form-group">
                                <h4 class = "label"> <label for="imageannotation">Image Annotation</label></h4>
                                 <textarea  class="form-control" rows="3" name="imageanno" placeholder="Image info"></textarea>
                             </div>
                            <br>
                            <h4 class = "label"><label for="image">Images</label></h4>
                            <div class = "img py-2">
                                <img src="images/placeholder.jpg" alt="Lights" style="width:70%" id="image_preview">
                            </div>
                             <div class="row">
                                <div class="col-sm-10 py-3 ">
                                    <div class="container mt-1">
                                        <div class="form-group upload-btn-wrapper">
                                            <button class="btn">Choose File</button>
                                            <input class="form-control" id="image_input" type="file" name="uploadfile" value="" />
                                        </div>
                                        <div class="form-group">
                                        </div>
                                    </div>
                                </div>
                                    <script type="text/javascript">
                                        const imageInput = document.getElementById('image_input');
                                        const imagePreview = document.getElementById('image_preview');
                                        imageInput.addEventListener('change', () => {
                                        const file = imageInput.files[0];
                                        const reader = new FileReader();

                                        reader.addEventListener('load', () => {
                                        imagePreview.src = reader.result;
                                        });
                                        if (file) {
                                        reader.readAsDataURL(file);
                                        }
                                        });
                                    </script>
                                <!--thumbnail image-->
                                <div class="form-group  py-2">
                                <a href="images/placeholder.jpg"></a>
                                <div class="img py-2">

                                    <img src="images/placeholder.jpg" alt="Lights" style="width:70%" id="thumb_preview">
                                </div>
                                    </div>
                                <div class="row">
                                    <div class="col-sm-10 py-3">
                                        <div class="container mt-1">
                                                <div class="custom-file mb-1 upload-btn-wrapper">
                                                <button class="btn">Choose File</button>
                                                    <input type="file" class="custom-file-input" name="imagethumb" id="imagethumb">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                        const imagethumb = document.getElementById('imagethumb');
                                        const thumb_preview = document.getElementById('thumb_preview');
                                        imagethumb.addEventListener('change', () => {
                                        const file = imagethumb.files[0];
                                        const reader = new FileReader();

                                        reader.addEventListener('load', () => {
                                            thumb_preview.src = reader.result;
                                        });
                                        if (file) {
                                        reader.readAsDataURL(file);
                                        }
                                        });
                                    </script>
                                <hr>
                                    <!--sheet music-->
                                <div class="form-group py-3 ">
                                    <h4 class = "label"> <label for="sheetannotation">Sheet Annotation</label></h4>
                                    <textarea class="form-control" rows="3" name="sheetanno" placeholder="Sheet info"></textarea>
                                </div>
                                <br>
                                <div class="sheet">

                                    <h4 class = "label"> <label>Sheet Music</label> </h4>
                                    <div style="text-align: left;">
                                        <div class = "img"><img src="images/sheet1.png" alt="Lights" style="width:50%" id="sheet_preview">
                                        </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 p-2">
                                        <div class="container mt-1">
                                                <div class="custom-file upload-btn-wrapper mb-1 py-3">
                                                    <button class = "btn">Choose File</button>
                                                <input type="file" class="custom-file-input" name="sheetmusic"  id="sheet-thumb">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                 <script type="text/javascript">
                            const imagethumbs = document.getElementById('sheet-thumb');
                            const thumb_previews = document.getElementById('sheet_preview');
                            imagethumbs.addEventListener('change', () => {
                            const file = imagethumbs.files[0];
                            const reader = new FileReader();

                            reader.addEventListener('load', () => {
                                thumb_previews.src = reader.result;
                            });
                            if (file) {
                            reader.readAsDataURL(file);
                            }
                            });
                        </script>
                            </div>
                        </div><!--end of container-->
                    </div> <!--end of col-->
                    <div class="col-sm-6">
                        <!--Audio-->
                        <div class="container-fluid">
                            <div class="form-group">
                                <h4 class = "label"> <label for="annotation">Audio Annotation</label></h4>
                                <textarea class="form-control" rows="3" name="audioanno" placeholder="Audio info"></textarea>
                            </div>
                            <br>
                            <h4 class = "label"><label for="audio1">Audio1</label></h4>
                            <audio class = "my-2" id="audio_player" controls>  
                            </audio>
                            <div class="container mt-1">
                                <div class="custom-file mb-1 upload-btn-wrapper pt-2 pb-3">
                                    <button class ="btn"> Choose File</button>
                                    <input type="file" id="audio1" class="custom-file-input" name="audio1">
                                </div>
                            </div>
                                <script>
                                    // Get the input file element
                                    var audio1 = document.getElementById('audio1');

                                    // Add an event listener to the input file element
                                    audio1.addEventListener('change', function() {
                                    // Get the selected file
                                    var file = audio1.files[0];

                                    // Create a new FileReader object
                                    var reader = new FileReader();

                                    // Add an event listener to the FileReader object
                                    reader.addEventListener('load', function() {
                                    // Get the audio element
                                    var audio = document.getElementById('audio_player');

                                    // Set the src attribute of the audio element to the data URL
                                    audio.src = reader.result;
                                    });

                                    // Read the contents of the selected file as a data URL
                                    reader.readAsDataURL(file);
                                    });
                                </script>
                                <br>
                            <h4 class = "label"><label for="audio2">Audio2</label></h4>
                            <audio class = "mt-2" id="audioplayer" controls>
                            </audio>
                                <div class="col-sm-10 p-2">
                                    <div class="container mt-1">
                                        <div class="custom-file mb-1 upload-btn-wrapper pt-2 pb-3">
                                            <button class= " btn"> Choose File</button>
                                            <input type="file" class="custom-file-input" name="audio2" id="audio2">
                                        </div>
                                    </div>
                                </div>
                                    <script>
                                        // Get the input file element
                                        var audio2 = document.getElementById('audio2');

                                        // Add an event listener to the input file element
                                        audio2.addEventListener('change', function() {
                                        // Get the selected file
                                        var file = audio2.files[0];

                                        // Create a new FileReader object
                                        var reader = new FileReader();

                                        // Add an event listener to the FileReader object
                                        reader.addEventListener('load', function() {
                                        // Get the audio element
                                        var audio = document.getElementById('audioplayer');

                                        // Set the src attribute of the audio element to the data URL
                                        audio.src = reader.result;
                                        });

                                        // Read the contents of the selected file as a data URL
                                        reader.readAsDataURL(file);
                                        });
                                    </script>
                            <!--Video-->
                            <hr>
                            <div class=" py-3">
                                <h4 class = "label pb-2"> <label for="imageannotation">Video Annotation</label></h4>
                                    <textarea class="form-control" rows="3" name="videoanno" placeholder="Video info"></textarea>
                                    <br>
                                <h4 class = "label"> <label for="video1">Video1</label></h4>
                                    <video width="320" height="240" controls id="videoplayer">
                                        
                                    </video>
                                </div>
                                <br>
                                <div class="container mt-1">
                                        <div class="custom-file mb-1 upload-btn-wrapper py-3">
                                        <button class = "btn">Choose File</button>
                                        <input type="file" class="custom-file-input" name="video1" id="video1" onchange="checkFileSize(this)">
                                        <script type="text/javascript">
                                            function checkFileSize(input) {
  if (input.files && input.files[0]) {
    const fileSize = input.files[0].size / 1024 / 1024; // Convert to MB
    if (fileSize > 40) {
      alert("File size cannot exceed 40 MB.");
      input.value = ""; // Clear the input file
    }
  }
}

                                        </script>
                                        <div id="progressBar">
                                          <div id="progressBarFill"></div>
                                        </div>
                                        </div>
                                    <script>
                                        // Get the input file element
                                        var video1 = document.getElementById('video1');

                                        // Add an event listener to the input file element
                                        video1.addEventListener('change', function() {
                                        // Get the selected file
                                        var file = video1.files[0];

                                        // Create a new FileReader object
                                        var reader = new FileReader();

                                        // Add an event listener to the FileReader object
                                        reader.addEventListener('load', function() {
                                        // Get the audio element
                                        var video = document.getElementById('videoplayer');

                                        // Set the src attribute of the audio element to the data URL
                                        video.src = reader.result;
                                        });

                                        // Read the contents of the selected file as a data URL
                                        reader.readAsDataURL(file);
                                        });
                                    </script>
                                    <br>
                                    
                                </div>
                                <h4 class = "label"> <label for="video">Video2</label></h4>
                                <div class="row">
                                    <div class="container mt-1">
                                        <iframe id="youtubevide" src="" style="display: none;width: 100%;    height: 280px;">
                                        </iframe>
                                        <div class="custom-file mb-1">
                                            <input type="text" class="form-control" placeholder="YouTube" name="video2" id="youtube"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!--end of col-->
                         </div> <!--end of row-->
                        <br><hr>
                        <div class="container-fluid">
                            <!--Themes-->
                                <div class="row input-clr p-3 m-2">
                                    <div class="col"><input type="text" class="form-control" placeholder="theme1" name="theme1"></div>
                                    <div class="col"><input type="text" class="form-control" placeholder="theme2" name="theme2"></div>
                                    <div class="col"><input type="text" class="form-control" placeholder="theme3" name="theme3"></div>
                                </div>
                        <Br>
                        </div>
                        <div class="container-fluid" style="text-align: center;">
                        <!--uploadfile-->
                        <div class="fileuploader">
                         <h4 > Select image to upload:</h4>
                         <div class = "upload-btn-wrapper">
                                <button class = "btn">Choose File</button>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                        </div>
                            

                            
                            <!--<input type="submit" value="submit" name="submit">-->
                        
                            <hr>
                            <button type="submit" class="btn btn-primary" input type="submit"  form="uploadsong" value="Submit">UPLOAD PAGE</button>
                        </div>
        
                    </div><!--end of container--> <br>
    </form>   
    <script type="text/javascript">
        jQuery(document).ready(function(){
            const fileInput = document.getElementById('video1');
const progressBar = document.getElementById('progressBar');

fileInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  const fileSize = file.size;

  const reader = new FileReader();
  reader.onloadend = () => {
    progressBar.style.width = '100%';
    progressBar.innerText = '100%';
  };
  reader.onprogress = (event) => {
    const percentComplete = Math.round((event.loaded / fileSize) * 100);
    progressBar.style.width = `${percentComplete}%`;
    progressBar.innerText = `${percentComplete}%`;
  };

  reader.readAsDataURL(file);
});
        jQuery('input[type=file]').change(function(){

var text= jQuery(this).val().split('\\').pop()
                                   
jQuery(this).prev().text(text)
    
})
        jQuery('#youtube').change(function(){
           var abc = jQuery(this).val()
            if(abc != ''){
                zxc= abc.split('watch?v=');
                xyz = zxc.join("embed/")
                jQuery('#youtubevide').attr('src', xyz )
            jQuery('#youtubevide').show()
            }
            else{
                jQuery('#youtubevide').hide()
            }

        })
             })
   
    </script>

</body>
</html>