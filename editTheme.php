<?php
require_once("config/db.php");

// uploading the file
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "
    SELECT t1.*,t2.ID, t2.Stitle, t2.theme_id, t2.song_id
    FROM themes t1
    LEFT JOIN (
        SELECT ID, Stitle, theme_id, song_id
        FROM newtable
        LEFT JOIN themes_songs ON newtable.ID = themes_songs.song_id
        WHERE theme_id = '$id'
    ) t2 ON t1.id = '$id'
    WHERE t1.id = '$id'
    
    ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $themeTitle = $row['theme_title'];
            $themeDescription = $row['theme_info'];
            $themeImage = $row['theme_image'];
            $status = $row['status'];
            $songInfo = array(
                "ID"=>$row['ID'],
                "Stitle"=>$row['Stitle'],
            );
            $songsArray[] = $songInfo;
        }
    }else{
        echo "No data found";
    }
    
}



require_once("php/header.php");
?>



    <div class="wrapper" style="padding: 0% 5% 0% 5%;">
  
        <form action="updateTheme.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" id="uploadtheme">
            <div class="container-fluid pt-3" style="max-width: 90%;">
                <!--title and edit modal-->
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-12">
                        <input type="text" class="form-control " value="<?php echo $themeTitle; ?>" id="themetitle"
                                name="title" data-toggle="popover" data-trigger="manual" data-placement="bottom" data-content="Please add Theme Title." required>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6" style="text-align: right;">
                        <!--Theme is placed on the index page in the featured theme section-->
                        <input type="checkbox" class="btn-check" id="btncheck1" name="feature">
                        <label class="btn btn-outline-primary" for="btncheck1">Featured</label>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-lg-6 col-md-5 col-sm-6" style="text-align: left;">
                        <textarea class="form-control" rows="5" name="annotation" id="themeannotation" data-toggle="popover" data-trigger="manual" data-placement="bottom" data-content="Please add Theme Title."
                        required><?php echo $themeDescription ?></textarea>
                    </div>
                    <div class="col-lg-6 col-md-7 col-sm-6">
                        <div class="container-fluid p-3"
                            style="border-style: solid; border-color: blue; border-width: 1px; text-align: center;">
                            <img id="themeImage" name="image" src="themeimage_uploads/<?php echo $themeImage;?>"
                                alt="Theme Image" style="max-width: 100%; max-height: auto;" required>
                            <p type="hidden" id="imageName">Image Name: <?php echo $themeImage;?></p>
                        </div>
                        <br>

                        <div class="form-group upload-btn-wrapper" style="text-align: right;">
                            <input class="form-control" id="imageInput" type="file" name="file" value=""
                                onchange="displaySelectedImage()">
                            <button id="uploadButton" type="button" class="btn btn-primary btn-sm">Upload New
                                Image</button>
                        </div>
                    </div>
                </div>
                <hr style="color: blue; width: 90%;">
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
                <div class="container-fluid px-5">
                    <form class="form-inline" method="GET" action="thememanager.php">
                        <div class="row">
                            <div class="col-sm-12 col-md-8 col-lg-9 p-2" style="text-align: right;">
                                <input class="form-control ml-sm-2" type="text" id="search_query" name="search_query"
                                    placeholder="Find a song to add to the theme list">
                            </div>
                            <!-- <div class="col-sm-12 col-md-4 col-lg-3 p-2" style="text-align: center;">
                                <button class="btn btn-success" type="button">Search</button>
                            </div> -->
                        </div>
                    </form>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="container-fluid" style="padding: 5%;">
                                <h5 style="text-align: center;">Results</h5>
                                <table class="table mainTable">
                                    <thead>
                                    </thead>
                                    <tbody id="search_results">
                                    </tbody>
                                </table>
                                <form action="thememanager.php" method="GET">
                                    <div style="text-align: center;">
                                        <button type="button" name="checkedSongs"
                                            class="btn btn-primary btn-sm transferRows" id="add_songs_btn">Add checked
                                            songs to theme</button>
                                    </div>
                                </form>

                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="container-fluid" style="padding: 5%; text-align:left;">
                                <div class="container-fluid" style="text-align: center;">
                                    <h5 class="label"> <label for="choosesong">Theme Songs</label></h5>
                                    <p>Each checked song will appear in the theme<br>
                                        unclick check box and upload to remove song</p>
                                    <table class="table secondTable" style="text-align: left;">
                                        <thead>
                                        </thead>
                                        <tbody id="songs_results">
                                            <?php
                                                foreach($songsArray as $song){
                                                    $song_id = $song['ID'];
                                                    $songTitle = $song['Stitle'];

                                                    echo "
                                                    <tr>
                                                        <td style='padding:0;'>
                                                            <label class='row-label song-label' for='".$song_id."' data-song-id='".$song_id."' style='margin:5px;'>
                                                                <input type='checkbox' name='songsForSelection'  class='song_checkbox' id='".$song_id."' value='".$song_id."' checked>
                                                                ".$songTitle."
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    ";

                                                }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div style="display:flex; justify-content:center; align-items:center;">
                                <div id="loader" style="display: none;">
                                    <img src="loader/loader.gif" alt="Loading..." />
                                </div>
                                <button id="theme-update-btn" type="button" class="btn btn-primary btn-sm" data-toggle="upload">Update Theme</button>
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
        var status = document.getElementById("btncheck1");
        var phpStatus = "<?php echo $status; ?>";
        var label = document.querySelector('label[for="btncheck1"]');

        if (phpStatus === 'UnFeatured') {
            status.checked = false;
            label.classList.remove('active');
        } else {
            status.checked = true;
            label.classList.add('active');
        }

        $(document).on("click", "#btncheck1", function() {
            let element = this;
            let label = element.classList.contains("btn-check") ? element.nextElementSibling : element;
            label.classList.toggle("active");
        });
    });
    </script>

<?php $dbSongsArray = json_encode($songsArray) ?>
    <script>
    $(document).ready(function() {
        var transferredIDs = [];
    // getting the second Table Ids 
        let songLabels = document.querySelectorAll(".song-label");
        let secondTableIds = [];
        songLabels.forEach(song => {
            secondTableIds.push(song.dataset.songId);
        });
        // console.log(secondTableIds);

        $('#search_query').on('keyup', function() {
            var searchQuery = $(this).val();
            
           
            if (searchQuery){
                $.ajax({
                    method: 'POST',
                    url: 'songSearch.php',
                    data: {
                        search_query: searchQuery,
                        dbArrayIds: secondTableIds,
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

                // console.log(transferredIDs);
                selectedRows.remove();
            });

        });
    });

    $(document).on("click", "#theme-update-btn", function(e) {
        let selectedIDs = [];
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
        if($('#themeannotation').val()){
            formdata.append("themeannotation", $('#themeannotation').val());
        }else{
            $('#themeannotation').popover('show');
            $('#themeannotation').addClass('border-danger');
            return;
        }

        var imageInput = document.getElementById("imageInput");
        if (imageInput.files.length > 0) {
            formdata.append("filename", imageInput.files[0].name);
            formdata.append("file", imageInput.files[0]);
        } else {
            formdata.append("filename", "<?php echo $themeImage;?>");
        }

        $('.song_checkbox').each(function() {
            if ($(this).prop('checked')) {
                selectedIDs.push($(this).val());
            }
        });
        formdata.append("transferIds[]", selectedIDs);
        let featureStatus = $('#btncheck1').prop('checked') ? 'on' : 'off';
        formdata.append("feature", featureStatus);

        if(selectedIDs.length>0){
        $.ajax({
            url: 'updateTheme.php?id=<?php echo $id; ?>',
            type: 'POST',
            data: formdata,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#loader').show();
            },
            success: function(output) {
                alert("Theme Updated Successfully");
                location.reload(true);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
            },
            complete: function() {
                // Hide the loader when the request is complete
                $('#loader').hide();
            }
        });
        }else{
            alert("Please select at least one Song");
            e.preventDefault();
        }
       

    });

    // Checkbox checking
    // $(document).ready(function() {
    //     $("table").on("click", ".row-label", function() {
    //         var checkbox = $(this).find("input[type='checkbox']");
    //         checkbox.prop("checked", !checkbox.prop("checked"));
    //     });
    // });

    </script>

</body>

</html>