<?php
require_once("config/db.php");
require_once("php/header.php");
?>

<style>
    .table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<!-- <div id="main-form-alert"></div> -->
<!--start-->
<div class="wrapper" style="padding: 0% 0% 0% 0%;">
    <form action="thememanager.php" method="post" enctype="multipart/form-data" id="uploadtheme">
        <div class="container-fluid pt-3" style="max-width: 90%;">
            <!--title and edit modal-->
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Theme Title" id="themetitle" name="title" data-toggle="popover" data-trigger="manual" data-placement="bottom" data-content="Please add Theme Title." required>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6" style="text-align: right;">
                    <!--Theme is placed on the index page in the featured theme section-->
                    <input type="checkbox" class="btn-check" id="btncheck1" name="feature" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck1">Featured</label>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6" style="text-align: left;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themelist">
                        Edit Theme
                    </button>

                    <!-- The Edit Modal -->
                    <div class="modal fade" id="themelist">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Theme</h4>
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
                                                                    <label class='row-label' for='" . $row['id'] . "' style='margin:5px;'>
                                                                        <input type='radio' name='themeLoadRadio' class='theme_title_load' id='" . $row['id'] . "'>
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
                                    <button type="button" id="load-theme-btn" class="btn btn-danger btn-small">Load
                                        Theme</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="border-color: black; padding: 0% 0%;">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-6" style="text-align: left;">
                    <textarea class="form-control" rows="5" name="annotation" id="themeannotation" placeholder="Theme Info" data-toggle="popover" data-trigger="manual" data-placement="bottom" data-content="Please add Theme Title." required></textarea>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-6">
                    <div class="container-fluid p-3" style="border-style: solid; border-color: blue; border-width: 1px; text-align: center;">
                        <img id="themeImage" name="image" src="" alt="Theme Image" style="max-width: 100%; max-height: 200px;" required>
                        <p type="hidden" id="imageName">Image Name: </p>
                    </div>
                    <br>

                    <div class="form-group upload-btn-wrapper" style="text-align: right;">
                        <input type="file" class="form-control" id="imageInput" name="file" value="" onchange="displaySelectedImage()">
                        <button id="uploadButton" type="button" class="btn btn-primary btn-sm">Upload Images</button>
                    </div>
                    <div id="uploadStatus"></div>
                </div>
            </div>
            <hr style="color: black; width: 90%; border-color:black; padding: 0%;">
            <script type="text/javascript">
                var imageName = "";

                function displaySelectedImage() {
                    var input = document.getElementById("imageInput");
                    var image = document.getElementById("themeImage");
                    var imageName = document.getElementById(
                        "imageName"); // Assuming you have an element to display the name

                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            image.src = e.target.result;
                            imageName.innerText = input.files[0].name; // Display the image name
                        };

                        reader.onerror = function(e) {
                            console.error("Error reading the file: " + e.target.error);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            <hr>
            <div class="container-fluid px-0">
                <form class="form-inline" method="GET" action="thememanager.php">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 p-1" style="text-align: right;">
                            <input class="form-control ml-sm-2" type="text" id="search_query" name="search_query" placeholder="Start typing to find a song to add to the theme list">
                            <h5 style="text-align: center; padding: 2% 1%;">Results</h5>
                            <table class="table mainTable" style="border: solid;">
                                <thead>
                                </thead>
                                <tbody id="search_results">
                                </tbody>
                            </table>
                            <form action="thememanager.php" method="GET">
                                <div style="text-align: center;">
                                    <button type="button" name="checkedSongs" class="btn btn-primary btn-sm transferRows" id="add_songs_btn">Add checked
                                        songs to theme</button>
                                </div>
                            </form>
                        </div>
                </form>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="container-fluid" style="padding: 3% 0%; text-align:left;">
                        <div class="container-fluid" style="text-align: center;">
                            <h5 class="label"> <label for="choosesong">Theme Songs</label></h5>
                            <p>Each checked song will appear in the theme<br>
                                unclick check box and upload to remove song</p>
                            <table class="table secondTable" style="text-align: left;">
                                <thead>
                                </thead>
                                <tbody id="songs_results">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="text-align: center;"><button id="theme-upload-btn" type="button" class="btn btn-primary btn-sm" data-toggle="upload">
                            Upload Theme
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <hr><br>
    </form>
</div>
<!--end of wrapper-->
<script type="text/javascript">

</script>


<script>
    $(document).ready(function() {
        var transferredIDs = [];
        $('#search_query').on('keyup', function() {
            var searchQuery = $(this).val();



            if (searchQuery) {
                $.ajax({
                    method: 'POST',
                    url: 'songSearch1.php',
                    data: {
                        search_query: searchQuery,
                        transferred_ids: transferredIDs,
                    },
                    success: function(data) {
                        $('#search_results').html(data);
                    },
                    error: function() {
                        $('#search_results').html(
                            '<tr><td colspan="2">An error occurred.</td></tr>');
                    }
                });
            } else {
                $('#search_results').html('');
            }
        });





        $(function() {
            $(document).on("click", ".transferRows", function(e) {
                e.preventDefault();
                var selectedRows = $(".mainTable input.song_checkbox:checked").parents("tr");
                var clonedRows = selectedRows.clone();
                $(".secondTable").append(clonedRows);
                selectedRows.find("input.song_checkbox").map(function() {
                    transferredIDs.push($(this).attr("id"));
                }).get();

                console.log(transferredIDs);
                selectedRows.remove();
            });
        });




        $(document).on("click", "#theme-upload-btn", function(e) {
            if (transferredIDs.length > 0) {
                // imgname = imageName.textContent;
                let formdata = new FormData;
                // Theme Title
                if ($('#themetitle').val()) {
                    formdata.append("themetitle", $('#themetitle').val());
                } else {
                    $('#themetitle').popover('show');
                    $('#themetitle').addClass('border-danger');
                    return;

                }

                // Theme Annotation
                if ($('#themeannotation').val()) {
                    formdata.append("themeannotation", $('#themeannotation').val());
                } else {
                    $('#themeannotation').popover('show');
                    $('#themeannotation').addClass('border-danger');
                    return;
                }

                var imageInput = document.getElementById("imageInput");

                if (imageInput.files.length > 0) {
                    formdata.append("filename", imageInput.files[0].name);
                    formdata.append("file", imageInput.files[0]);
                } else {
                    e.preventDefault();
                    alert("Please upload Image")
                    return;
                }

                let selectedIDs = [];
                $('.song_checkbox').each(function() {
                    if ($(this).prop('checked')) {
                        selectedIDs.push($(this).val());
                    }
                });
                formdata.append("transferIds[]", selectedIDs);
                let featureStatus = $('#btncheck1').prop('checked') ? 'on' : 'off';
                formdata.append("feature", featureStatus);
                if (selectedIDs.length > 0) {
                    $.ajax({
                        url: 'savaTheme.php',
                        type: 'POST',
                        data: formdata,
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        success: function(output) {
                            alert("Theme Added Successfully");
                            location.reload(true);
                        },
                    });
                } else {
                    e.preventDefault();
                    alert("Please select at least one song");
                }

            } else {
                e.preventDefault();
                alert("Please Insert Songs into Theme Songs Section");
            }

        });

        // modal load theme button AJAX Call
        // $(document).ready(function() {
        $(document).on("click", "#load-theme-btn", function(e) {
            var selectedTheme = $(".themeLoadTable input.theme_title_load:checked").parents("tr");
            var firstID = selectedTheme.find("input.theme_title_load").first().attr("id");
            window.location.replace("editTheme.php?id=" + firstID);
        });
        // });

    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>