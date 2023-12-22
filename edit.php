<?php
require_once("config/db.php");
require_once("php/header.php");

$id = $_GET['id'];
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo " 
    <script>
    alert(' $message ')
    location.replace('edit.php?id=" . $id . "');
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
            <!--start-->
            <form action="update.php" method="post" enctype="multipart/form-data" id="uploadsong">

                <div class="container-fluid pt-3" style="max-width: 80%;">
                    <div class="row d-none">
                        <!--search and load-->
                        <div class="col-8">
                            <h3>Song Editor</h3>
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
                                    <option value="<?php echo $row["circa"] ?>">
                                        <?php echo $row["circa"] ?>
                                    </option>
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
                                    <option value="<?php echo $row["region"] ?>">
                                        <?php echo $row["region"] ?>
                                    </option>
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

                    <div class="row">
                        <div class="col-4">
                            <h4 class="label"><label for="shortannotation">Annotations</label></h4>
                        </div>
                        <!--Annootation-->
                        <div class="col-8">
                            <h5><label for="checkbox">Instrumental</label>

                                <!-- <input type="checkbox" id="myCheck" onclick="myFunction()"> -->
                                <!-- <p id="text" style="display:none">Checkbox is CHECKED!</p> -->



                                <input type="hidden" id="checkbox" name="checkbox" value="0">
                                <input type="checkbox" name="checkbox" <?php if ($row["checkbox"] == 1) {
                                    echo "checked";
                                } ?> id="checkbox" value="1">
                                <p id="textscores" style="display:none">Checkbox is CHECKED!</p>

                                <?php $checkbox = (isset($_POST['checkbox'])) ? intval($_POST['checkbox']) : 0; // returns 0 or 1 
                                        ?>
                            </h5>
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
                                <div class="form-group  py-2">
                                    <h4>Thumbnail Image</h4>
                                    <div class="img">

                                        <?php
                                        $extension = pathinfo($row["imageThumb"], PATHINFO_EXTENSION);
                                        if ($extension == "pdf") {
                                            ?>
                                            <a href="images/<?php echo $row["imageThumb"] ?>"><img src="images/pdficon.png"
                                                    alt="PDF" style="width:64px;text-align:left;" id="thumb_preview"
                                                    class="image-set"></a>
                                            <?php
                                        } else if ($extension == "doc" || $extension == "docx") {
                                            ?>
                                                <a href="images/<?php echo $row["imageThumb"] ?>"><img src="images/word.png" alt="Word"
                                                        style="width:64px;text-align:left;" id="thumb_preview" class="image-set"></a>
                                            <?php
                                        } else {
                                            if ($row['imageThumb'] != NULL && !empty($row['imageThumb'])) {
                                                ?>
                                                    <img src="images/<?php echo $row["imageThumb"] ?>" alt="Lights"
                                                        style="width:100%;height:auto;" id="thumb_preview" class="image-set">
                                                <?php
                                            } else {
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
                                                <button id="thumbimage-upload-btn" class="btn btn-primary">Choose File</button>
                                                <input type="hidden" value="<?php echo $row["imageThumb"] ?>"
                                                    name="thumb_image" />
                                                <input type="file" class="custom-file-input" name="imagethumb" id="imagethumb">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    document.addEventListener('DOMContentLoaded', function () {
                                        // Select the file input and image preview elements
                                        const fileInput = document.getElementById('imagethumb');
                                        const thumbPreview = document.getElementById('thumb_preview');
                                        const fileButton = document.getElementById('thumbimage-upload-btn');

                                        // Store the initial text of the button
                                        const initialButtonText = fileButton.innerText;

                                        // Add an event listener for file input change
                                        fileInput.addEventListener('change', handleFileSelect);

                                        function handleFileSelect(event) {
                                            const file = event.target.files[0];

                                            // Check if a file is selected
                                            if (file) {
                                                const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                                                const fileType = file.type;

                                                // Check if the selected file is an image
                                                if (allowedTypes.includes(fileType)) {
                                                    // Display the selected image in the preview section
                                                    displayImage(file);
                                                } else {
                                                    // Display an alert if the file type is not allowed
                                                    alert('Upload image type only. Supported formats: JPEG, PNG, GIF');
                                                    // Reset the file input to clear the selected file
                                                    fileInput.value = '';
                                                    // Restore the initial text of the button after a short delay
                                                    setTimeout(() => {
                                                        fileButton.innerText = initialButtonText;
                                                    }, 100);
                                                }
                                            }
                                        }

                                        function displayImage(file) {
                                            // Create a FileReader to read the selected file
                                            const reader = new FileReader();

                                            // Set the onload event for the FileReader
                                            reader.onload = function (e) {
                                                // Display the selected image in the preview section
                                                thumbPreview.src = e.target.result;

                                                // Update the button text with the name of the uploaded image
                                                fileButton.innerText = file.name;
                                            };

                                            // Read the selected file as a data URL
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                </script>
                                <hr>
                                <div class="form-group">
                                    <h4 class="label"><label for="image">Large Image</label></h4>
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
                                            if ($row['imageFull'] != NULL && !empty($row['imageFull'])) {
                                                ?>
                                                    <img src="images/<?php echo $row["imageFull"] ?>" style="width:100%;height:auto;"
                                                        id="image_preview" class="image-set">
                                                <?php
                                            } else {
                                                echo "<img src='images/placeholder.jpg' style='width:70%;height:auto;' id='image_preview' class='image-set'>";
                                            }
                                        }

                                        ?>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-sm-10 p-2">
                                            <div class="container mt-1">
                                                <div class="form-group upload-btn-wrapper">
                                                    <button id="image-upload-btn" class="btn btn-primary">Choose File</button>
                                                    <input type="hidden" value="<?php echo $row["imageFull"] ?>"
                                                        name="old_image" />
                                                    <input class="form-control" id="image_input" type="file" name="uploadfile"
                                                        value="imgaes/<?php echo $row["imageFull"] ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    document.addEventListener('DOMContentLoaded', function () {
                                        // Select the file input and image preview elements
                                        const fileInput = document.getElementById('image_input');
                                        const imagePreview = document.getElementById('image_preview');
                                        const fileButton = document.getElementById('image-upload-btn');

                                        // Store the initial text of the button
                                        const initialButtonText = fileButton.innerText;

                                        // Add an event listener for file input change
                                        fileInput.addEventListener('change', handleFileSelect);

                                        function handleFileSelect(event) {
                                            const file = event.target.files[0];

                                            // Check if a file is selected
                                            if (file) {
                                                const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                                                const fileType = file.type;

                                                // Check if the selected file is an image
                                                if (allowedTypes.includes(fileType)) {
                                                    // Display the selected image in the preview section
                                                    displayImage(file);
                                                } else {
                                                    // Display an alert if the file type is not allowed
                                                    alert('Upload image type only. Supported formats: JPEG, PNG, GIF');
                                                    // Reset the file input to clear the selected file
                                                    fileInput.value = '';
                                                    // Restore the initial text of the button after a short delay
                                                    setTimeout(() => {
                                                        fileButton.innerText = initialButtonText;
                                                    }, 100);
                                                }
                                            }
                                        }

                                        function displayImage(file) {
                                            // Create a FileReader to read the selected file
                                            const reader = new FileReader();

                                            // Set the onload event for the FileReader
                                            reader.onload = function (e) {
                                                // Display the selected image in the preview section
                                                imagePreview.src = e.target.result;

                                                // Update the button text with the name of the uploaded image
                                                fileButton.innerText = file.name;
                                            };

                                            // Read the selected file as a data URL
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                </script>
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
                                            <embed id="embed-sheet-music"
                                                src="musicsheet/<?php echo str_replace('#', '%23', $row["sheetmusic"]) ?>"
                                                style="width: 100%; height: 700px; border-style: solid;">
                                            </embed>
                                        <?php } else if ($extension == "doc" || $extension == "docx") {
                                            echo "doc"; ?>
                                                <a href="musicsheet/<?php echo str_replace('#', '%23', $row["sheetmusic"]) ?>"><img
                                                        src="musicsheet/word.png" alt="Word"
                                                        style="width:100%; height:auto; text-align:left;" class="image-set"
                                                        id="thumb_previews"></a>
                                        <?php } else {
                                            if ($row['sheetmusic'] != NULL && !empty($row['sheetmusic'])) {
                                                echo "empty";
                                                ?>
                                                    <a href="musicsheet/<?php echo str_replace('#', '%23', $row["sheetmusic"]) ?>"><img
                                                            src="musicsheet/<?php echo str_replace('#', '%23', $row["sheetmusic"]) ?>"
                                                            alt="Image" style="width:100%;height:auto;" class="image-set"
                                                            id="thumb_previews"></a>
                                                <?php
                                            } else {
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
                                                <input type="file" class="custom-file-input" name="sheetmusic" id="sheet-thumb">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        // File input change event
                                        var sheetThumbInput = document.getElementById('sheet-thumb');
                                        var initialButtonText = sheetThumbInput.parentElement.querySelector('button').innerText;

                                        sheetThumbInput.addEventListener('change', function () {
                                            handleFileSelect(this, initialButtonText);
                                        });

                                        // Function to handle file selection
                                        function handleFileSelect(input, initialText) {
                                            var file = input.files[0];
                                            var chooseFileBtn = input.parentElement.querySelector('button'); // Select the button within the same parent element

                                            // Check if a file is selected
                                            if (file) {
                                                // Check if the selected file is a PDF
                                                if (file.type === 'application/pdf') {
                                                    // Read the selected file and update the embed element
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        document.getElementById('embed-sheet-music').src = e.target.result;
                                                    };
                                                    reader.readAsDataURL(file);
                                                } else {
                                                    // Alert the user for the wrong document type
                                                    alert('Please upload a PDF file.');
                                                    // Clear the file input after a short delay
                                                    setTimeout(function () {
                                                        input.value = '';
                                                    }, 0);
                                                    // Set the button text back to the initial text after a short delay
                                                    setTimeout(function () {
                                                        chooseFileBtn.innerText = initialText;
                                                    }, 0);
                                                }
                                            } else {
                                                // User canceled the file selection
                                                // Set the button text back to the initial text
                                                chooseFileBtn.innerText = initialText;
                                            }
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
                                    <h4 class="label"><label for="audio1">Audio 1</label></h4>
                                    <audio class="my-2" id="audio_player" controls>
                                        <source id="audio1_src" src="audio/<?php echo $row["audio1"] ?>" type="audio/mpeg">
                                    </audio>
                                    <div class="container mt-1">
                                        <div class="custom-file mb-1 upload-btn-wrapper">
                                            <button id="upload-audio1-btn" class="btn btn-primary">Choose File</button>
                                            <input type="hidden" value="<?php echo $row["audio1"] ?>" name="old_audio1" />
                                            <input type="file" id="audio1" class="custom-file-input" value="Audio1"
                                                name="audio1">
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            // Get the file input element for audio1
                                            var fileInputAudio1 = document.getElementById('audio1');
                                            // Get the upload button for audio1
                                            var uploadButtonAudio1 = document.getElementById('upload-audio1-btn');
                                            // Get the audio player for audio1
                                            var audioPlayerAudio1 = document.getElementById('audio_player');
                                            // Get the source element within the audio player for audio1
                                            var audioSourceAudio1 = audioPlayerAudio1.querySelector('#audio1_src');

                                            // Store the initial button text for audio1
                                            var initialButtonTextAudio1 = uploadButtonAudio1.innerHTML;

                                            // Add event listener for file input change for audio1
                                            fileInputAudio1.addEventListener('change', function () {
                                                // Get the selected file for audio1
                                                var selectedFileAudio1 = fileInputAudio1.files[0];

                                                // Check if a file is selected for audio1
                                                if (selectedFileAudio1) {
                                                    // Check if the selected file type is audio/mpeg for audio1
                                                    if (selectedFileAudio1.type === 'audio/mpeg') {
                                                        // Display the file name on the button for audio1
                                                        uploadButtonAudio1.innerHTML = selectedFileAudio1.name;

                                                        // Set the source of the audio player to the selected file for audio1
                                                        audioSourceAudio1.src = URL.createObjectURL(selectedFileAudio1);
                                                        audioPlayerAudio1.load(); // Load the new source for audio1

                                                        // Remove any previous error message for audio1
                                                        // alert('File uploaded successfully!'); // Commented out the alert for audio1
                                                    } else {
                                                        // Display an alert for incorrect file type for audio1
                                                        alert('Upload Audio File Type');

                                                        // Create a new file input element for audio1
                                                        var newFileInputAudio1 = document.createElement('input');
                                                        newFileInputAudio1.type = 'file';
                                                        newFileInputAudio1.id = 'audio1';
                                                        newFileInputAudio1.className = 'custom-file-input';

                                                        // Replace the existing file input with the new one for audio1
                                                        fileInputAudio1.parentNode.replaceChild(newFileInputAudio1, fileInputAudio1);

                                                        // Reset the button text to its initial state for audio1
                                                        uploadButtonAudio1.innerHTML = initialButtonTextAudio1;
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                    <br>
                                    <h4 class="label"><label for="audio2">Audio2</label></h4>
                                    <audio class="my-2" id="audioplayer" controls>
                                        <source id="audio2_source" src="audio/<?php echo $row["audio2"] ?>" type="audio/mpeg">
                                    </audio>
                                    <div class="col-sm-10 p-2">
                                        <div class="container mt-1">
                                            <div class="custom-file mb-1 upload-btn-wrapper">
                                                <button id="audio2-upload-btn" class="btn btn-primary">Choose File</button>
                                                <input type="hidden" value="<?php echo $row["audio2"] ?>" name="old_audio2" />
                                                <input type="file" class="custom-file-input" name="audio2" id="audio2">
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            // Get the file input element for audio2
                                            var fileInputAudio2 = document.getElementById('audio2');
                                            // Get the upload button for audio2
                                            var uploadButtonAudio2 = document.getElementById('audio2-upload-btn');
                                            // Get the audio player for audio2
                                            var audioPlayerAudio2 = document.getElementById('audioplayer');
                                            // Get the source element within the audio player for audio2
                                            var audioSourceAudio2 = document.getElementById('audio2_source');

                                            // Store the initial button text for audio2
                                            var initialButtonTextAudio2 = uploadButtonAudio2.innerHTML;

                                            // Add event listener for file input change for audio2
                                            fileInputAudio2.addEventListener('change', function () {
                                                // Get the selected file for audio2
                                                var selectedFileAudio2 = fileInputAudio2.files[0];

                                                // Check if a file is selected for audio2
                                                if (selectedFileAudio2) {
                                                    // Check if the selected file type is audio/mpeg for audio2
                                                    if (selectedFileAudio2.type === 'audio/mpeg') {
                                                        // Display the file name on the button for audio2
                                                        uploadButtonAudio2.innerHTML = selectedFileAudio2.name;

                                                        // Set the source of the audio player to the selected file for audio2
                                                        audioSourceAudio2.src = URL.createObjectURL(selectedFileAudio2);
                                                        audioPlayerAudio2.load(); // Load the new source for audio2

                                                        // Remove any previous error message for audio2
                                                        // alert('File uploaded successfully!'); // Commented out the alert for audio2
                                                    } else {
                                                        // Display an alert for incorrect file type for audio2
                                                        alert('Upload Audio File Type');

                                                        // Create a new file input element for audio2
                                                        var newFileInputAudio2 = document.createElement('input');
                                                        newFileInputAudio2.type = 'file';
                                                        newFileInputAudio2.id = 'audio2';
                                                        newFileInputAudio2.className = 'custom-file-input';

                                                        // Replace the existing file input with the new one for audio2
                                                        fileInputAudio2.parentNode.replaceChild(newFileInputAudio2, fileInputAudio2);

                                                        // Reset the button text to its initial state for audio2
                                                        uploadButtonAudio2.innerHTML = initialButtonTextAudio2;
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                    <!--Video-->
                                    <hr>
                                    <h4 class="label pb-2"> <label for="imageannotation">Video Annotation</label></h4>
                                    <textarea class="form-control" rows="3" name="videoanno"
                                        placeholder="video info"><?php echo $row["videoanno"] ?></textarea>
                                    <br>
                                    <h4 class="label pb-2"> <label for="imageannotation">Video Annotation</label></h4>
                                    <textarea class="form-control" rows="3" name="videoanno"
                                        placeholder="video info"><?php echo $row["videoanno"] ?></textarea>
                                    <br>
                                    <h4 class="label"> <label for="video">Video1</label></h4>
                                    <video width="550" height="auto" controls id="videoplayer">
                                        <?php
                                        if (!empty($row["video1"])) {
                                            echo '<source src="video/' . $row["video1"] . '" type="video/mp4">';
                                        }
                                        ?>
                                    </video>

                                    <br>
                                    <div class="container mt-1">
                                        <div class="custom-file mb-1 upload-btn-wrapper">
                                            <button id="upload-video1-btn" type="button" class="btn btn-primary">Choose
                                                File</button>
                                            <input type="hidden" value="<?php echo $row["video1"] ?>" name="old_video1" />
                                            <input type="file" class="custom-file-input" name="video1" id="video1"
                                                onchange="checkFileSize(event)" />
                                        </div>
                                        <script>
                                            function checkFileSize(input) {
                                                const file = input.files[0];
                                                const videoPlayer = document.getElementById('videoplayer');
                                                const button = input.previousElementSibling;

                                                const validVideoTypes = ['video/mp4', 'video/webm', 'video/ogg'];

                                                if (file) {
                                                    console.log('File type:', file.type); // Log the file type

                                                    if (validVideoTypes.includes(file.type) && file.size <= 40000000) {
                                                        const objectURL = URL.createObjectURL(file);

                                                        videoPlayer.src = objectURL;

                                                        // Remove the poster attribute only if src was not set before
                                                        if (!videoPlayer.src) {
                                                            videoPlayer.poster = '';
                                                        }
                                                    } else {
                                                        // Error handling for invalid file type or size
                                                        if (!validVideoTypes.includes(file.type)) {
                                                            alert('Please upload a valid video file.');
                                                        } else {
                                                            alert('Please choose a valid video file under 40MB.');
                                                        }

                                                        input.value = ''; // Clear the input

                                                        // Remove video source only if src was not set before
                                                        if (!videoPlayer.src) {
                                                            videoPlayer.removeAttribute('src');
                                                            // Set the poster if there is no video source
                                                            videoPlayer.poster = 'images/upload_video.jpg';
                                                            // Reset button text
                                                            setTimeout(function () {
                                                                button.innerText = 'Choose File';
                                                            }, 50);
                                                        }
                                                    }
                                                }
                                            }

                                            document.getElementById('video1').addEventListener('change', function () {
                                                checkFileSize(this);
                                            });
                                        </script>
                                        <br>
                                        <h4 class="label"> <label for="video">YouTube Link</label></h4>
                                        <div class="row">
                                            <div class="container mt-1">
                                                <iframe id="youtubevideo" src="" width="560" height="315"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>

                                                <div class="custom-file mb-1">
                                                    <input type="text" class="form-control" id="youtube" maxlength="500"
                                                        placeholder="Link" name="video2" value='<?php echo $row['video2']; ?>'>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                // YouTube input field change event
                                                document.getElementById('youtube').addEventListener('input', function () {
                                                    displayYouTubeVideo();
                                                });
                                            });

                                            function displayYouTubeVideo() {
                                                // Get the YouTube link from the input field
                                                var youtubeInput = document.getElementById('youtube');
                                                var youtubeLink = youtubeInput.value;

                                                // Extract the video ID from the YouTube link
                                                var videoId = getYoutubeVideoId(youtubeLink);

                                                // Set the src attribute of the iframe with the YouTube video link
                                                var iframe = document.getElementById('youtubevideo');
                                                iframe.src = 'https://www.youtube.com/embed/' + videoId;

                                                // Display the iframe
                                                iframe.style.display = 'block';

                                                // Update the input value with the generated YouTube link
                                                youtubeInput.value = 'https://www.youtube.com/embed/' + videoId;
                                            }

                                            // Function to extract the video ID from a YouTube link
                                            function getYoutubeVideoId(link) {
                                                var regExp = /^.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=|\?v=)([^#\&\?]*).*/;
                                                var match = link.match(regExp);
                                                return (match && match[1].length === 11) ? match[1] : '';
                                            }
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
                            <p class="card-title">clicking choose theme brings up list of themes<br>Each song can have up to
                                three
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
                            while ($row2 = mysqli_fetch_assoc($result2)) {
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
                                                        if ($result) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "
                                                        <tr>
                                                            <td style='padding:0;'>
                                                                <label class='row-label' style='margin:5px;'>
                                                                    
                                                                    <input type='checkbox' class='theme_title_load' name='selectedThemes[]' id='" . $row['id'] . "' value='" . $row['theme_title'] . "'>
                                                                    " . $row['theme_title'] . "
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
                                                    class="btn btn-danger btn-small" data-dismiss="modal"
                                                    aria-hidden="true">Choose
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

                window.addEventListener('load', function () {
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