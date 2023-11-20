<?php
require_once("config/db.php");
require_once("php/header2.php");

if(isset($_GET['id'])){
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
        padding: 0%;
    }
    </style>

<body>
    <!--Data-->
    <div class="wrapper p-3">
        <!--annos and image-->
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-sm-8" id="shortanno">
                    <h2 id="stitle"><?php echo $row['Stitle'];?></h1>
                        <h3 id="songcomposer"><?php echo $row['songcomposer']; ?></h3>
                        <!--circa and region-->
                        <div class="row">
                            <?php
                    if($row['circa']!=NULL && !empty($row['circa']) || $row['region']!=NULL && !empty($row['region'])){
                       echo  "
                        <div class='col-sm-12 col-lg-4' id='circa'>
                            <h5>Circa- " .$row['circa']. "</h5>
                        </div>
                        <div class='col-sm-12 col-lg-8' id='region'>
                            <h5>Region- ".$row['region']."</h5>
                        </div>
                        ";
                    }
                    ?>
                        </div>
                        <?php
                if($row['shortanno']!=NULL && !empty($row['shortanno']) || $row['longanno']!=NULL && !empty($row['longanno'])){
                echo "
                <!--short annotation-->
                <div class='tfont'>
                ".$row['shortanno']."
                </div>
                <!--long annotation-->
                <div class='rfont pt-3'>
                ".$row['longanno']."
                </div>
                ";
                }
                ?>
                </div>
                <!--right image-->
                <?php
                    if($row['imageThumb']!=NULL && !empty($row['imageThumb'])){
                        echo "
                        <div class='col-sm-4' style=' text-align: center;'><img src='images/".$row['imageThumb']."' style='width: 100%; max-width: 250px;'>
                        ";
                    }
                    ?>
            </div>
        </div>
    </div>

    <!-- Full image row with full width  -->
    <hr>
    <div class="row">
        <?php if(!empty($row['imageFull'])){ ?>
        <div class="mb-3 mt-3" style="text-align:center;">
            <img src="images/<?php echo $row['imageFull']; ?>" style="width: 50%; height: 100%;" alt="Full Image">
        </div>
        <?php } ?>
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
                        if($row['audio1']!=NULL && !empty($row['audio1'])){
                            echo "
                            <h4>Music</h4>
                            <p class='blurbtext'>".$row['audioanno']."</p>
                            <audio controls style='text-align: center;'>
                                <source src='audio/".$row['audio1']."' type='audio/mpeg' id='audio1'>
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
                        if($row['audio2']!=NULL && !empty($row['audio2'])){
                            echo "
                            <audio controls style='text-align: center;'>
                                <source src='audio/".$row['audio2']."' type='audio/mpeg' id='audio1'>
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
                        if(($row['audio1'] || $row['audio2']) != NULL && !empty($row['audio1'] || $row['audio2'])){
                            if($row['video2']!=NULL && !empty($row['video2'])){
                                echo "
                                    <h4>Video</h4>
                                    <a href='".$row['video2']."' target='_blank'>".$row['video2']."</a>
                                    <p>".$row['videoanno']."</p>                                     
                                ";
                            }else{
                                echo " ";
                            }
                        }else{                            
                            echo "
                            <a href='".$row['video2']."' target='_blank'>".$row['video2']."</a>
                            <p>".$row['videoanno']."</p> 
                            ";
                            
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--sheetmusic-->
        <div class="col-sm-6" style="text-align: center" id="sheetmusic">
            <?php
                if($row['sheetmusic']!=NULL && !empty($row['sheetmusic'])){
                    echo "                
                    <div class='gallery'>
                        <a target='_blank' href='musicsheet/".rawurlencode($row['sheetmusic'])."'>
                    ";
                }
                $extensionFile = pathinfo($row['sheetmusic'], PATHINFO_EXTENSION);
                if($extensionFile == 'pdf'){
                    echo "<embed src='musicsheet/".rawurlencode($row['sheetmusic'])."'   height='700px' width='500'>
                        </a>
                    </div>
                    ";
                }elseif($extensionFile == 'docx'){
                    echo "<img src='musicsheet/word.png' alt='Word' style='width:100%; height:auto; text-align:left;' class='image-set' id='thumb_previews'>
                        </a>
                    </div>
                    ";
                }elseif($extensionFile == 'jpg' || $extensionFile == 'png'){
                    echo "<img src='musicsheet/".$row['sheetmusic']."' alt='Picture' style='width:100%; height:auto; text-align:left;' class='image-set' id='thumb_previews'>
                        </a>
                    </div>
                    ";
                }
                else{
                    echo " ";
                }                
                ?>
            <!--sheetanno-->
            <?php
                if($row['sheetanno']!=NULL && !empty($row['sheetanno'])){
                    echo "<div class='blurbtext'>".$row['sheetanno']."</div>";
                }
            ?>
        </div>
    </div>
    <?php } ?>

    <!-- start of video1 row  -->
    <?php if($row['video1'] != NULL && !empty($row['video1'])){ ?>
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

            if(mysqli_num_rows($result1)>0){
                echo "
                <h4 style='text-align: center;'>Themes</h4>
                <div style='text-align: center;'>
                <div class='row'>
                ";
                while($row = mysqli_fetch_assoc($result1)){
                    echo "<div class='col-sm-4 col-lg-4' style='text-align: center;'' id='theme1'><a href='theme1.php?id=".base64_encode($row['id'])."'> ".$row['theme_title']."</a></div>";
                }
            }

            ?>
    </div>
    <br>
    <hr>
    </div>
    </div>
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
                    <input class="form-control" style="width: 100%;" id="name" name="name" placeholder="Name"
                        type="text" required>
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
    <!--addons
        <hr style="width: 90%; color: darkgreen;">
        <div class="container-fluid px-5">
            <h5 style="text-align: center;">Additional Material</h5>
            <div class="container-fluid">
            <div class="card-group">
                <div class="card" style="width:300px">
                <p class="card-title" style="text-align: center;"><b>Image title</b></p>
                <img class="card-img-top" src="images/bella.jpeg" alt="Card image">
                <div class="card-body">
                    <p class="card-text">anno text.</p>
                </div>
                </div>
                <div class="card" style="width:300px">
                <p class="card-title" style="text-align: center;"><b>Image title</b></p>
                <img class="card-img-top" src="images/iansnose.png" alt="Card image">
                <div class="card-body">
                    <p class="card-text">anno text.</p>
                </div>
                </div>
                <div class="card" style="width:300px">
                <p class="card-title" style="text-align: center;"><b>Image title</b></p>
                <img class="card-img-top" src="images/bella.jpeg" alt="Card image">
                <div class="card-body">
                    <p class="card-text">anno text.</p>
                </div>
                </div>
                <div class="card" style="width:300px">
                <p class="card-title" style="text-align: center;"><b>Image title</b></p>
                <img class="card-img-top" src="images/haaland.png" alt="Card image">
                <div class="card-body">
                    <p class="card-text">anno text.</p>
                </div>
                </div>
            </div>
            </div>
        </div>
         -->
    <!-- Container (Contact Section) -->

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
}
?>