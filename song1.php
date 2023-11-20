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
        </style>

    <body>
        <!--Data-->
        <div class="wrapper">
            <!--title-->
            <div class="container-fluid px-0" style="text-align: center;">
                <h2 id="stitle"><?php echo $row['Stitle']; ?></h2>
                <!--composer-->
                <h5 id="songcomposer"><?php echo $row['songcomposer']; ?></h5>
            </div>
            <hr style="border-color: black">
            <div class="row container-fluid m-0">
                <!--composer-->
                <!--circa and region-->
                <div class="col-sm-7 m-0 p-0">
                    <?php
                    if ($row['circa'] != NULL && !empty($row['circa']) || $row['region'] != NULL && !empty($row['region'])) {
                        echo  '
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
                    <div class="lead p-2">
                        <?php echo (!empty($row['shortanno']) ? $row['shortanno'] :  ''); ?>
                    </div>
                </div>
                <!--right image-->
                <div class="col-sm-5  m-0 p-0" style="text-align: center;">
                    <?php
                    if ($row['imageThumb'] != NULL && !empty($row['imageThumb'])) {
                        echo "
                                <div class='container-fluid m-0 p-0' style=' text-align: center;'><img src='images/" . $row['imageThumb'] . "' style='width: 100%; max-width: 400px;'>
                                ";
                    }
                    ?>
                </div>
            </div>
            <!-- Long anno and Full image-->
            <hr>
            <div class="row">
                <div class="col-sm-6"  style="text-align:center;">
                    <?php if (!empty($row['imageFull'])) { ?>
                        <div class="container-fluid">
                            <img src="images/<?php echo $row['imageFull']; ?>" style="width: 100%; height: auto;" alt="Full Image">
                        </div>
                    <?php } ?>
                </div>
                <div class="col-sm-6">
                    <div class="container-fluid">
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
            <hr>
            <!-- end of Full Image row with full width  -->
            <!--Music-->
            <?php if (
                ($row['audio1'] != NULL && !empty($row['audio1'])) ||
                ($row['audio2'] != NULL && !empty($row['audio2'])) ||
                ($row['video2'] != NULL && !empty($row['video2'])) ||
                ($row['video1'] != NULL && !empty($row['video1'])) ||
                ($row['sheetmusic'] != NULL && !empty($row['sheetmusic']))
            ) { ?>
                <div class="row">
                    <div class="col-sm-6" style="text-align: center;">
                        <!--Audio-->
                        <div style="margin-top: 0%; margin-bottom: 1%;">
                            <div style="padding: 0% 3%">
                                <?php
                                if ($row['audio1'] != NULL && !empty($row['audio1'])) {
                                    echo "
                                        <h4>Music</h4>
                                        <p class='blurbtext'>" . $row['audioanno'] . "</p>
                                        <audio controls style='text-align: center;'>
                                            <source src='audio/" . $row['audio1'] . "' type='audio/mpeg' id='audio1'>
                                            Your browser does not support the audio element.
                                        </audio>
                                        ";
                                }
                                ?>
                            </div>
                            <hr>
                            <!--This audio and text will not show if empty-->
                            <div style="padding: 0% 3%">
                                <?php
                                if ($row['audio2'] != NULL && !empty($row['audio2'])) {
                                    echo "
                                    <audio controls style='text-align: center;'>
                                        <source src='audio/" . $row['audio2'] . "' type='audio/mpeg' id='audio1'>
                                        Your browser does not support the audio element.
                                    </audio>
                                    ";
                                }
                                ?>
                            </div>
                        </div>

                        <!--Video-->
                        <div class="container-fluid">
                            <div class="embed-responsive embed-responsive-16by9">
                                <?php
                                if (($row['audio1'] || $row['audio2']) != NULL && !empty($row['audio1'] || $row['audio2'])) {
                                    if ($row['video2'] != NULL && !empty($row['video2'])) {
                                        echo "
                                            <h4>Video</h4>
                                            <a href='" . $row['video2'] . "' target='_blank'>" . $row['video2'] . "</a>
                                            <p>" . $row['videoanno'] . "</p>                                     
                                        ";
                                    } else {
                                        echo " ";
                                    }
                                } else {
                                    echo "
                                    <a href='" . $row['video2'] . "' target='_blank'>" . $row['video2'] . "</a>
                                    <p>" . $row['videoanno'] . "</p> 
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--sheetmusic-->
                    <div class="col-sm-6" style="text-align: center" id="sheetmusic">
                        <?php
                        if ($row['sheetmusic'] != NULL && !empty($row['sheetmusic'])) {
                            echo "                
                            <div class='gallery'>
                                <a target='_blank' href='musicsheet/" . rawurlencode($row['sheetmusic']) . "'>
                            ";
                        }
                        $extensionFile = pathinfo($row['sheetmusic'], PATHINFO_EXTENSION);
                        if ($extensionFile == 'pdf') {
                            echo "<embed src='musicsheet/" . rawurlencode($row['sheetmusic']) . "'   height='700px' width='500'>
                                </a>
                            </div>
                            ";
                        } elseif ($extensionFile == 'docx') {
                            echo "<img src='musicsheet/word.png' alt='Word' style='width:100%; height:auto; text-align:left;' class='image-set' id='thumb_previews'>
                                </a>
                            </div>
                            ";
                        } elseif ($extensionFile == 'jpg' || $extensionFile == 'png') {
                            echo "<img src='musicsheet/" . $row['sheetmusic'] . "' alt='Picture' style='width:100%; height:auto; text-align:left;' class='image-set' id='thumb_previews'>
                                </a>
                            </div>
                            ";
                        } else {
                            echo " ";
                        }
                        ?>
                        <!--sheetanno-->
                        <?php
                        if ($row['sheetanno'] != NULL && !empty($row['sheetanno'])) {
                            echo "<div class='blurbtext'>" . $row['sheetanno'] . "</div>";
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>

            <!-- start of video1 row  -->
            <?php if ($row['video1'] != NULL && !empty($row['video1'])) { ?>
                <div class="row w-50">
                    <video width="500px" height="500px" controls="controls">
                        <source src="video/<?php echo $row['video1']; ?>" type='video/mp4' />
                    </video>
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
                        echo "<div class='col-sm-4 col-lg-4' style='text-align: center;'' id='theme1'><a href='theme1.php?id=" . base64_encode($row['id']) . "'> " . $row['theme_title'] . "</a></div>";
                    }
                }

                ?>
            </div>
            <br>
            <hr>

            <!--footer-->
            <div class="container-fluid ontradgreenlite ontradred py-3" style="width: 100%;">
                <h3 class="text-center">CONTACT US</h3>
                <div class="row">
                    <div class="col" style="width: 100%; text-align: center;">
                        <h5> Villa Nova, Ontario, Canada - mail@ontariotraditionalmusic.ca</h5>
                    </div>
                </div>
                <div class="alert alert-light m-3" style="padding: 3% 10% 3% 10%">
                    <p style="text-align: center;">We welcome your comments and suggestions</p>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" style="width: 100%;" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="button1 pull-right" type="submit">Send</button>
                        </div>
                    </div>
                </div>
                <div style="text-align: center;">
                    <p><small>- CREATED BY BUSINESSLORE -</small>
                    </p>
                </div>
            </div>
        </div>
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

<?php
} elseif (!isset($_GET['id'])) {
    echo "<script>window.location.href = 'https://localhost/ontrad/index.php?error=no_song_id';</script>";

    exit;
}
?>