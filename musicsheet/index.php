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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">



    <style type="text/css">
    input.larger {
        transform: scale(1.75);
        margin-bottom: 5%;
    }
    .listStyle{
        background-color: white;
        color: blue;
        border-top: 1px solid #dee2e6;
        border-bottom: 1px solid #dee2e6;
        border-left: none;
        border-right: none;
        padding: 0.4rem 0.75rem;
        /* display: flex;
        align-items: flex-end; */
    }
    </style>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <div class="wrapper pt-1">
        <div class="container-fluid p-3" style="text-align: center;"><img src="images/ontradlogo.jpg"
                style="width: 50%; height: auto;">
        </div>
        <div class="container-fluid" style="padding: 0% 10% 1% 10%;">
            <h5 style="line-height: 120%;"><small>Welcome to the Ontario Traditional Music Library. This resource has
                    been created especially for singers and instrumentalists looking for songs and tunes from Ontario's
                    living
                    musical traditions and for music from historical sources.</small></h5>
        </div>
        <!--general search-->
        <div class="ontradgreenlite ontradred p-2">
            <!--main search box-->
            <form style="padding: 2% 15%;" action="index.php" method="GET">
                <div class="input-group">
                    <input type="search" class="form-control" size="40" name="search_query"
                        placeholder="Search by titles or keywords"
                        value="<?php echo isset($_GET['search_query']) ? htmlspecialchars($_GET['search_query']) : ''; ?>">
                </div>


                <!--circa nad region-->
                <!--Year Checkbox-->

                <div class="row input-clr ontradred" style="padding: 2% 0%;">
                    <div class="col-sm-6" style="text-align: center;">
                        <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example"
                            name="circa">
                            <option value="">Circa</option>
                            <option value="1750-1799"
                                <?php if (isset($_GET['circa']) && $_GET['circa'] === '1750-1799') echo 'selected'; ?>>
                                1750-1799</option>
                            <option value="1800-1849"
                                <?php if (isset($_GET['circa']) && $_GET['circa'] === '1800-1849') echo 'selected'; ?>>
                                1800-1849</option>
                            <option value="1849-1900"
                                <?php if (isset($_GET['circa']) && $_GET['circa'] === '1849-1900') echo 'selected'; ?>>
                                1850-1900</option>
                            <option value="1900-1949"
                                <?php if (isset($_GET['circa']) && $_GET['circa'] === '1900-1949') echo 'selected'; ?>>
                                1900-1949</option>
                            <option value="1950-1999"
                                <?php if (isset($_GET['circa']) && $_GET['circa'] === '1950-1999') echo 'selected'; ?>>
                                1950-1999</option>
                        </select>
                    </div>
                    <div class="col-sm-6" style="text-align: center;">
                        <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example"
                            name="region">
                            <option value="">Region</option>
                            <option value="East"
                                <?php if (isset($_GET['region']) && $_GET['region'] === 'East') echo 'selected'; ?>>East
                            </option>
                            <option value="South Central"
                                <?php if (isset($_GET['region']) && $_GET['region'] === 'South Central') echo 'selected'; ?>>
                                South Central</option>
                            <option value="South West"
                                <?php if (isset($_GET['region']) && $_GET['region'] === 'South West') echo 'selected'; ?>>
                                South West</option>
                            <option value="Central"
                                <?php if (isset($_GET['region']) && $_GET['region'] === 'Central') echo 'selected'; ?>>
                                Central</option>
                            <option value="North"
                                <?php if (isset($_GET['region']) && $_GET['region'] === 'North') echo 'selected'; ?>>
                                North</option>
                        </select>
                    </div>
                </div>

                <!--checkboxes-->
                <div class="row" style="text-align: center; padding: 2% 15%;">
                    <div class="col-sm-4 p-0">
                        <label for="scores">
                            <h5>Instrumentals&nbsp;</h5>
                        </label>
                        <input type="checkbox" class="larger" id="scores" name="type[]" value="Instrumental Music"
                            <?php if (isset($_GET['type']) && in_array('Instrumental Music', $_GET['type'])) echo 'checked'; ?>>
                    </div>
                    <div class="col-sm-4 p-0">
                        <label for="songs">
                            <h5>Songs&nbsp;</h5>
                        </label>
                        <input type="checkbox" class="larger" id="songs" name="type[]" value="Songs"
                            <?php if (isset($_GET['type']) && in_array('Songs', $_GET['type'])) echo 'checked'; ?>>
                    </div>
                    <div class="col-sm-4 p-0">
                        <label for="images">
                            <h5>Images&nbsp;</h5>
                        </label>
                        <input type="checkbox" class="larger" id="images" name="type[]" value="Images"
                            <?php if (isset($_GET['type']) && in_array('Images', $_GET['type'])) echo 'checked'; ?>>
                    </div>
                </div>

                <div class="input-group-btn mb-3 mt-0" style="text-align: center;">
                    <button type="submit" class="button1">Search</button>
                </div>
            </form>
        </div>
    </div>
    <!--SCROLLING FIELD OF SONGS A t0 Z-->
    <div class="ontradbg1 pt-2">
        <div class="ontradred py-3" style="text-align: center;">
            <h4>SONGS&nbsp;
                <!-- reverse order of songs A to Z --> &uarr; &nbsp; &darr;
            </h4>
        </div>


        <div class="album">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                            $limit = 9;
                            if(isset($_GET['page'])){
                              $page = $_GET['page'];
                            }else{
                              $page = 1;
                            }
                            $offset = ($page-1)*$limit;

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

                              $sql .= " LIMIT {$offset}, {$limit}";
                              
                              $result = mysqli_query($conn, $sql);


                              if(mysqli_num_rows($result)>0){
                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "
                                      <div class='col'>
                                          <div class='card shadow-sm' style='height: 620px !important;'>
                                              <div class='d-flex flex-column justify-content-between' style='height: 100%;'>";
                                $path = 'images/';
                                $completePath = $path.$row['imageThumb'];
                                  echo ($row['imageThumb'] != NULL || !empty($row['imageThumb'])) && file_exists($completePath)
                                      ? "<img src='images/" . $row['imageThumb'] . "' style='max-height: 200px;' alt='Image Not found'>"
                                      : "<svg class='bd-placeholder-img card-img-top' width='100%' height='200px'
                                          xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail'
                                          preserveAspectRatio='xMidYMid slice' focusable='false'>
                                          <title>Placeholder</title>
                                          <rect width='100%' height='100%' fill='#55595c' /><text x='50%' y='50%'
                                              fill='#eceeef' dy='.3em'>ONTRAD IMAGE</text>
                                      </svg>";
                              
                                      echo "
                                      <div class='card-body'>
                                          <h4>" . $row['Stitle'] . "</h4>
                                          <small class='text-body-secondary'><strong>" . $row['circa'] . "</strong></small><small class='text-body-secondary'> " . $row['region'] . "</small>
                                          <p class='card-text'>" . substr($row['shortanno'], 0, 50) . "...</p>
                                      </div>
                                      <div class='card-footer' style='background-color: white;'>
                                      <div class='btn-group'>
                                          <a href='song1.php?id=".base64_encode($row['ID'])."' class='btn btn-sm btn-outline-secondary'>View Page</a>
                                        ";
                                            if($row['audio1']!=NULL && !empty($row['audio1'])){                                        
                                                echo "<button type='button' data-song-name='".$row['audio1']."' id='playSong' onclick='playAudio(event)' class='btn btn-sm btn-outline-secondary'>Play Song</button>";
                                            }elseif($row['audio2']!=NULL && !empty($row['audio2'])){
                                                echo "<button type='button' data-song-name='".$row['audio2']."' id='playSong' onclick='playAudio(event)' class='btn btn-sm btn-outline-secondary'>Play Song</button>";
                                            }else{
                                                echo " ";
                                            }
                              echo "
                                      </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          ";
                              }         
                            }else{
                                echo "No songs Found";
                            }
                            }else {
                              $sql = "SELECT * FROM `newtable` ORDER BY `Stitle` ASC LIMIT {$offset}, {$limit}";
                              $result = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($result)>0){

                            
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                    <div class='col'>
                                        <div class='card shadow-sm' style='height: 600px !important;'>
                                            <div class='d-flex flex-column justify-content-between' style='height: 100%;'>";
                                 $path = 'images/';
                                 $completePath = $path.$row['imageThumb'];
                                echo ($row['imageThumb'] != NULL || !empty($row['imageThumb'])) && file_exists($completePath)
                                    ? "<img src='images/" . $row['imageThumb'] . "' style='max-height: 200px;' alt='Image Not found'>"
                                    : "<svg class='bd-placeholder-img card-img-top' width='100%' height='200px'
                                        xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail'
                                        preserveAspectRatio='xMidYMid slice' focusable='false'>
                                        <title>Placeholder</title>
                                        <rect width='100%' height='100%' fill='#55595c' /><text x='50%' y='50%'
                                            fill='#eceeef' dy='.3em'>ONTRAD IMAGE</text>
                                    </svg>";
                            
                                echo "
                                            <div class='card-body'>
                                                <h4>" . $row['Stitle'] . "</h4>
                                                <small class='text-body-secondary'><strong>" . $row['circa'] . "</strong></small><small class='text-body-secondary'> " . $row['region'] . "</small>
                                                <p class='card-text'>" . substr($row['shortanno'], 0, 50) . "...</p>
                                            </div>
                                            <div class='card-footer' style='background-color: white;'>
                                            <div class='btn-group'>
                                                <a href='song1.php?id=".base64_encode($row['ID'])."' class='btn btn-sm btn-outline-secondary'>View Page</a>
                                    ";
                                        if($row['audio1']!=NULL && !empty($row['audio1'])){                                        
                                            echo "<button type='button' data-song-name='".$row['audio1']."' id='playSong' onclick='playAudio(event)' class='btn btn-sm btn-outline-secondary'>Play Song</button>";
                                        }elseif($row['audio2']!=NULL && !empty($row['audio2'])){
                                            echo "<button type='button' data-song-name='".$row['audio2']."' id='playSong' onclick='playAudio(event)' class='btn btn-sm btn-outline-secondary'>Play Song</button>";
                                        }else{
                                            echo " ";
                                        }

                                    echo "
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                        }else{
                            echo "No Songs Found";
                        }

                        }
                    ?>
                </div>
                <?php
                    // pagination while searching (Filtering through Songs)
                    if(isset($_GET['search_query'])){
                        $search_query = $_GET['search_query'];
                        $circa = $_GET['circa']; 
                        $region = $_GET['region']; 
                        $types = isset($_GET['type']) ? $_GET['type'] : array();
                        $sql1 = "SELECT * FROM `newtable` WHERE `Stitle` LIKE '%" . $search_query . "%'";                            ;

                        if (!empty($circa)) {
                            $sql1 .= " AND `circa` = '" . $circa . "'";
                        }

                        if (!empty($region)) {
                            $sql1 .= " AND `region` = '" . $region . "'";
                        }

                        if (!empty($types)) {
                        $typeConditions = array();
                        foreach ($types as $type) {
                            $typeConditions[] = "(`theme1` = '$type' OR `theme2` = '$type' OR `theme3` = '$type')";
                        }
                        $sql1 .= " AND (" . implode(" OR ", $typeConditions) . ")";
                        }

                        $sql1 .= " ORDER BY `Stitle` ASC";

                        $result1 = mysqli_query($conn, $sql1);
                        
                        if(mysqli_num_rows($result1)>9){
                        $totalRecords = mysqli_num_rows($result1);
                        $totalPages = ceil($totalRecords / $limit);
                        $pageLimit = 4;
                        echo "<ul class='pagination mt-3'>";
                        if($page>1){
                            if(!empty($types)){
                                echo "<li><a class='page-link' href='index.php?search_query=".$search_query."&circa=".$circa."&region=".$region."&type[]=".$type."&page=".($page-1)."&status=songs'><i class='fa-solid fa-chevron-left'></i>  Previous</a></li>";
                                if($page>=$pageLimit){
                                    echo "<li class='listStyle'>...</li>";
                                }
                            }else{
                                echo "<li><a class='page-link' href='index.php?search_query=".$search_query."&circa=".$circa."&region=".$region."&page=".($page-1)."&status=songs'><i class='fa-solid fa-chevron-left'></i>  Previous</a></li>";
                                if($page>=$pageLimit){
                                    echo "<li class='listStyle'>...</li>";
                                }
                            }
                        }

                        $startPage = max(1, $page - 2);
                        $endPage = min($totalPages, $startPage + $pageLimit - 1);

                        for($i=$startPage; $i<=$endPage; $i++){
                            if($i==$page){
                            $active = "active";
                            }else{
                            $active = " ";
                            }
                            
                            if(!empty($types)){
                                echo "<li class='".$active."'><a class='page-link' href='index.php?search_query=".$search_query."&circa=".$circa."&region=".$region."&type[]=".$type."&page=".$i."&status=songs'>".$i."</a></li>";
                            }else{
                                echo "<li class='".$active."'><a class='page-link' href='index.php?search_query=".$search_query."&circa=".$circa."&region=".$region."&page=".$i."&status=songs'>".$i."</a></li>";
                            }
                        }

                        if($page<$pageLimit){
                            if(!empty($types)){
                                if($totalPages>4){
                                    echo "<li class='listStyle'>...</li>";
                                }
                                echo "<li><a class='page-link' href='index.php?search_query=".$search_query."&circa=".$circa."&region=".$region."&type[]=".$type."&page=".($page+1)."&status=songs'>Next  <i class='fa-solid fa-chevron-right'></i></a></li>";
                            }else{
                                if($totalPages>4){
                                    echo "<li class='listStyle'>...</li>";
                                }
                                echo "<li><a class='page-link' href='index.php?search_query=".$search_query."&circa=".$circa."&region=".$region."&page=".($page+1)."&status=songs'>Next  <i class='fa-solid fa-chevron-right'></i></a></li>";
                            }
                        }
                        echo "</ul>";
                        }
                    }else{
                        $sql1 = "SELECT * FROM `newtable`";
                        $result1 = mysqli_query($conn, $sql1);
                        
                        if(mysqli_num_rows($result1)>0){
                        $totalRecords = mysqli_num_rows($result1);
                        $totalPages = ceil($totalRecords / $limit);
                        $pageLimit = 4;
                        echo "<ul class='pagination mt-3'>";
                        if($page>1){
                            echo "<li><a class='page-link' href='index.php?page=".($page-1)."&status=songs'><i class='fa-solid fa-chevron-left'></i>  Previous</a></li>";
                            if($page>=$pageLimit){
                                echo "<li class='listStyle'>...</li>";
                            }
                        }

                        $startPage = max(1, $page - 2);
                        $endPage = min($totalPages, $startPage + $pageLimit - 1);

                        for($i=$startPage; $i<=$endPage; $i++){
                            if($i==$page){
                            $active = "active";
                            }else{
                            $active = " ";
                            }

                        echo  "<li class='".$active."'><a class='page-link' href='index.php?page=".$i."&status=songs'>".$i."</a></li>";
                        }
                        if($page<$pageLimit){
                            if($totalPages>4){
                                echo "<li class='listStyle'>...</li>";
                            }
                            echo "<li><a class='page-link' href='index.php?page=".($page+1)."&status=songs'>Next  <i class='fa-solid fa-chevron-right'></i></a></li>";
                        }
                        echo "</ul>";
                        }
                    }
                ?>
            </div>
        </div>


        <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li> -->


        <!-- end of nav -->
        <br><br>
    </div>
    <!--end of scrolling songlist -->
    <div class="ontradgreenlite ontradred p-4 text-center">
        <h4>FEATURED THEMES</h4>

        <div class="input-group-btn" style="text-align: center;">
            <button type="button" class="button1" onclick="document.location='/themelist.php'">All Themes</button>
        </div>
    </div>
    <!--SCROLLING FIELD OF themes A t0 Z-->
    <div class="ontragreen pb-5 ">
        <div style="text-align: center;">
            <h4>
                <!-- reverse order of songs A to Z --> &uarr; &nbsp; &darr;
            </h4>
        </div>
        <!-- theme section starts here  -->
        <div class="album">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <?php
                    $limit = 9;
                    if(isset($_GET['themePage'])){
                      $page = $_GET['themePage'];
                    }else{
                      $page = 1;
                    }
                    $offset = ($page-1)*$limit;
                    

                        $sql = "SELECT * FROM `themes` WHERE `status` = 'Featured' LIMIT {$offset}, {$limit}";
                        $result = mysqli_query($conn, $sql);
                        
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "
                                <div class='col'>
                                        <!-- songcard -->
                                        <div class='card shadow-sm' style='height: 500px !important;'>
                                   ";    
                                   $path = 'themeimage_uploads/';
                                   $completePath = $path.$row['theme_image'];
                                echo ($row['theme_image']!=NULL || !empty($row['theme_image'])) && file_exists($completePath) ?
                                "<img src='themeimage_uploads/" . $row['theme_image'] . "' style='max-height: 200px;' alt='Image Not found'>": "
                                <svg class='bd-placeholder-img card-img-top' width='100%' height='200'
                                                xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail'
                                                preserveAspectRatio='xMidYMid slice' focusable='false'>
                                                <title>Placeholder</title>
                                                <rect width='100%' height='100%' fill='#55595c' /><text x='50%' y='50%' fill='#eceeef'
                                                    dy='.3em'>ONTRAD IMAGE</text>
                                            </svg>";
                                echo "            
                                            <div class='card-body'>
                                                <h4> ".$row['theme_title']."</h4>
                                                <p class='card-text'>".substr($row['theme_info'], 0, 50)."...</p>
                                            </div>
                                            <div class='card-footer' style='background-color: white;'>
                                                <a href='theme1.php?id=" . base64_encode($row['id']) . "' class='btn btn-sm btn-outline-secondary'>View Page</a>
                                            </div>
                                        </div>
                                    </div><!-- End of songcard -->
                                ";
                            }
                        }
                    ?>   
                </div>
                <?php
                // Pagination on themes Section
                    $sql1 = "SELECT * FROM `themes` WHERE `status` = 'Featured'";
                    $result1 = mysqli_query($conn, $sql1);

                    if(mysqli_num_rows($result1)>0){
                    $totalRecords = mysqli_num_rows($result1);
                    $totalPages = ceil($totalRecords / $limit);
                    $pageLimit = 4;
                    echo "<ul class='pagination mt-3'>";
                    if($page>1){
                        echo  "<li><a class='page-link' href='index.php?themePage=".($page-1)."&status=themes'><i class='fa-solid fa-chevron-left'></i>  Previous</a></li>";
                        if($page>=$pageLimit){
                            echo "<li class='listStyle'>...</li>";
                        }
                    }

                    $startPage = max(1, $page - 2);
                    $endPage = min($totalPages, $startPage + $pageLimit - 1);
                    for($i = $startPage; $i <= $endPage; $i++){
                        if($i==$page){
                        $active = "active";
                        }else{
                        $active = " ";
                        }

                    echo  "<li class='".$active."'><a class='page-link' href='index.php?themePage=".$i."&status=themes'>".$i."</a></li>";
                        
                    }
                    if($page<$pageLimit){
                        if($totalPages>4){
                            echo "<li class='listStyle'>...</li>";
                        }
                        echo  "<li><a class='page-link' href='index.php?themePage=".($page+1)."&status=themes'>Next  <i class='fa-solid fa-chevron-right'></i></a></li>";
                    }
                    echo "</ul>";
                    }

                ?>
            </div>
        </div>
    </div>
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
            <button type="button" class="button1" data-toggle="modal" data-target="#dropline">
                Drop us a line
            </button>
        </div>
        <!-- The Modal -->
        <div class="modal" id="dropline">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="alert alert-light m-3" style="padding: 3% 10% 3% 10%">
                        <p style="text-align: center;">
                            <img src="images/ontradlogo160px.jpg" style="text-align: center;">
                            <hr>
                            We welcome your comments and suggestions
                        </p>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <input class="form-control" style="width: 100%;" id="name" name="name"
                                    placeholder="Name" type="text" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <input class="form-control" id="email" name="email" placeholder="Email" type="email"
                                    required>
                            </div>
                        </div>
                        <textarea class="form-control" id="comments" name="comments" placeholder="Comment"
                            rows="5"></textarea><br>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button class="button1 pull-right" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div style="text-align: center;">
            <p><small>- CREATED BY BUSINESSLORE -</small>
            </p>
        </div>
    </div>
    <!--end of contact-->
    </div>
    <!--end of wrapper-->
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




    </script>
</body>

</html>