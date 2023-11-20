<?php
require_once("config/db.php");
require_once("php/header2.php");
// echo decode_id($encodedId,$seed);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>OnTrad Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ontrad.css">
    <link rel="stylesheet" href="css/stylestest.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style type="text/css"> </style>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <div class="wrapper ontradgreenlite p-5">
        <div class="container-fluid" style="text-align: center;">
            <h5 style="line-height: 120%;">Welcome to the Ontario Traditional Music Library.</h5>
            <p class="px-5"> This resource has been created especially for singers and instrumentalists looking for
                songs and tunes from Ontario's living musical traditions and for music from historical sources.</p>
        </div>
        <!--general search-->
        <div class="ontradgreen ontradred p-1">
            <!--main search box-->
            <form class="song-form" style="padding: 0%;" action="index.php" method="GET">
                <!--search enter-->
                <div class="">
                    <div class="input-group">
                        <input type="search" class="form-control" size="30" name="search_query"
                            placeholder="Enter title or keyword"
                            value="<?php echo isset($_GET['search_query']) ? htmlspecialchars($_GET['search_query']) : ''; ?>">
                    </div>
                </div>
                <!--circa-->
                <div class="">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="circa">
                        <option value="">Circa</option>
                        <option value="1750-1799" <?php if (isset($_GET['circa']) && $_GET['circa'] === '1750-1799')
                            echo 'selected'; ?>>
                            1750-1799</option>
                        <option value="1800-1849" <?php if (isset($_GET['circa']) && $_GET['circa'] === '1800-1849')
                            echo 'selected'; ?>>
                            1800-1849</option>
                        <option value="1849-1900" <?php if (isset($_GET['circa']) && $_GET['circa'] === '1849-1900')
                            echo 'selected'; ?>>
                            1850-1900</option>
                        <option value="1900-1949" <?php if (isset($_GET['circa']) && $_GET['circa'] === '1900-1949')
                            echo 'selected'; ?>>
                            1900-1949</option>
                        <option value="1950-1999" <?php if (isset($_GET['circa']) && $_GET['circa'] === '1950-1999')
                            echo 'selected'; ?>>
                            1950-1999</option>
                    </select>
                </div>
                <!--region-->
                <div class="">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="region">
                        <option value="">Region</option>
                        <option value="East" <?php if (isset($_GET['region']) && $_GET['region'] === 'East')
                            echo 'selected'; ?>>East
                        </option>
                        <option value="South Central" <?php if (isset($_GET['region']) && $_GET['region'] === 'South Central')
                            echo 'selected'; ?>>
                            South Central</option>
                        <option value="South West" <?php if (isset($_GET['region']) && $_GET['region'] === 'South West')
                            echo 'selected'; ?>>
                            South West</option>
                        <option value="Central" <?php if (isset($_GET['region']) && $_GET['region'] === 'Central')
                            echo 'selected'; ?>>
                            Central</option>
                        <option value="North" <?php if (isset($_GET['region']) && $_GET['region'] === 'North')
                            echo 'selected'; ?>>
                            North</option>
                    </select>
                </div>
                <div class="form-submit-container">
                    <button type="submit" class="button1">Search</button>
                </div>
            </form>
            <!--  song Carousel -->
            <div class="button-wrap">
                <button class="prev carousel-btn" onclick="scrollHorizontally(-1)"
                    style="cursor: pointer; color:red;">❮</button>
                <div class="carousel-container">
                    <div class="scrollmenu scrollMenuSongs">
                        <?php
                        if (isset($_GET['search_query'])) {
                            $search_query = $_GET['search_query'];
                            $circa = $_GET['circa'];
                            $region = $_GET['region'];
                            $types = isset($_GET['type']) ? $_GET['type'] : array();
                            // this condition will return to index.php if the below condition is true
                            if (empty($_GET['search_query']) && empty($_GET['circa']) && empty($_GET['region']) && empty($_GET['type'])) {
                                echo '<script>window.location.href = "index.php";</script>';
                                exit;
                            }

                            $sql = "SELECT * FROM `newtable` WHERE `Stitle` LIKE '%" . $search_query . "%'";

                            if (!empty($circa)) {
                                $sql .= " AND `circa` = '" . $circa . "'";
                            }

                            if (!empty($region)) {
                                $sql .= " AND `region` = '" . $region . "'";
                            }

                            if (!empty($types)) {
                                $typeConditions = array();
                                foreach ($types as $type) {
                                    $typeConditions[] = "(`theme1` = '$type' OR `theme2` = '$type' OR `theme3` = '$type')";
                                }
                                $sql .= " AND (" . implode(" OR ", $typeConditions) . ")";
                            }

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                    <div class="test-card shadow bg-body-tertiary rounded" style="min-width: 200px;">
                                        <a class="song-link" href="song1.php?id=<?php echo base64_encode($row['ID']); ?>">
                                            <!--thumbnail-->
                                            <div class="card-image-container">
                                                <?php
                                                $path = 'images/';
                                                $completePath = $path . $row['imageThumb'];
                                                if (($row['imageThumb'] != NULL || !empty($row['imageThumb'])) && file_exists($completePath)) { ?>
                                                    <img src="images/<?php echo $row['imageThumb']; ?>" class="card-image-top"
                                                        style="width: 100%" alt="try again">
                                                <?php } else { ?>
                                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="200px"
                                                        xmlns="http://www.w3.org/2000/svg" role="img"
                                                        aria-label="Placeholder: Thumbnail" preserveAspectRatio='xMidYMid slice'
                                                        focusable='false'>
                                                        <title>Placeholder</title>
                                                        <rect width="100%" height="130px" fill="#55595c" /><text x="50%" y="50%"
                                                            fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                                                    </svg>

                                                <?php }
                                                ?>
                                            </div>
                                        </a>
                                        <div class="card-bottom-section" style="color: black;">
                                            <div class="card-title-container" style="color: black">
                                                <a class="song-link song-title"
                                                    href="song1.php?id=<?php echo base64_encode($row['ID']); ?>">
                                                    <?php echo $row['Stitle']; ?>
                                                </a>
                                            </div>
                                            <div class="song-description">
                                                <small class="shortanno">
                                                    <a class="song-link"
                                                        href="song1.php?id=<?php echo base64_encode($row['ID']); ?>">
                                                        <?php echo (!empty($row['shortanno']) ? $row['shortanno'] : '...'); ?>
                                                    </a>
                                                </small>
                                            </div>

                                            <div class="play-sample-container">
                                                <audio controls class="audio">
                                                    <source class="play-audio" src=<?php echo "audio/" . $row['audio1']; ?>
                                                        type="audio/ogg">
                                                    Your browser does not support the audio element.
                                                </audio>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<p style='text-align:center; color: white; margin-top: 20px;'>No Song Found related to '" . $search_query . "'</p>";
                            }
                        } else {
                            $sql = "SELECT * FROM newtable LIMIT 20";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                    <div class="test-card shadow bg-body-tertiary rounded" style="min-width: 200px;">
                                        <a class="song-link" href="song1.php?id=<?php echo base64_encode($row['ID']); ?>">
                                            <!--thumbnail-->
                                            <div class="card-image-container">
                                                <?php
                                                $path = 'images/';
                                                $completePath = $path . $row['imageThumb'];
                                                if (($row['imageThumb'] != NULL || !empty($row['imageThumb'])) && file_exists($completePath)) { ?>
                                                    <img src="images/<?php echo $row['imageThumb']; ?>" class="card-image-top"
                                                        style="width: 100%" alt="try again">
                                                <?php } else { ?>
                                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="200px"
                                                        xmlns="http://www.w3.org/2000/svg" role="img"
                                                        aria-label="Placeholder: Thumbnail" preserveAspectRatio='xMidYMid slice'
                                                        focusable='false'>
                                                        <title>Placeholder</title>
                                                        <rect width="100%" height="130px" fill="#55595c" /><text x="50%" y="50%"
                                                            fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                                                    </svg>

                                                <?php }
                                                ?>
                                            </div>
                                        </a>
                                        <div class="card-bottom-section" style="color: black;">
                                            <div class="card-title-container" style="color: black">
                                                <a class="song-link song-title"
                                                    href="song1.php?id=<?php echo base64_encode($row['ID']); ?>">
                                                    <?php echo $row['Stitle']; ?>
                                                </a>
                                            </div>
                                            <div class="song-description">
                                                <small class="shortanno">
                                                    <a class="song-link"
                                                        href="song1.php?id=<?php echo base64_encode($row['ID']); ?>">
                                                        <?php echo (!empty($row['shortanno']) ? $row['shortanno'] : '...'); ?>
                                                    </a>
                                                </small>
                                            </div>

                                            <div class="play-sample-container">
                                                <audio class="audio">
                                                    <source class="play-audio" src=<?php echo "audio/" . $row['audio1']; ?>
                                                        type="audio/ogg">
                                                    Your browser does not support the audio element.
                                                </audio>
                                                <a href="javascript:void(0);" onclick="toggleAudio(this)" class="play-audio">Play Audio</a>
                                            </div>

                                            <script>
                                                function toggleAudio(link) {
                                                    var audio = link.previousElementSibling; // Get the previous sibling, which is the <audio> element

                                                    if (audio.paused) {
                                                        audio.play();
                                                    } else {
                                                        audio.pause();
                                                    }
                                                }
                                            </script>


                                        </div>

                                    </div>

                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <button class="next carousel-btn" onclick="scrollHorizontally(1)"
                    style="cursor: pointer; color:red;">❯</button>
            </div>
            <div class="ontradbg1 pt-2">
                <div class="ontradred py-3" style="text-align: center;">Whats this?
                </div>
            </div>
            <!-- Themes carousel  -->
            <div class="ontradgreenlite ontradred text-center">
                <h4>FEATURED THEMES</h4>
                <!--SCROLLING FIELD OF themes A t0 Z-->

                <div class="ontragreen" style="border-radius: 5px">
                    <!-- theme section starts here  -->

                    <div class="button-wrap">
                        <button class="prev carousel-btn" onclick="scrollHorizontallyThemes(-2)" style="cursor: pointer;
                        text-decoration: none; margin-right: 5px; color: red">❮</button>
                        <div class="carousel-container">
                            <div class="scrollmenu scrollMenuThemes">

                                <?php
                                if (isset($_GET['search_query'])) {
                                    $search_query = $_GET['search_query'];
                                    $sql = "SELECT * FROM `themes` WHERE `theme_title` LIKE '%" . $search_query . "%' AND `status` = 'Featured'";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>


                                            <a href="theme1.php?id=<?php echo base64_encode($row['id']); ?>">
                                                <!--themelink-->
                                                <p class="carousel-title">
                                                    <?php echo substr($row['theme_title'], 0, 15); ?>..
                                                </p>
                                                <div class="flip-card">
                                                    <div class="flip-card-inner">
                                                        <div class="flip-card-front">
                                                            <!--thumbnail-->

                                                            <?php
                                                            $path = 'themeimage_uploads/';
                                                            $completePath = $path . $row['theme_image'];
                                                            if (($row['theme_image'] != NULL || !empty($row['theme_image'])) && file_exists($completePath)) { ?>
                                                                <img src="themeimage_uploads/<?php echo $row['theme_image']; ?>"
                                                                    alt="Avatar" style="height: 130px; width: 100%;">
                                                            <?php } else { ?>
                                                                <svg class="bd-placeholder-img card-img-top" width="100%" height="200px"
                                                                    xmlns="http://www.w3.org/2000/svg" role="img"
                                                                    aria-label="Placeholder: Thumbnail"
                                                                    preserveAspectRatio='xMidYMid slice' focusable='false'>
                                                                    <title>Placeholder</title>
                                                                    <rect width="100%" height="130px" fill="#55595c" /><text x="50%"
                                                                        y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                                                                </svg>

                                                            <?php }
                                                            ?>
                                                        </div>
                                                        <div class="flip-card-back">
                                                            <!--Byline-->
                                                            <p style="text-wrap: wrap; word-wrap: break-word; padding: 3px;">
                                                                <?php echo substr($row['theme_info'], 0, 20) ?>...
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php
                                        }
                                    } else {
                                        echo "<p style='text-align:center; color: white; margin-top: 20px;'>No Theme Found related to '" . $search_query . "'</p>";
                                    }
                                } else {
                                    $sql = "SELECT * FROM `themes` WHERE `status` = 'Featured'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <div class="test-card shadow bg-body-tertiary rounded" style="min-width: 200px;">
                                                <a class="song-link" href="theme1.php?id=<?php echo base64_encode($row['id']); ?>">
                                                    <!--thumbnail-->
                                                    <div class="card-image-container">
                                                        <?php
                                                        $path = 'themeimage_uploads/';
                                                        $completePath = $path . $row['theme_image'];
                                                        if (($row['theme_image'] != NULL || !empty($row['theme_image'])) && file_exists($completePath)) { ?>
                                                            <img src="themeimage_uploads/<?php echo $row['theme_image']; ?>"
                                                                alt="Avatar" style="height: 130px; width: 100%;" class="card-image-top">
                                                        <?php } else { ?>
                                                            <svg class="bd-placeholder-img card-img-top" width="100%" height="200px"
                                                                xmlns="http://www.w3.org/2000/svg" role="img"
                                                                aria-label="Placeholder: Thumbnail" preserveAspectRatio='xMidYMid slice'
                                                                focusable='false'>
                                                                <title>Placeholder</title>
                                                                <rect width="100%" height="130px" fill="#55595c" /><text x="50%" y="50%"
                                                                    fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                                                            </svg>

                                                        <?php }
                                                        ?>
                                                    </div>
                                                </a>
                                                <!--themelink-->
                                                <div class="card-bottom-section" style="color: black;">
                                                    <div class="card-title-container" style="color: black">
                                                        <a class="song-link song-title"
                                                            href="theme1.php?id=<?php echo base64_encode($row['id']); ?>">
                                                            <?php echo $row['theme_title']; ?>
                                                        </a>
                                                    </div>
                                                    <div class="song-description">
                                                        <small class="shortanno">
                                                            <a class="song-link"
                                                                href="theme1.php?id=<?php echo base64_encode($row['id']); ?>">
                                                                <?php echo (!empty($row['theme_info']) ? $row['theme_info'] : '...'); ?>
                                                            </a>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <button class="next carousel-btn" onclick="scrollHorizontallyThemes(2)" style="cursor: pointer; 
                        text-decoration: none; margin-left: 5px; color: red">❯</button>
                    </div>

                </div>
                <div class="input-group-btn" style="text-align: center;">
                    <button type="button" class="button1" onclick="document.location='/themelist.php'">All
                        Themes</button>
                </div>
                <!-- Theme Section End Here  -->
                <br><br>
                <!-- Container (Contact Section) -->
                <div class="container-fluid ontradgreenlite ontradred py-3" style="width: 100%;">
                    <h5 class="text-center">CONTACT US</h5>
                    <div class="row">
                        <div class="col" style="width: 100%; text-align: center;">
                            <h5> mail@ontariotraditionalmusic.ca</h5>
                        </div>
                    </div>
                    <br>
                    <!-- Button to Open the Modal -->

                    <div style="text-align: center;">
                        <p><small>- CREATED BY BUSINESSLORE -</small>
                        </p>
                    </div>
                </div>
                <!--end of contact-->
            </div>
        </div><!--end of wrapper-->
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

            function myFunction() {
                var checkBox = document.getElementById("scores");
                var text = document.getElementById("textscores");
                if (checkBox.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }

            function myFunction() {
                var checkBox = document.getElementById("images");
                var text = document.getElementById("textimages");
                if (checkBox.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }

            function myFunction() {
                var checkBox = document.getElementById("video");
                var text = document.getElementById("textvideo");
                if (checkBox.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }

            function myFunction() {
                var checkBox = document.getElementById("load");
                var text = document.getElementById("textload");
                if (checkBox.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
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



            // let audioElements = {};

            // function playAudio(element) {
            //     let mainElement = element.target;
            //     let song_name = mainElement.dataset.songName;

            //     if (!audioElements[song_name]) {
            //         audioElements[song_name] = new Audio("audio/" + song_name);
            //     }

            //     if (audioElements[song_name].paused) {
            //         audioElements[song_name].play();
            //         mainElement.textContent = "Pause Song";
            //     } else {
            //         audioElements[song_name].pause();
            //         mainElement.textContent = "Play Song";
            //     }
            // }

            let audioElements = {};

            function playAudio(element) {
                let mainElement = element.target;
                let song_name = mainElement.dataset.songName;

                if (!audioElements[song_name]) {
                    audioElements[song_name] = new Audio("audio/" + song_name);

                    audioElements[song_name].addEventListener("ended", function () {
                        mainElement.textContent = "Play Song";
                    });
                }

                if (audioElements[song_name].paused) {
                    audioElements[song_name].play();
                    mainElement.textContent = "Pause Song";
                } else {
                    audioElements[song_name].pause();
                    mainElement.textContent = "Play Song";
                }
            }

            // scrolling for Songs
            // function scrollHorizontally(direction) {
            //     const scrollContainer = document.querySelector('.scrollMenuSongs');
            //     const scrollAmount = 200; // Adjust this value as needed

            //     if (direction === -1) {
            //         scrollContainer.scrollLeft -= scrollAmount;
            //     } else if (direction === 1) {
            //         scrollContainer.scrollLeft += scrollAmount;
            //     }
            // }

            // // Scrolling for themes
            // function scrollHorizontallyThemes(direction) {
            //     const scrollContainer = document.querySelector('.scrollMenuThemes');
            //     const scrollAmount = 200; // Adjust this value as needed

            //     if (direction === -2) {
            //         scrollContainer.scrollLeft -= scrollAmount;
            //     } else if (direction === 2) {
            //         scrollContainer.scrollLeft += scrollAmount;
            //     }
            // }
        </script>
        <script src="js/scrollmenu.js"></script>
</body>

</html>