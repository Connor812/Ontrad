<?php
require_once("config/db.php");
require_once("php/header.php");

$id = $_GET['id'];
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo " 
    <script>
    alert(' $message ')
    location.replace('edit.php?id=".$id."');
    </script>
    ";
}



$sql = "SELECT * FROM `newtable` WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Song</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <style type="text/css">
    button.btn {
        border: 2px solid;
        cursor: pointer;
    }

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
    version 4.5
    <!--start-->
    <form action="update.php" method="post" enctype="multipart/form-data" id="uploadsong">

        <div class="container-fluid pt-3" style="max-width: 80%;">
            <div class="row d-none">
                <!--search and load-->
                <div class="col-8">
                    <h3>Song Manager</h3>
                    <div class="input-group mb-3 d-none">
                        <input type="text" class="form-control" placeholder="SEARCH SONG NAME"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="searchsong">SEARCH</button>
                    </div>
                </div>
            </div>
            <div class="d-none" style="color: grey;">...search results</div>
            <!--search results-->
            <!--title and date-->
            <div class="row row input-clr py-2 mt-5">
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <input type="hidden" class="form-control" placeholder="ID" name="id"
                        value="<?php echo $row["ID"] ?>">
                    <input type="text" class="form-control" placeholder="catalog number" name="songnum"
                        value="<?php echo $row["songnum"] ?>">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <h3><input type="text" class="form-control " placeholder="Song Title" name="title"
                            value="<?php echo $row["Stitle"] ?>" required></h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <input type="text" class="form-control" placeholder="Year" name="songyear"
                        value="<?php echo $row["songyear"] ?>" required>
                </div>
            </div>
            <!--Composer/artist-->
            <div class="row input-clr py-2">
                <div class="col-sm-6">
                    <h3><input type="text" class="form-control " placeholder="Composer" name="songcomposer"
                            value="<?php echo $row["songcomposer"] ?>" required></h3>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Aritst" name="songartist"
                        value="<?php echo $row["songartist"] ?>" required>
                </div>
            </div>
            <div class="alert alert-secondary" role="alert" style="text-align:center" ;>
                <!--Year Checkbox-->
                <div class="row">
                    <div class="col">
                        <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example"
                            name="circa" required>
                            <option value="<?php echo $row["circa"] ?>"><?php echo $row["circa"] ?></option>
                            <option value="">CIRCA</option>
                            <option value="1750-1799">1750-1799</option>
                            <option value="1800-1849">1800-1849</option>
                            <option value="1800-1849">1849-1900</option>
                            <option value="1900-1949">1900-1949</option>
                            <option value="1950-1999">1950-1999</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example"
                            name="region" required>
                            <option value="<?php echo $row["region"] ?>"><?php echo $row["region"] ?></option>
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

            <!-- annotation -->
            <h4 class="label"><label for="shortannotation">Annotations</label></h4>
            <!--Annootation-->

            <div> <label for="checkbox">Instrumental</label>

                <!-- <input type="checkbox" id="myCheck" onclick="myFunction()"> -->
                <!-- <p id="text" style="display:none">Checkbox is CHECKED!</p> -->



                <input type="hidden" id="checkbox" name="checkbox" value="0">
                <input type="checkbox" name="checkbox" <?php if ($row["checkbox"] == 1) {
                                                                    echo "checked";
                                                                } ?> id="checkbox" value="1">
                <p id="textscores" style="display:none">Checkbox is CHECKED!</p>

                <?php $checkbox = (isset($_POST['checkbox'])) ? intval($_POST['checkbox']) : 0; // returns 0 or 1 
                        ?>
            </div>

            <div class="row input-clr">

                <textarea class="form-control m-2 mb-3" rows="2" id="comment" placeholder="Short Annotation"
                    name="shortanno"><?php echo $row["shortanno"] ?></textarea>
                <textarea class="form-control m-2 mb-2" rows="5" id="comment" placeholder="Long Annotation"
                    name="longanno"><?php echo $row["longanno"] ?></textarea>
            </div>
            <div class="row input-clr py-3">
                <div class="col-sm-6">
                    <!--Images-->

                    <div class="form-group">
                        <h4 class="label"> <label for="imageannotation">Image Annotation</label></h4>
                        <textarea class="form-control" rows="3" name="imageanno"
                            placeholder="image info"><?php echo $row["imageanno"] ?></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <h4 class="label"><label for="image">Images</label></h4>
                        <div class="img py-2">
                            <?php
                                    
                                    $extension = pathinfo($row["imageFull"], PATHINFO_EXTENSION);
                                    if ($extension == "pdf") {
                                    ?>
                            <a href="images/<?php echo $row["imageFull"] ?>"><img src="images/pdficon.png" alt="PDF"
                                    style="width:64px;text-align:left;" id="image_preview" class="image-set"></a>
                            <?php
                                    } else if ($extension == "doc" || $extension == "docx") {
                                    ?>
                            <a href="images/<?php echo $row["imageFull"] ?>"><img src="images/word.png" alt="Word"
                                    style="width:64px;text-align:left;" id="image_preview" class="image-set"></a>
                            <?php
                                    } else {
                                        if($row['imageFull']!=NULL && !empty($row['imageFull'])){
                                    ?>
                            <img src="images/<?php echo $row["imageFull"] ?>" style="width:100%;height:auto;"
                                id="image_preview" class="image-set">
                            <?php
                                    }else{
                                    echo "<img src='images/placeholder.jpg' style='width:70%;height:auto;' id='image_preview' class='image-set'>";
                                }
                                    }
                                
                                    ?>
                        </div>
                        <div class="row py-3">
                            <div class="col-sm-10 p-2">
                                <div class="container mt-1">
                                    <div class="form-group upload-btn-wrapper">
                                        <button class="btn btn-primary">Choose File</button>
                                        <input type="hidden" value="<?php echo $row["imageFull"] ?>" name="old_image" />
                                        <input class="form-control" id="image_input" type="file" name="uploadfile"
                                            value="imgaes/<?php echo $row["imageFull"] ?>" />
                                    </div>
                                </div>
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
                    <div class="form-group  py-2">
                        <div class="img">

                            <?php
                                    $extension = pathinfo($row["imageThumb"], PATHINFO_EXTENSION);
                                    if ($extension == "pdf") {
                                    ?>
                            <a href="images/<?php echo $row["imageThumb"] ?>"><img src="images/pdficon.png" alt="PDF"
                                    style="width:64px;text-align:left;" id="thumb_preview" class="image-set"></a>
                            <?php
                                    } else if ($extension == "doc" || $extension == "docx") {
                                    ?>
                            <a href="images/<?php echo $row["imageThumb"] ?>"><img src="images/word.png" alt="Word"
                                    style="width:64px;text-align:left;" id="thumb_preview" class="image-set"></a>
                            <?php
                                    } else {
                                        if($row['imageThumb']!=NULL && !empty($row['imageThumb'])){
                                    ?>
                            <img src="images/<?php echo $row["imageThumb"] ?>" alt="Lights"
                                style="width:100%;height:auto;" id="thumb_preview" class="image-set">
                            <?php
                                    }else{
                                        echo "<img src='images/placeholder.jpg' style='width:70%;height:auto;' id='thumb_preview' class='image-set'>";
                                    }
                                    }
                                    ?>
                        </div>
                    </div>
                    <div class="row">
                        <!--thumbnail image-->
                        <div class="col-sm-10 p-2">
                            <div class="container mt-1">
                                <div class="custom-file mb-1 upload-btn-wrapper">
                                    <button class="btn btn-primary">Choose File</button>
                                    <input type="hidden" value="<?php echo $row["imageThumb"] ?>" name="thumb_image" />
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
                    <div class="form-group py-3">
                        <h4 class="label"> <label for="sheetannotation">Sheet Annotation</label></h4>
                        <textarea class="form-control" rows="3" name="sheetanno"
                            placeholder="Sheet info"><?php echo $row["sheetanno"] ?></textarea>
                    </div>
                    <br>

                    <h4 class="label"> <label>Sheet Music</label></h4>
                    <?php
                            $extension = pathinfo($row["sheetmusic"], PATHINFO_EXTENSION);
                            ?>
                    <div style="text-align: center;">
                        <div style="text-align:left;">
                            <?php if ($extension == "pdf") { ?>
                            <a href="musicsheet/<?php echo $row["sheetmusic"] ?>"><embed
                                    src="musicsheet/<?php echo $row["sheetmusic"]; ?>" height="700px" width="500"></a>
                            <?php } else if ($extension == "doc" || $extension == "docx") { ?>
                            <a href="musicsheet/<?php echo $row["sheetmusic"] ?>"><img src="musicsheet/word.png"
                                    alt="Word" style="width:100%; height:auto; text-align:left;" class="image-set"
                                    id="thumb_previews"></a>
                            <?php } else {
                                        if($row['sheetmusic']!=NULL && !empty($row['sheetmusic'])){
                                        ?>
                            <a href="musicsheet/<?php echo $row["sheetmusic"] ?>"><img
                                    src="musicsheet/<?php echo $row["sheetmusic"] ?>" alt="Image"
                                    style="width:100%;height:auto;" class="image-set" id="thumb_previews"></a>
                            <?php 
                                        }else{
                                            echo "<img src='images/sheet1.png' style='width:70%;height:auto;' id='thumb_previews' class='image-set'>";
                                        }
                                } ?>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-10 p-2">
                            <div class="container mt-1">
                                <div class="custom-file mb-1 upload-btn-wrapper">
                                    <button class="btn btn-primary">Choose File</button>
                                    <input type="hidden" value="<?php echo $row["sheetmusic"] ?>"
                                        name="sheetmusic_image" />
                                    <input type="file" class="custom-file-input" name="sheetmusic" id="imagethumbs">
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                    const imagethumbs = document.getElementById('imagethumbs');
                    const thumb_previews = document.getElementById('thumb_previews');

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
                <!--end of col-->
                <div class="col-sm-6">
                    <!--Audio-->
                    <div class="container-fluid">
                        <div class="form-group">
                            <h4 class="label"> <label for="annotation">Audio Annotation</label></h4>
                            <textarea class="form-control" rows="3" name="audioanno"
                                placeholder="audio info"><?php echo $row["audioanno"] ?></textarea>
                        </div>
                        <br>
                        <h4 class="label"><label for="audio1">Audio1</label></h4>
                        <audio class="my-2" id="audio_player" controls>
                            <source src="audio/<?php echo $row["audio1"] ?>" type="audio/mpeg">
                        </audio>
                        <div class="container mt-1">
                            <div class="custom-file mb-1 upload-btn-wrapper">
                                <button class="btn btn-primary">Choose File</button>
                                <input type="hidden" value="<?php echo $row["audio1"] ?>" name="old_audio1" />
                                <input type="file" id="audio1" class="custom-file-input" value="Audio1" name="audio1">
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
                        <audio class="my-2" id="audioplayer" controls>
                            <source src="audio/<?php echo $row["audio2"] ?>" type="audio/mpeg">
                        </audio>
                        <div class="col-sm-10 p-2">
                            <div class="container mt-1">
                                <div class="custom-file mb-1 upload-btn-wrapper">
                                    <button class="btn btn-primary">Choose File</button>
                                    <input type="hidden" value="<?php echo $row["audio2"] ?>" name="old_audio2" />
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
                        <h4 class="label pb-2"> <label for="imageannotation">Video Annotation</label></h4>
                        <textarea class="form-control" rows="3" name="videoanno"
                            placeholder="video info"><?php echo $row["videoanno"] ?></textarea>
                        <br>
                        <h4 class="label"> <label for="video">Video1</label></h4>
                        <video width="320" height="240" controls id="videoplayer">
                            <source src="video/<?php echo $row["video1"] ?>" type="video/mp4">
                        </video>
                        <br>
                        <div class="container mt-1 ">
                            <div class="custom-file mb-1 upload-btn-wrapper">
                                <button class="btn btn-primary">Choose File</button>
                                <input type="hidden" value="<?php echo $row["video1"] ?>" name="old_video1" />
                                <input type="file" class="custom-file-input" name="video1" id="video1">
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
                            <h4 class="label"> <label for="video">Link</label></h4>
                                <div class="row">
                                    <div class="container mt-1">
                                        <!--<iframe id="youtubevide" src="" style="display: none; width: 100%; height: 280px;">-->
                                        <!-- </iframe> -->
                                        <div class="custom-file mb-1">
                                            <input type="text" class="form-control" id="youtube" maxlength="500" placeholder="Link" name="video2" value='<?php echo $row['video2']; ?>'>
                                        </div>
                                    </div>
                                </div>
                            <script>
                            // Get the input file element
                            var video2 = document.getElementById('video2');

                            // Add an event listener to the input file element
                            video2.addEventListener('change', function() {
                                // Get the selected file
                                var file = video2.files[0];

                                // Create a new FileReader object
                                var reader = new FileReader();

                                // Add an event listener to the FileReader object
                                reader.addEventListener('load', function() {
                                    // Get the audio element
                                    var videop = document.getElementById('video_player');

                                    // Set the src attribute of the audio element to the data URL
                                    videop.src = reader.result;
                                });

                                // Read the contents of the selected file as a data URL
                                reader.readAsDataURL(file);
                            });
                            </script>
                        </div>
                    </div>
                    <!--end of container-->
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
            <!--Themes-->
            <div class="container-fluid" style="width: 60%; text-align:center">
                <!--Themes-->
                <p class="card-title">clicking choose theme brings up list of themes<br>Each song can have up to three
                    themes</p><br>
                <?php 
                    $sql2 = "SELECT *
                    FROM themes_songs
                    LEFT JOIN themes
                    ON themes_songs.theme_id = themes.id WHERE song_id = '$id' LIMIT 3";
                    $result2 = mysqli_query($conn, $sql2);
                    $preselectedThemesIds = [];
                    $preselectedThemesNames = [];
                    // $row = mysqli_fetch_assoc($result2);
                    echo " <input type='text' id='themeInput' class='form-control' placeholder='Themes' name='theme2' style='text-align: center;'  value='";
                        while($row2 = mysqli_fetch_assoc($result2)){
                            echo $row2['theme_title'] . ", ";
                            $preselectedThemesIds[] = $row2['theme_id'];
                            $preselectedThemesNames[] = $row2['theme_title'];
                        }
                    echo "'>";
                    // echo $preselectedThemesNames[0];
                    ?>
                <input type="hidden" id="selectedIdsInput" name="selectedIds[]" value="">
                <button type="button" class="btn btn-primary mt-2 mb-2" style="width: 30%;" data-toggle="modal"
                    data-target="#themelist">Choose Themes</button>
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
                                    <button type="button" id="choose-theme-btn" onclick="setSelectedThemes()"
                                        class="btn btn-danger btn-small" data-dismiss="modal" aria-hidden="true">Choose
                                        Theme</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <Br>
            <hr>
            <div style="text-align: center;">
                <!--uploadfile-->
                <div class="fileuploader">
                    <!-- <input type="hidden" value="<?php echo $row["fileToUpload"] ?>" name="old_fileToUpload" /> -->
                    <!-- <h4 > Select image to upload:</h4>
                         <div class = "upload-btn-wrapper">
                                <button class = "btn">Choose File</button>
                                 <input type="hidden" value="<?php echo $row["fileToUpload"] ?>" name="old_fileToUpload"/>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                        </div> -->
                    <!--<input type="submit" value="submit" name="submit">-->

                    <hr>
                    <button type="submit" class="btn btn-primary" input type="submit" form="uploadsong"
                        value="Submit">UPLOAD PAGE</button>
                    <hr>
                </div>
            </div>
            <!--end of main container-->
    </form>
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


        //var abc = jQuery('input[type=hidden]').length
        //for(var i=0; i<=abc;i++){
        //var xyz =jQuery('input[type=hidden]').eq(i).val()
        //   console.log(xyz)
        //   jQuery('input[type=hidden]').eq(i).parent().find('button').text(xyz)


        ///}
        var asd = jQuery('input[name=thumb_image]').val()

        jQuery('input[name=thumb_image]').parent().parent().next().find('button').text(asd)


        jQuery('input[type=file]').change(function() {

            var text = jQuery(this).val().split('\\').pop()

            jQuery(this).parent().find('button').text(text)

        })
        if (jQuery('#youtube') != '') {
            var abc = jQuery('#youtube').val()
            zxc = abc.split('watch?v=');
            xyz = zxc.join("embed/")
            jQuery('#youtubevide').attr('src', xyz)
            jQuery('#youtubevide').show()

        }
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

    function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("myCheck");
        // Get the output text
        var text = document.getElementById("text");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }

    // let selectedThemes = [];
    // let selectedIds = [];

    // function setSelectedThemes() {
    //     var selectedCheckboxes = document.querySelectorAll('input[type="checkbox"].theme_title_load:checked');
    //     if (selectedCheckboxes.length <= 3) {
    //         selectedThemes = selectedThemes.concat(Array.from(selectedCheckboxes).map(checkbox => checkbox.value));
    //         selectedIds = selectedIds.concat(Array.from(selectedCheckboxes).map(checkbox => checkbox.id));

    //         document.getElementById('themeInput').value = selectedThemes.join(', ');
    //         document.getElementById('selectedIdsInput').value = selectedIds.join(', ');
    //     } else {
    //         alert('You can select up to three themes.');
    //     }
    // }

    const preselectedThemeIds = <?php echo json_encode($preselectedThemesIds); ?>;
    let selectedIds = preselectedThemeIds;
    let selectedThemes = [];

    // Function to update the input field with the current selected IDs
    function updateInputField() {
        document.getElementById('selectedIdsInput').value = selectedIds.join(', ');

    }

    // Function to handle checkbox interactions
    function handleCheckboxChange() {
        const selectedCheckboxes = document.querySelectorAll('input[type="checkbox"].theme_title_load:checked');

        // Check if the user is trying to select more than three themes
        if (selectedCheckboxes.length <= 3) {
            selectedIds = Array.from(selectedCheckboxes).map(checkbox => checkbox.id);
            selectedThemes = Array.from(selectedCheckboxes).map(checkbox => checkbox.value);


            document.getElementById('themeInput').value = selectedThemes.join(', ');
        } else {
            alert("You can select up to three themes.");
            this.checked = false;
        }
        updateInputField();
    }

    window.addEventListener('load', function() {
        updateInputField();
        const checkboxes = document.querySelectorAll('input[type="checkbox"].theme_title_load');

        checkboxes.forEach(checkbox => {
            // Check if the checkbox's ID is in preselectedThemeIds and mark it as checked if found
            if (preselectedThemeIds.includes(checkbox.id)) {
                checkbox.checked = true;
            }

            checkbox.addEventListener('change', handleCheckboxChange);
        });
    });
    </script>
</body>

</html>


<?php
    }
} else {
    echo "No results found.";
}

?>