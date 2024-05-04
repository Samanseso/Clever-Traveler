<?php
    session_start();
    require_once("config/db.php");

    $place_id = 'default';

    if (isset($_GET['place_id'])) {
        $place_id = $_GET['place_id'];
    }

    $check_query = "select * from place_info where place_id = '" . $place_id . "'";
    $check_result = mysqli_query($conn, $check_query);
    $check_row = mysqli_fetch_assoc($check_result);

    $recommended_query = "select * from place_info where popular = 1";
    $recommended_result = mysqli_query($conn, $recommended_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clever Traveler</title>

    <link rel="stylesheet" href="css/style_check_out.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link type="image/png" rel="icon" href="css/images/logo.png"/>

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!--Font Awsome-->
    <script src="https://kit.fontawesome.com/acb62c1ffe.js" crossorigin="anonymous"></script>

    <!--Google Fonts-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

    <!--Swiper-->
    <script src="https://kit.fontawesome.com/acb62c1ffe.js" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
    <div class="loading">
        <div class="spinner-border text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div id="page-contaier">
        <div class="page page1 m-3">
            <?php include('header.php'); ?>

            <main class="">
                <div class="d-flex flex-column flex-lg-row gap-5">
                    <aside class="w-100">
                     <?php echo '<img class="rounded-4 h-100 w-100" src="'. $check_row['photo1'] . '" alt="">'?>
                    </aside>
                    <article class="w-100">
                        <h1 class="display-1"><?php echo $check_row['name'];?></h1>
                        <div class="rating fs-4 d-flex align-items-center">
                            <div class="stars me-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="count fs-3">(11234)</p>
                        </div>
                        <div class="fs-3">
                        <?php
                            echo '<a href="#" class="text-dark">';
                            echo $check_row['main_cat'];
                            echo '</a>&nbsp;/&nbsp;';
                            echo '<a href="category?cat=' . $check_row['sub_cat'] . '" class="text-dark">';
                            echo $check_row['sub_cat'];
                            echo '</a>';
                        ?>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between flex-column flex-sm-row-reverse gap-5">
                            <div class="w-50 mx-auto">
                                <form action="./trip.php" method="post">
                                    <?php echo '<a href="trip.php?place_id=' . $place_id . '" class="rounded border-0 btn btn-primary mt-sm-5 fs-3 px-3 py-2 bg-info w-100 mx-auto">Start Trippin&#039;</a>';?>
                                </form>
                                <p class="d-block w-100 text-center text-nowrap fs-4">Open now <?php echo $check_row['open_time'] .  ' - ' . $check_row['close_time'];?></p>
                            </div>
                                
                            <div class="about w-100 w-sm-75 mt-2 mt-lg-5">
                                <div class="about-text text-start">
                                    <h3 class="fs-1">About</h3>
                                    <div>
                                        <div class="about-backdrop"></div>
                                        <p class="text fs-3"><?php echo $check_row['about'];?></p>
                                    </div>
                                </div>
                                <button onclick="aboutSLideDown()" class="btn fs-3 d-block mx-auto px-5 py-2 border rounded">Read More</button>
                            </div>
                        </div>
    
                        <div class="mt-2 mt-lg-5">
                            <h3 class="fs-1 mb-3 mt-5">Map</h3>
                            <?php echo '<iframe src="' . $check_row['map_link'] . '" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';?>
                        </div>

                        <div class="page page-2 reviews mt-2 mt-lg-5">
                            <h3 class="fs-1 mt-5 mb-5">Ratings and reviews</h3>
                            <div class="wrapper mt-5 d-flex">
                                <div class="avrerage me-3">
                                    <p class="m-0" style="font-size: 6.3rem; line-height: 6rem;">4.5</p>
                                     <div class="fs-4">
                                        <div class="stars d-flex justify-content-between my-2 my-sm-3">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <p class="count fs-3 pt-2 pt-sm-1">(11234)</p>
                                    </div> 
                                </div>
                                <div class="graph fs-4 w-100">
                                    <table>
                                        <tr><td class="num">5</td><td><div class="bar bar1"></div></td></tr>
                                        <tr><td class="num">4</td><td><div class="bar bar2"></div></td></tr>
                                        <tr><td class="num">3</td><td><div class="bar bar3"></div></td></tr>
                                        <tr><td class="num">2</td><td><div class="bar bar4"></div></td></tr>
                                        <tr><td class="num">1</td><td><div class="bar bar5"></div></td></tr>
                                    </table>
                                </div>
                            </div>
                
                            <div class="mt-5 fs-4">
                                <div class="my-3">
                                <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex fs-2 align-items-center gap-3">
                                            <i class="icon fa-solid fa-user"></i>
                                            <p class="m-0">Lorem Ipsum</p>
                                        </div>
                                        <p class="m-0">08/03/2024</p>
                                    </div>
                            
                                    <div class="mb-3">
                                        <div class="stars">
                                            <i class="icon fa-solid fa-star"></i>
                                            <i class="icon fa-solid fa-star"></i>
                                            <i class="icon fa-solid fa-star"></i>
                                            <i class="icon fa-solid fa-star"></i>
                                            <i class="icon fa-solid fa-star"></i>
                                        </div>
                                    </div>
                            
                                    <p class="fs-4">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing 
                                        elit, sed do eiusmod tempor incididunt ut labore et 
                                        dolore magna aliqua.
                                    </p>

                                    <div class="text-secondary d-flex gap-3">
                                        <p>Like</p>
                                        <p>Dislike</p>
                                    </div>
                                </div>
                
                                <div class="mt-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex fs-2 align-items-center gap-3">
                                            <i class="icon fa-solid fa-user"></i>
                                            <p class="m-0">Lorem Ipsum</p>
                                        </div>
                                        <p class="m-0">08/03/2024</p>
                                    </div>
                            
                                    <div class="mb-3">
                                        <div class="stars">
                                            <i class="icon fa-solid fa-star"></i>
                                            <i class="icon fa-solid fa-star"></i>
                                            <i class="icon fa-solid fa-star"></i>
                                            <i class="icon fa-solid fa-star"></i>
                                            <i class="icon fa-solid fa-star"></i>
                                        </div>
                                    </div>
                            
                                    <p class="fs-4">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing 
                                        elit, sed do eiusmod tempor incididunt ut labore et 
                                        dolore magna aliqua.
                                    </p>

                                    <div class="text-secondary d-flex gap-3">
                                        <p>Like</p>
                                        <p>Dislike</p>
                                    </div>
                                </div>

                                <a href="#"><button class="btn py-2 px-5 fs-4 d-block mx-auto rounded border">See all</button></a>
                
                
                            </div>
                        </div>

                        <div class="mt-5">
                            <h3 class="fs-1 mb-3">Contribute</h3>
                            <div class="btns d-flex gap-4">
                                <a href="#" class="btn btn-info py-2 w-100 fs-4 text-light">Write a review</a>
                                <a href="#" class="btn btn-info py-2 w-100 fs-4 text-light">Upload photos</a>
                            </div>
                        </div>
                        

                        <div class="mt-5">
                            <div class="d-flex justify-content-between align-items-center my-3">
                            <h3 class="display-6 fw-normal fw-bold">Recommended places</h3>
                                <div class="recommended-swiper-control d-flex">
                                    <div class="recommended-swiper-button-prev slider-arrow bg-info text-light me-3">
                                        <i class="fa-solid fa-angle-left"></i>
                                    </div>
                                    <div class="recommended-swiper-button-next slider-arrow bg-info text-light">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper recommended-swiper mt-5 fs-3">
                                <div class="swiper-wrapper fs-4">
                                <?php
                                    while ($recommended = mysqli_fetch_assoc($recommended_result)) {
                                ?>
                                    <div class="card p-2 swiper-slide border rounded-4">
                                        <?php echo '<img class="card-img-top rounded-4" src="'. $recommended['photo1'] . '" alt="">'?>
                                        <div class="card-body p-3">
                                            <div class="card-title d-flex justify-content-between">
                                                <p class="fs-2"><?php echo $recommended['name'] ?></p>
                                                <i class="fa-regular fa-heart fs-2 pt-2"></i>
                                            </div>
                                            <div class="card-text mb-3">
                                            <p><?php echo $recommended['about'] ?></p>
                                            </div>
                                            <form action="./check_out.php" method="post">
                                                <?php echo '<a href="check_out.php?place_id=';
                                                    echo $recommended['place_id'];
                                                    echo '" class="btn btn-info text-center fs-4 text-light rounded-5 px-5" id="updateButton">Explore</a>'; 
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                </div>
                            </div>
                        </div>

                        


                    </article>
                </div>
            </main>
        </div>
        <div class="page page1">
          <?php include('footer.php') ?>
      </div>
    </div>
</body>
<script>
    window.onload = function () {
        document.querySelector('.loading').style.display = 'none';
    }
    var popular_swiper = new Swiper(".recommended-swiper", {
    slidesPerView: 'auto',
    spaceBetween: 15,
    freeMode: true,

    navigation: {
      nextEl: ".recommended-swiper-button-next",
      prevEl: ".recommended-swiper-button-prev",
    },
  });



</script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>