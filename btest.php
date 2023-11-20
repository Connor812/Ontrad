<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylestest.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Image Carousel</title>
</head>

<body>

    <div class="button-wrap">
        <button class="prev carousel-btn" onclick="scrollHorizontally(-1)" style="cursor: pointer; color:red;">❮</button>
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
                    <div class="test-card shadow p-3 mb-5 bg-body-tertiary rounded">
                        <a href="song1.php?id=<?= base64_encode(random_bytes(3)) ?>">
                            <p>
                                <?= "This is where the title of the song goes" ?>
                            </p>
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="<?= $url ?>" alt="Avatar" class="card-image-top">
                                    </div>
                                </div>
                                <div class="underneath">
                                    hello
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <button class="next carousel-btn" onclick="scrollHorizontally(1)" style="cursor: pointer; color:red;">❯</button>
    </div>
    <div class="test-card shadow bg-body-tertiary rounded" style="width: 18rem;">
        <a href="song1.php?id=<?= base64_encode(random_bytes(3)) ?>">
            <img src="<?= $url ?>" alt="Avatar" class="card-image-top" alt="try again!!!" style="width: 100%";>
            <div class="card-body p-3" style="color: black;">
                <h5 class="card-title" style="color: black"> <?= "This is where the title of the song goes" ?></h5>
                <p class="card-text pb-1">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div style="text-align: center;"><a href="#" class="btn btn-primary btn-small">sample</a></div>
            </div>
    </div>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>