<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylestest.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Song Carousel</title>
</head>

<body>

    <div class="button-wrap p-5">
        <button class="prev carousel-btn mr-2" onclick="scrollHorizontally(-1)" style="cursor: pointer; color:gold;"><h1>❮</h1></button>
        <div class="carousel-container">
            <div class="scrollmenu scrollMenuSongs">
                <?php
                $imageURLs = [
                    'https://source.unsplash.com/200x130/?1',
                    'https://source.unsplash.com/200x130/?2',
                    'https://source.unsplash.com/200x130/?3',
                    'https://source.unsplash.com/200x130/?4',
                    'https://source.unsplash.com/200x130/?5',
                    'https://source.unsplash.com/200x130/?6',
                    'https://source.unsplash.com/200x130/?7',
                    'https://source.unsplash.com/200x130/?8',
                    'https://source.unsplash.com/200x130/?9',
                    'https://source.unsplash.com/200x130/?10'
                ];

                foreach ($imageURLs as $url) {
                ?>
                    <div class="test-card shadow bg-body-tertiary rounded" style="min-width: 200px;">
                        <a href="song1.php?id=<?= base64_encode(random_bytes(3)) ?>">
                            <img src="<?= $url ?>" alt="Avatar" class="card-image-top" style="width: 100%" alt="try again">
                            <div class="card-body p-2" style="color: black;">
                                <h6 class="card-title m-0 pb-1 " style="color: black"> <?= "This is where the title of the song goes" ?></h6>
                                <p class="small pb-2"><small>Some quick example text to build on the card title and make up the bulk of the card's content.</small></p>
                                <div style="text-align: center;">
                                    <a href="#" style="color: green;">Play sample</a>
                                </div>
                            </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <button class="next carousel-btn ml-2" onclick="scrollHorizontally(1)" style="cursor: pointer; color:gold;"><h1>❯</h1></button>
    </div>
    <script src="js/script.js"></script>
</body>

</html>