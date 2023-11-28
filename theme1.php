<?php
require_once("config/db.php");
require_once("php/header2.php");
if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $sql = "SELECT * FROM `themes` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Theme Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ontrad.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .vertical-center {
                margin: 0;
                position: absolute;
                top: 50%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }

            .tfont {
                font-size: 1.75vw;
            }

            .rfont {
                font-size: 1vw;
            }

            .whitelogo {
                width: 112px;
                height: auto;
            }

            .cardtitle {
                font-size: medium;
            }

            .littlestfont {
                font-size: x-small;
            }
        </style>

    <body>

        <!--Data-->
        <!--end of data-->

        <div class="introbox pt-4 ontragreen ontradbg1">
            <div style="text-align: center;">
                <h3>
                    <?php echo $row['theme_title']; ?>
                </h3>
                <br>
                <div class="row" style="text-align: center; padding-left: 5%; padding-right: 5%;">
                    <!-- <div class="col-md-6"> <img src="homeimage/on_0004_fiddle.jpg" style="width: 80%;"></div> -->
                    <?php
                    $path = 'themeimage_uploads/';
                    $completePath = $path . $row['theme_image'];
                    echo ($row['theme_image'] != NULL || !empty($row['theme_image'])) && file_exists($completePath) ?
                        "<div class='col-md-6'> <img src='themeimage_uploads/" . $row['theme_image'] . "' style='width: 80%;'></div>" : " <div class='col-md-6'></div>";
                    ?>
                    <div class="col-md-6">
                        <div class="textarea p-2" style="text-align: left">
                            <p class="card-text">
                                <?php echo $row['theme_info']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!--SCROLLING FIELD OF SONGS A t0 Z-->
            <div class="ontragreen pb-5 ">
                <div style="text-align: center;">
                    <h4>Songs Related to
                        <?php echo $row['theme_title']; ?>
                    </h4>
                </div>
                <div class="album">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <?php
                            $sql = "SELECT * FROM newtable LEFT JOIN themes_songs ON newtable.ID = themes_songs.song_id WHERE theme_id = '$id'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                <div class='col'><!-- songcard -->
                <div class='card shadow-sm' style='min-width: 348px; height: 600px !important;'>
                ";

                                    echo $row['imageThumb'] != NULL || !empty($row['imageThumb'])
                                        ? "<a href='song1.php?id=" . base64_encode($row['ID']) . "'><img class='theme-img' src='images/" . $row['imageThumb'] . "' style='max-height: 200px; width: 100%;' alt='Image Not found'></a>"
                                        : "<svg class='bd-placeholder-img card-img-top' width='100%' height='200px'
                    xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail'
                    preserveAspectRatio='xMidYMid slice' focusable='false'>
                    <title>Placeholder</title>
                    <rect width='100%' height='100%' fill='#55595c' /><text x='50%' y='50%'
                        fill='#eceeef' dy='.3em'>ONTRAD IMAGE</text>
                </svg>";

                                    echo "
                  <div class='card-body'> 
                    <h5> " . $row['Stitle'] . "</h5>
                    <hr style='border-color:black; padding: 0% 5%;'>
                    <p class='card-text'>" . substr($row['shortanno'], 0, 50) . "...</p>
                  </div>

                  <div class='card-footer' style='background-color:white;'>
                      <div class='btn-group mt-auto' >
                        <a href='song1.php?id=" . base64_encode($row['ID']) . "'  class='btn btn-sm btn-outline-success'>View Page</a>
                    ";
                                    if ($row['audio1'] != NULL && !empty($row['audio1'])) {
                                        echo "<button type='button' data-song-name='" . $row['audio1'] . "' id='playSong' onclick='playAudio(event)' class='btn btn-sm btn-outline-secondary'>Play Song</button>";
                                    } elseif ($row['audio2'] != NULL && !empty($row['audio2'])) {
                                        echo "<button type='button' data-song-name='" . $row['audio2'] . "' id='playSong' onclick='playAudio(event)' class='btn btn-sm btn-outline-secondary'>Play Song</button>";
                                    } else {
                                        echo " ";
                                    }
                                    echo "          
                     </div>
                  </div>
                </div>
              </div><!-- End of songcard -->
                ";
                                }
                            } else {
                                echo "<h6 style='margin-left: 17rem;'>No Songs found in this Theme</h6>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once("php/footer.php");
        ?>

        <!--end of scrolling songlist -->
        <!--end of media-->
        <!-- FOOTER (Contact Section) -->
        <!-- Container (Contact Section) -->

        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function () {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }

            // playing Song
            // let currentlyPlaying = null;
            // let currentSongName = null;
            // function playAudio(element) {
            //     let mainElement = element.target;
            //     let song_name = mainElement.dataset.songName;
            //     // mainElement.textContent = "Play Song";
            //     if (currentlyPlaying) {
            //         if (currentSongName === song_name) {
            //             if (currentlyPlaying.paused) {
            //                 currentlyPlaying.play(); 
            //                 mainElement.textContent = "Pause Song";
            //             } else {
            //                 currentlyPlaying.pause();
            //                 mainElement.textContent = "Play Song";
            //             }
            //             return;
            //         } else {
            //             if(currentlyPlaying){
            //                 mainElement.textContent = "Play Song";
            //                 currentlyPlaying.pause();
            //             }
            //         }
            //     }

            //     let newAudio = new Audio("audio/" + song_name);
            //     newAudio.play();

            //     currentlyPlaying = newAudio; 
            //     currentSongName = song_name;
            //     mainElement.textContent = "Pause Song";
            // }



            let audioElements = {};

            function playAudio(element) {
                let mainElement = element.target;
                let song_name = mainElement.dataset.songName;

                if (!audioElements[song_name]) {
                    audioElements[song_name] = new Audio("audio/" + song_name);
                }

                if (audioElements[song_name].paused) {
                    audioElements[song_name].play();
                    mainElement.textContent = "Pause Song";
                } else {
                    audioElements[song_name].pause();
                    mainElement.textContent = "Play Song";
                }
            }
        </script>


    </body>

    </html>

    <?php
} else {
    echo "No Theme Found";
}
?>