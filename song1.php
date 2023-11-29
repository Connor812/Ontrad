<?php
require_once("config/db.php");
require_once("php/header2.php");

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $sql = "SELECT * FROM `newtable` WHERE `ID` = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Song</title>
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
                font-size: 1.25vw;
            }

            .whitelogo {
                width: 112px;
                height: auto;
            }

            .wrapper {
                width: 100%;
                padding: 2% 5% 2% 5%;
            }

            .wrapper2 {
                width: 100%;
                padding: 2% 5% 2% 5%;
                margin: 0%;
                background-color: whitesmoke;
                border-radius: 10px;
                border-color: white;
                border-style: solid;
                border-width: 2px;
                box-shadow: 3px;
            }
        </style>

    <body>
        <!--Data-->
        <div class="wrapper ontradgreenlite">
            <div class="wrapper2">
                <!--title-->
                <div class="container-fluid px-0" style="text-align: center;">
                    <h2 id="stitle">
                        <?php echo $row['Stitle']; ?>
                    </h2>
                    <!--composer-->
                    <h5 id="songcomposer">
                        <?php echo $row['songcomposer']; ?>
                    </h5>
                </div>
                <hr style="border-color: black">

                <div class="row container-fluid m-0 p-0">
                    <!--composer-->
                    <!--circa and region-->
                    <div class="col-sm-7 m-0 p-0">
                        <?php
                        if ($row['circa'] != NULL && !empty($row['circa']) || $row['region'] != NULL && !empty($row['region'])) {
                            echo '
                                        <div class="row">
                                            <div class="col-5 p-0 m-0">
                                                <div class="container-fluid" id="circa">
                                                    <h5>Circa- ' . $row["circa"] . '</h5>
                                              </div>
                                            </div>
                                            <div class="col-7 p-0 m-0">
                                                <div class="container-fluid" style="text-align":right;" id="region">
                                                    <h5>Region- ' . $row["region"] . '</5>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                        }
                        ?>
                        <div class="lead px-3">
                            <?php echo (!empty($row['shortanno']) ? $row['shortanno'] : ''); ?>
                        </div>
                    </div>
                    <!--right image-->
                    <div class="col-sm-5  m-0 p-0" style="text-align: center;">
                        <?php
                        if ($row['imageThumb'] != NULL && !empty($row['imageThumb'])) {
                            echo "
                                <div class='container-fluid m-0 p-0' style=' text-align: center;'><img src='images/" . $row['imageThumb'] . "' style='width: 100%; max-width: 400px; border-radius: 10px;'>
                                ";
                        }
                        ?>
                    </div>
                </div>
                <!-- Long anno and Full image-->
                <hr>
                <div class="row p-0">
                    <div class="col-sm-6 p-0" style="text-align:center;">
                        <?php if (!empty($row['imageFull'])) { ?>
                            <div class="container-fluid">
                                <img src="images/<?php echo $row['imageFull']; ?>"
                                    style="width: 100%; height: auto; border-radius: 10px;" alt="Full Image">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-sm-6 p-0 m-0">
                        <div class="container-fluid p-0 m-0">
                            <?php
                            if ($row['longanno'] != NULL && !empty($row['longanno'])) {
                                echo "
                                    <!--long annotation-->
                                    <div class='pt-3'>
                                   <p> " . $row['longanno'] . "</p>
                                    </div>
                                    ";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <hr style="border-color: black; margin-top: 2%;">
                <!-- end of Full Image row with full width  -->
                <!--Music-->
                <?php if (
                    ($row['audio1'] != NULL && !empty($row['audio1'])) ||
                    ($row['audio2'] != NULL && !empty($row['audio2'])) ||
                    ($row['video2'] != NULL && !empty($row['video2'])) ||
                    ($row['video1'] != NULL && !empty($row['video1'])) ||
                    ($row['sheetmusic'] != NULL && !empty($row['sheetmusic']))
                ) { ?>
                    <div class="row m-0">
                        <div class="col-sm-6 m-0">
                            <!--Audio-->
                            <div>
                                <?php
                                if ($row['audio1'] != NULL && !empty($row['audio1'])) {
                                    echo "
                                        <h4>Recording</h4>
                                        <p>" . $row['audioanno'] . "</p>
                                        <div style='text-align:center; padding: 0% 0%'>
                                         <audio style='width: 100%;' controls>
                                            <source src='audio/" . $row['audio1'] . "' type='audio/mpeg' id='audio1'>
                                            Your browser does not support the audio element.
                                        </audio>
                                        </div>
                                        ";
                                }
                                ?>
                            </div>

                            <!--This audio and text will not show if empty-->
                            <div style="text-align:center; padding: 2% 0%">
                                <?php
                                if ($row['audio2'] != NULL && !empty($row['audio2'])) {
                                    echo "
                                    <div style='text-align:center; padding: 0% 0%'>
                                    <audio style='width: 100%;' controls>
                                        <source src='audio/" . $row['audio2'] . "' type='audio/mpeg' id='audio1'>
                                        Your browser does not support the audio element.
                                    </audio>
                                    </div>
                                    ";
                                }
                                ?>
                            </div>
                            <!--Video-->
                            <?php if (!empty($row['video1'])) {
                                echo '<h2>Video</h2>';
                            } ?>
                            <div style="width: 530px; height: auto;">
                                <!-- start of video1 row  -->
                                <?php if ($row['video1'] != NULL && !empty($row['video1'])) { ?>
                                    <div class="embed-responsive embed-responsive-16by9 p-0 m-0">
                                        <video width="400px" height="400px" controls="controls">
                                            <source src="video/<?php echo $row['video1']; ?>" type='video/mp4' />
                                        </video>
                                    </div>
                                    <?php
                                    if (!empty($row['videoanno'])) {
                                        ?>
                                        <div style="width: 100%; word-wrap: break-word;">
                                                <?php echo $row['videoanno']; ?>
                                        </div>
                                        <?php
                                    }

                                } ?>
                            </div>

                        </div>
                        <!--sheetmusic-->
                        <div class="col-sm-6" id="sheetmusic">
                            <!--sheetanno-->
                            <?php
                            if ($row['sheetanno'] != NULL && !empty($row['sheetanno'])) {
                                echo "<h4>Score</h4>
                                <p>" . $row['sheetanno'] . "</p>";
                            }
                            ?>
                            <div class="container-fluid p-0">
                                <?php
                                if ($row['sheetmusic'] != NULL && !empty($row['sheetmusic'])) {
                                    echo "                
                            <div class='gallery' style='width: 100%; height: 500px' >
                                <a target='_blank' href='musicsheet/" . rawurlencode($row['sheetmusic']) . "'>
                            ";
                                }
                                $extensionFile = pathinfo($row['sheetmusic'], PATHINFO_EXTENSION);
                                if ($extensionFile == 'pdf') {
                                    echo "<embed src='musicsheet/" . rawurlencode($row['sheetmusic']) . "'   width='100%' height='100%'>
                                </a>
                            </div>
                            ";
                                } elseif ($extensionFile == 'docx') {
                                    echo "<img src='musicsheet/word.png' alt='Word' style='width:100%; height:auto; text-align:left;' class='image-set' id='thumb_previews'>
                                </a>
                            </div>
                            ";
                                } elseif ($extensionFile == 'jpg' || $extensionFile == 'png') {
                                    echo "<img src='musicsheet/" . $row['sheetmusic'] . "' alt='Picture' style='width:100%; height: 500px; text-align:left;' class='image-set' id='thumb_previews'>
                                </a>
                            </div>
                            ";
                                } else {
                                    echo " ";
                                }
                                ?>
                            </div>
                        </div>

                        <?php

                        if (!empty($row['video2']) || !$row['video2'] == null) {
                            ?>
                            <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center;">
                                <h2>Youtube</h2>
                                <iframe width='660' height='415' src="<?php echo $row['video2']; ?>" title='YouTube video player'
                                    frameborder='0'
                                    allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
                                    allowfullscreen></iframe>
                            </div>

                            <?php
                        }



                        ?>



                    </div>
                <?php } ?>


                <!-- end of video1 row  -->
                <!--theme row-->
                <hr>
                <div class="container-fluid">

                    <?php
                    $sql1 = "SELECT * FROM `themes_songs`
                        LEFT JOIN `themes` ON themes_songs.theme_id = themes.id
                        WHERE `song_id` = '$id' LIMIT 3";
                    $result1 = mysqli_query($conn, $sql1);

                    if (mysqli_num_rows($result1) > 0) {
                        echo "
                            <h4 style='text-align: center;'>Themes</h4>
                            <div style='text-align: center;'>
                            <div class='row'>
                            ";
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo '
                        <div class="col-sm-4 col-lg-4" style="text-align: center; color: black;" id="theme1">
                        <div>
                        <a href="theme1.php?id=' . base64_encode($row['id']) . '" ><img class="theme-img" style="width: 100%; height: auto;" src="themeimage_uploads/' . $row['theme_image'] . '"></a>
                        <div><h6 style="color:black">' . $row['theme_title'] . '</h6>
                        </div>
                        </div>
                        </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
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
        </script>
    </body>

    </html>

    <?php
} elseif (!isset($_GET['id'])) {
    echo "<script>window.location.href = '/index.php?error=no_song_id';</script>";

    exit;
}

require_once("php/footer.php");

?>