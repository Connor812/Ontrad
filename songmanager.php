<?php
require_once("config/db.php");
require_once("php/header.php");
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo " 
    <script>
    alert(' $message ')
    location.replace('songmanager.php');
    </script>
    ";
}
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
    Hello World
    <!--start-->
    <form action="uploadsong.php" method="post" enctype="multipart/form-data" id="uploadsong">
        <div class="container-fluid pt-3" style="max-width: 70%;">
            <!--search and load-->
            <div class="row d-none">
                <div class="col-8">
                    <h3>Song Manager</h3>
                    <div class="input-group mb-3 d-none">
                        <input type="text" class="form-control" placeholder="SEARCH SONG NAME"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="searchsong">SEARCH</button>
                    </div>
                </div>
            </div>
            <!--search results-->
            <div class="d-none" style="color: grey;">...search results</div>
            <!--title and date-->
            <div class="row input-clr py-2 mt-5">
                <!-- THIS IS NOT BEING ADDED FOR NOW <div class="col-lg-2 col-md-4  col-sm-2 ">
                    <input type="text" class="form-control" placeholder="catalog number" name="songnum">
                </div> -->
                <div class="col-lg-8 col-md-4 col-sm-8">
                    <h4><input type="text" class="form-control " placeholder="Song Title" name="title" required></h4>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-2">
                    <input type="text" class="form-control" placeholder="Year" name="songyear" required>
                </div>
            </div>
            <!--Composer/artist-->
            <div class="row input-clr py-2">
                <div class="col-sm-6">
                    <h3><input type="text" class="form-control " placeholder="Composer" name="songcomposer" required>
                    </h3>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Aritst" name="songartist" required>
                </div>
            </div>
            <!--Year Checkbox-->
            <div class="alert alert-secondary py-2" role="alert" style="text-align:center" ;>
                <div class="row input-clr">
                    <div class="col">
                        <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example"
                            name="circa" required>
                            <option value="">CIRCA</option>
                            <option value="1750-1799">1750-1799</option>
                            <option value="1800-1849">1800-1849</option>
                            <option value="1849-1900">1850-1900</option>
                            <option value="1900-1949">1900-1949</option>
                            <option value="1950-1999">1950-1999</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example"
                            name="region" required>
                            <option value="">REGION</option>
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
            <h4 class="label"> <label for="shortannotation">Annotations</label></h4>
            <div> <label for="checkbox">Instrumental</label>

                <input type="hidden" id="checkbox" name="checkbox" value="0">
                <input type="checkbox" name="checkbox" id="checkbox" value="1">
                <!-- <p id="textscores" style="display:none">Checkbox is CHECKED!</p> -->
                <?php $checkbox = (isset($_POST['checkbox'])) ? intval($_POST['checkbox']) : 0; // returns 0 or 1 
                ?>
            </div>

            <div class="row input-clr">
                <textarea class="form-control m-2 mb-3" rows="2" id="comment" placeholder="Short Annotation"
                    name="shortanno" required></textarea>
                <textarea class="form-control m-2 mb-2" rows="5" id="comment" placeholder="Long Annotation"
                    name="longanno"></textarea>
            </div>
            <div class="row input-clr py-3">
                <div class="col-sm-6">
                    <!--Images-->
                    <div>
                        <div class="form-group">
                            <h4 class="label"> <label for="imageannotation">Image Annotation</label></h4>
                            <textarea class="form-control" rows="3" name="imageanno"
                                placeholder="Image info"></textarea>
                        </div>
                        <br>
                        <h4 class="label">
                            <label for="image">Image</label>
                        </h4>
                        <div class="img py-2">
                            <img src="images/placeholder.jpg" alt="Lights" style="width:70%" id="image_preview">
                        </div>
                        <div class="row">
                            <div class="col-sm-10 py-3 ">
                                <div class="container mt-1">
                                    <div class="form-group upload-btn-wrapper" style="overflow: none;">
                                        <button class="btn btn-primary">Choose File</button>
                                        <input class="form-control" id="image_input" type="file" name="uploadfile"
                                            value="">
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
                            <h4 class="label">
                                <label for="image">Thumbnail Image</label>
                            </h4>
                                <a href="images/placeholder.jpg"></a>
                                <div class="img py-2">
                                    <img src="images/placeholder.jpg" class="img-fluid img-thumbnail" alt="Lights"
                                        style="width:70%" id="thumb_preview">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 py-3">
                                    <div class="container mt-1">
                                        <div class="custom-file mb-1 upload-btn-wrapper">
                                            <button class="btn btn-primary">Choose File</button>
                                            <input type="file" class="custom-file-input" name="imagethumb"
                                                id="imagethumb">
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
                                <h4 class="label"> <label for="sheetannotation">Sheet Annotation</label></h4>
                                <textarea class="form-control" rows="3" name="sheetanno"
                                    placeholder="Sheet info"></textarea>
                            </div>
                            <br>
                            <h4 class="label"> <label>Sheet Music</label> </h4>
                            <div style="width: 100%; height: auto; border-style: solid; border-color:blue;">
                                <img src="images/sheet1.png" alt="Lights" style="width:100%; height:auto;"
                                    id="sheet_preview" required>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 p-2">
                                    <div class="container mt-1">
                                        <div class="custom-file mb-1 upload-btn-wrapper">
                                            <button class="btn btn-primary">Choose File</button>
                                            <input type="file" class="custom-file-input" name="sheetmusic"
                                                id="sheet-thumb">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">                            
                            const imagethumbs = document.getElementById('sheet-thumb');
                            const thumb_previews = document.getElementById('sheet_preview');

                            imagethumbs.addEventListener('change', () => {
                                const file = imagethumbs.files[0];
                                if (file) {
                                    const fileName = file.name;
                                    const fileExtension = fileName.split('.').pop().toLowerCase();

                                    if (fileExtension === 'png' || fileExtension === 'jpg') {
                                        const reader = new FileReader();
                                        reader.addEventListener('load', () => {
                                            thumb_previews.src = reader.result;
                                        });
                                        reader.readAsDataURL(file);
                                    } else if (fileExtension === 'pdf') {
                                        thumb_previews.src = 'musicsheet/pdficon.png'; 
                                    } else {
                                        alert("Image is Not Uploaded Successfully. Try Again") 
                                    }
                                } else {
                                    thumb_previews.src = ''; 
                                }
                            });

                            </script>
                        </div>
                    </div>
                    <!--end of container-->
                </div>
                <!--end of col-->
                <div class="col-sm-6">
                    <!--Audio-->
                    <div class="container-fluid">
                        <div class="form-group">
                            <h4 class="label"> <label for="annotation">Audio Annotation</label></h4>
                            <textarea class="form-control" rows="3" name="audioanno"
                                placeholder="Audio info"></textarea>
                        </div>
                        <br>
                        <h4 class="label"><label for="audio1">Audio1</label></h4>
                        <audio class="my-2" id="audio_player" controls>
                        </audio>
                        <div class="container mt-1">
                            <div class="custom-file mb-1 upload-btn-wrapper">
                                <button class="btn btn-primary"> Choose File</button>
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
                        <h4 class="label"><label for="audio2">Audio2</label></h4>
                        <audio class="mt-2" id="audioplayer" controls>
                        </audio>
                        <div class="col-sm-10 p-2">
                            <div class="container mt-1">
                                <div class="custom-file mb-1 upload-btn-wrapper">
                                    <button class="btn btn-primary"> Choose File</button>
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
                            <h4 class="label pb-2"> <label for="imageannotation">Video Annotation</label></h4>
                            <textarea class="form-control" rows="3" name="videoanno"
                                placeholder="Video info"></textarea>
                            <br>
                            <h4 class="label"> <label for="video1">Video1</label></h4>
                            <video width="320" height="240" controls id="videoplayer">

                            </video>
                        </div>
                        <br>
                        <div class="container mt-1">
                            <div class="custom-file mb-1 upload-btn-wrapper">
                                <button class="btn btn-primary">Choose File</button>
                                <input type="file" class="custom-file-input" name="video1" id="video1"
                                    onchange="checkFileSize(this)">
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
                        <h4 class="label"> <label for="video">YouTube</label></h4>
                        <div class="row">
                            <div class="container mt-1">
                                <iframe id="youtubevide" src="" style="display: none;width: 100%;    height: 280px;">
                                </iframe>
                                <div class="custom-file mb-1">
                                    <input type="text" class="form-control" placeholder="YouTube" name="video2"
                                        id="youtube">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
            <br>
            <hr>



            <!-- Theme Selection Section  -->

            <div class="container-fluid" style="width: 60%; text-align:center">
                <!--Themes-->
                <p class="card-title">clicking choose theme brings up list of themes<br>Each song can have up to three
                    themes</p><br>

                   
                    <input type="text" id="themeInput" class="form-control" placeholder="Themes" name="theme2" style="text-align: center;" value="">
                    <button type="button" class="btn btn-primary mt-2 mb-2" style="width: 30%;" data-toggle="modal" data-target="#themelist">Choose Themes</button>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <!-- The Edit Modal -->
                        <div class="modal fade" id="themelist">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Choose Theme</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body" style="text-align: left;">
                                        <table class="table themeLoadTable">
                                            <thead>
                                            <?php
                                                $sql = "SELECT * FROM `themes`";
                                                $result = mysqli_query($conn, $sql);
                                                if($result){
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        echo "
                                                        <tr>
                                                            <td style='padding:0;'>
                                                                <label class='row-label' style='margin:5px;'>
                                                                    <input type='hidden' id='selectedIdsInput' name='selectedIds[]' value=''>
                                                                    <input type='checkbox' class='theme_title_load' name='selectedThemes[]' id='".$row['id']."' value='".$row['theme_title']."'>
                                                                    ".$row['theme_title']."
                                                                </label>
                                                            </td>
                                                        </tr>                                                          
                                                        ";
                                                    }
                                                }
                                            ?>
                                        </thead>
                                        </table>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" id="choose-theme-btn" onclick="setSelectedThemes()" class="btn btn-danger btn-small" data-dismiss="modal" aria-hidden="true">Choose Theme</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <hr>
            </div>
            <!-- THIS IS NOT BEING ADDED FOR NOW
             <div class="container-fluid" style="text-align: center;">
              
                <div class="fileuploader">
                    <hrr><br>
                        <div class="form-group">
                            <h4> Select image to upload:</h4>
                            <input type="text" class="form-control" placeholder="Image Title" name="imagetitle">
                            <br>
                            <input type="text" class="form-control" placeholder="Image Year" name="imageyear">
                            <br>
                            <textarea class="form-control" rows="5" id="comment" placeholder="Image info"></textarea>
                        </div>
                        <br>
                        <div class="upload-btn-wrapper">
                            <h4>Find image and load text and image below<br></h4>

                            <button class="btn">Choose Image</button>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <hr>

                        <div class="container">
                            <div class="card-group">
                                <div class="card" style="width:300px">
                                    <p class="card-title"><b>Image title</b></p>
                                    <p class="card-title"><small> Year</small></p>
                                    <img class="card-img-top" src="images/bella.jpeg" alt="Card image">
                                    <div class="card-body">
                                        <p class="card-text">image info</p>
                                    </div>
                                </div>
                                <div class="card" style="width:300px">
                                    <p class="card-title"><b>Image title</b></p>
                                    <p class="card-title"><small> Year</small></p>
                                    <img class="card-img-top" src="images/iansnose.png" alt="Card image">
                                    <div class="card-body">
                                        <p class="card-text">image info</p>
                                    </div>
                                </div>
                                <div class="card" style="width:300px">
                                    <p class="card-title"><b>Image title</b></p>
                                    <p class="card-title"><small> Year</small></p>
                                    <img class="card-img-top" src="images/bella.jpeg" alt="Card image">
                                    <div class="card-body">
                                        <p class="card-text">image info</p>
                                    </div>
                                </div>
                                <div class="card" style="width:300px">
                                    <p class="card-title"><b>Image title</b></p>
                                    <p class="card-title"><small> Year</small></p>
                                    <img class="card-img-top" src="images/haaland.png" alt="Card image">
                                    <div class="card-body">
                                        <p class="card-text">image info</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            <input type="submit" value="submit" name="submit">-->

            <hr>
            <div style="text-align: center;">
                <h4>Create page with media in database<br></h4>
                <button type="submit" class="btn btn-primary" id="upload-song" input type="submit" form="uploadsong"
                    value="Submit">UPLOAD PAGE</button>
            </div>
        </div>
        <!--end of container-->
    </form>
    <hr>
    <br>
    <br>
    <br>

    <script type="text/javascript">
    jQuery(document).ready(function() {
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
        jQuery('input[type=file]').change(function() {

            var text = jQuery(this).val().split('\\').pop()

            jQuery(this).prev().text(text)

        })
        jQuery('#youtube').change(function() {
            var abc = jQuery(this).val()
            if (abc != '') {
                zxc = abc.split('watch?v=');
                xyz = zxc.join("embed/")
                jQuery('#youtubevide').attr('src', xyz)
                jQuery('#youtubevide').show()
            } else {
                jQuery('#youtubevide').hide()
            }

        })


    })

    let selectedThemes = [];
    let selectedIds = [];
    function setSelectedThemes() {
        const selectedCheckboxes = document.querySelectorAll('input[type="checkbox"].theme_title_load:checked');
        // console.log(selectedCheckboxes)
        if (selectedCheckboxes.length <= 3) {
            selectedThemes = Array.from(selectedCheckboxes).map(checkbox => checkbox.value);
            selectedIds = Array.from(selectedCheckboxes).map(checkbox => checkbox.id);

            document.getElementById('themeInput').value = selectedThemes.join(', ');
            document.getElementById('selectedIdsInput').value = selectedIds.join(', ');

        } else {
            alert('You can select up to three themes.');
        }
    }

    



    </script>

</body>

</html>