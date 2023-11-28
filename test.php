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

    $sql = "SELECT * FROM `newtable` WHERE 
            `Stitle` LIKE ? OR
            `shortanno` LIKE ? OR
            `longanno` LIKE ? OR
            `sheetanno` LIKE ? OR
            `imageanno` LIKE ? OR
            `audioanno` LIKE ? OR
            `songartist` LIKE ? OR
            `songcomposer` LIKE ?";

    $paramTypes = str_repeat("s", 8); // Assuming all parameters are strings

    $bindParams = [$search_query, $search_query, $search_query, $search_query, $search_query, $search_query, $search_query, $search_query];

    if (!empty($circa)) {
        $sql .= " AND `circa` = ?";
        $paramTypes .= "s";
        $bindParams[] = $circa;
    }

    if (!empty($region)) {
        $sql .= " AND `region` = ?";
        $paramTypes .= "s";
        $bindParams[] = $region;
    }

    if (!empty($types)) {
        $typeConditions = array_map(function ($type) {
            return "(`theme1` = ? OR `theme2` = ? OR `theme3` = ?)";
        }, $types);

        $sql .= " AND (" . implode(" OR ", $typeConditions) . ")";
        $paramTypes .= str_repeat("s", count($types) * 3);
        $bindParams = array_merge($bindParams, array_merge($types, $types, $types));
    }

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, $paramTypes, ...$bindParams);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

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
                                <img src="images/<?php echo $row['imageThumb']; ?>" class="card-image-top" style="width: 100%"
                                    alt="try again">
                            <?php } else { ?>
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="200px" xmlns="http://www.w3.org/2000/svg"
                                    role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio='xMidYMid slice' focusable='false'>
                                    <title>Placeholder</title>
                                    <rect width="100%" height="130px" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD
                                        IMAGE</text>
                                </svg>

                            <?php }
                            ?>
                        </div>
                    </a>
                    <div class="card-bottom-section" style="color: black;">
                        <div class="card-title-container" style="color: black">
                            <a class="song-link song-title" href="song1.php?id=<?php echo base64_encode($row['ID']); ?>">
                                <?php echo $row['Stitle']; ?>
                            </a>
                        </div>
                        <div class="song-description">
                            <small class="shortanno">
                                <a class="song-link" href="song1.php?id=<?php echo base64_encode($row['ID']); ?>">
                                    <?php echo (!empty($row['shortanno']) ? $row['shortanno'] : '...'); ?>
                                </a>
                            </small>
                        </div>

                        <div class="play-sample-container">
                            <audio class="audio">
                                <source class="play-audio" src=<?php echo "audio/" . $row['audio1']; ?> type="audio/ogg">
                                Your browser does not support the audio element.
                            </audio>
                            <a href="javascript:void(0);" onclick="toggleAudio(this)" class="play-audio">Play
                                Audio</a>
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
        } else {
            echo "<p style='text-align:center; color: white; margin-top: 20px;'>No Song Found related to '" . $search_query . "'</p>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error in prepared statement: " . mysqli_error($conn);
    }
}

?>