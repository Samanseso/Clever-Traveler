<?php
  require_once ('config/db.php');

  $category_query = "select distinct sub_cat from place_info";
  $category_result = mysqli_query($conn, $category_query);

  $featured_query = "select * from place_info where featured = 1";
  $featured_result = mysqli_query($conn, $featured_query);

  $popular_query = "select * from place_info where popular = 1";
  $popular_result = mysqli_query($conn, $popular_query);

  $top_query = "select * from place_info where top = 1";
  $top_result = mysqli_query($conn, $top_query);

  $trending_query = "select * from place_info where trending = 1";
  $trending_result = mysqli_query($conn, $trending_query);

  $recommended_query = "select * from place_info where recommended = 1";
  $recommended_result = mysqli_query($conn, $recommended_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clever Traveler</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link type="image/png" rel="icon" href="css/images/logo.png"/>

  <!--Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!--Font Awsome-->
  <script src="https://kit.fontawesome.com/acb62c1ffe.js" crossorigin="anonymous"></script>

  <!--Google Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!--Swiper-->
  <script src="https://kit.fontawesome.com/acb62c1ffe.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="loading">
    <div class="spinner-border text-info" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  <div id="page-contaier">
    <div class="page1 mx-3 mt-3 ">
      <?php include('header.php') ?>
      <main class="position-relative text-center text-md-start rounded-4">

        <div class="swiper featured-swiper position-relative">

          <div class="title ps-lg-4 w-100 position-absolute w-100">
            <article>
              <h1 class="z-3 position-relative text-left display-1 text-light fw-bolder mt-5 mb-6">Clever Traveler</h1>
            </article>
            <p class="z-3 position-relative lead fs-3 text-light mt-0 mb-4 fst-italic">Guide to your adventures</p>
            <a href="categories.php?cat=discover" class="z-3 position-relative btn btn-light px-4 py-2 my-4 fs-3">Discover places</a>
          </div>

          <div class="z-3 text-light position-absolute w-100">
            <div class="featured-swiper-control d-flex justify-content-center">
              <div class="featured-swiper-button-prev slider-arrow text-light me-3">
                <i class="fa-solid fa-angle-left"></i>
              </div>
              <div class="featured-swiper-button-next slider-arrow text-light">
                <i class="fa-solid fa-angle-right"></i>
              </div>
            </div>
          </div>


          <div class="z-3 position-absolute search-mobile d-md-none w-100 bottom-0">
            <ul class="d-flex justify-content-between mx-auto nav nav-pills w-75 bg-secondary rounded-top" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active text-light px-2 w-100 fs-4" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Places</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link text-light px-2 w-100 fs-4" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Hotels</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link text-light px-2 w-100 fs-4" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Activities</button>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="search-bar input-group mx-auto w-75">
                  <input type="text" class="form-control p-3 rounded-0 border-0 fs-4" placeholder="Where to go?" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary px-4 bg-info  border-0 fs-4" type="button" aria-activedescendant=""id="button-addon2"><i class="icon fa-solid fa-magnifying-glass"></i></button>
                </div>
              </div>
              <div class="tab-pane" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="search-bar input-group mx-auto w-75">
                  <input type="text" class="form-control p-3 border-0 fs-4" placeholder="Where to stay?" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary px-4 bg-info border-0 fs-4" type="button" id="button-addon3"><i class="icon fa-solid fa-magnifying-glass"></i></button>
                </div>
              </div>
              <div class="tab-pane" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="search-bar input-group mx-auto w-75">
                  <input type="text" class="form-control p-3 border-0 fs-4" placeholder="What to do?" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary px-4 bg-info border-0 fs-4" type="button" id="button-addon4"><i class="icon fa-solid fa-magnifying-glass"></i></button>
                </div>
              </div>
            </div>
          </div>

          <footer class="z-3 position-absolute w-100 bottom-0">
            <div class="search-desktop d-none d-md-block">
              <div class="search-bar input-group w-75 rounded-2 bg-light p-4 mx-auto">
                <div class="form-floating me-1">
                  <input type="email" class="form-control bg-light border-0 fs-5" id="floatingInput1" placeholder="name@example.com">
                  <label for="floatingInput1" class="fs-5"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Where to go?</label>
                </div>
                <div class="form-floating me-1">
                  <input type="email" class="form-control bg-light border-2 border-top-0 border-bottom-0 fs-5" id="floatingInput2" placeholder="name@example.com">
                  <label for="floatingInput2" class="fs-5"><i class="fa-solid fa-hotel"></i>&nbsp;&nbsp;Where to stay?</label>
                </div>
                <div class="form-floating me-1">
                  <input type="email" class="form-control bg-light border-0 fs-4" id="floatingInput3" placeholder="name@example.com">
                  <label for="floatingInput3" class="fs-5"><i class="fa-solid fa-person-swimming"></i>&nbsp;&nbsp;What to do?</label>
                </div>
                <button class="btn btn-outline-secondary fs-5 px-4 bg-info border-0 border-left rounded-2" type="button" id="button-addon5"><i class="icon fa-solid fa-magnifying-glass"></i></button>
              </div>
            </div>
          </footer>

          <div class="swiper-wrapper">
            <?php
              while ($featured = mysqli_fetch_assoc($featured_result)) {
            ?>
            <div class="swiper-slide">
              <div class="mask w-100 h-100 rounded-5"></div>
              <div class="content">
                <h3 class="display-2"><?php echo $featured['name'] ?></h3>
                <p class="fs-3">40&deg; Cloudy</p>
              </div>
              <?php 
                echo '<img class="rounded-5" src="';
                echo $featured['photo1'];
                echo '" alt="">';
              ?>
            </div>
            <?php
              }
            ?>
          </div>
        </div>
      </main>
    </div>








    <!--PAGE 2-->

    <div class="page page2 mx-3 mt-3">
      <div class="d-flex justify-content-between align-items-center my-3">
        <h3 class="display-6 fw-bold">Select Categories</h3>
        <div class="category-swiper-control d-flex">
          <div class="category-swiper-button-prev slider-arrow bg-info text-light me-3">
            <i class="fa-solid fa-angle-left"></i>
          </div>
          <div class="category-swiper-button-next slider-arrow bg-info text-light">
            <i class="fa-solid fa-angle-right"></i>
          </div>
        </div>
      </div>

      <div class="swiper category-swiper">
        <div class="swiper-wrapper">
          <?php
            while ($category = mysqli_fetch_assoc($category_result)) {
          ?>

          <?php echo '<a href="category.php?cat='. $category['sub_cat'] . '" class="swiper-slide border rounded-3 text-center text-decoration-none text-dark">'; ?>

            <div>
              <?php 
              echo '<img class="mb-3" src="https://res.cloudinary.com/dnh983x7s/image/upload/f_auto,q_auto/v1/icons/';
              echo $category['sub_cat'];
              echo '" width="64" height="64">';
              ?>
              <p class="mb-0 fs-4"><?php echo $category['sub_cat'] ?></p>
              <p class="mb-0 fs-6">1234 Found</p>
            </div>
          </a>

          <?php
            }
          ?>
        </div>
      </div>
    </div>




    <!--PAGE 3-->

    <div class="page page3 mt-3 mx-3">

      <div class="d-flex justify-content-between align-items-center my-3">
        <h3 class="display-6 fw-normal fw-bold">Popular destinations</h3>
        <div class="category-swiper-control d-flex">
          <div class="popular-swiper-button-prev slider-arrow bg-info text-light me-3">
            <i class="fa-solid fa-angle-left"></i>
          </div>
          <div class="popular-swiper-button-next slider-arrow bg-info text-light">
            <i class="fa-solid fa-angle-right"></i>
          </div>
        </div>
      </div>

      <div class="swiper popular-swiper">
        <div class="swiper-wrapper fs-4">
          <?php
            while ($popular = mysqli_fetch_assoc($popular_result)) {
          ?>

            <div class="card p-2 swiper-slide border rounded-4">
              <?php echo '<img class="card-img-top rounded-4" src="'. $popular['photo1'] . '" alt="">'?>
              <div class="card-body p-3">
                <div class="card-title d-flex justify-content-between">
                  <p class="fs-2"><?php echo $popular['name'] ?></p>
                  <i class="fa-regular fa-heart fs-2 pt-2"></i>
                </div>
                <div class="card-text mb-3">
                  <p><?php echo $popular['about'] ?></p>
                </div>
                <form action="./check_out.php" method="post">
                    <?php echo '<a href="check_out.php?place_id=' . $popular['place_id'] . '" class="btn btn-info text-center fs-4 text-light rounded px-5">Explore</a>';?>
                </form>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>




    <!--Page 4-->
    <div class="page page4 mt-3 mx-3">
    <div class="d-flex justify-content-between align-items-center my-3">
        <h3 class="display-6 fw-normal fw-bold">Trending this month</h3>
        <div class="category-swiper-control d-flex">
          <div class="trending-swiper-button-prev slider-arrow bg-info text-light me-3">
            <i class="fa-solid fa-angle-left"></i>
          </div>
          <div class="trending-swiper-button-next slider-arrow bg-info text-light">
            <i class="fa-solid fa-angle-right"></i>
          </div>
        </div>
      </div>

      <div class="swiper trending-swiper">
        <div class="swiper-wrapper fs-4">
          <?php
            while ($trending = mysqli_fetch_assoc($trending_result)) {
          ?>

            <div class="card p-2 swiper-slide border rounded-4"">
              <?php echo '<img class="card-img-top rounded-4" src="'. $trending['photo1'] . '" alt="">'?>
              <div class="card-body p-3">
                <div class="card-title d-flex justify-content-between">
                  <p class="fs-2"><?php echo $trending['name'] ?></p>
                  <i class="fa-regular fa-heart fs-2 pt-2"></i>
                </div>
                <div class="card-text mb-3">
                  <p><?php echo $trending['about'] ?></p>
                </div>
                <form action="./check_out.php" method="post">
                    <?php echo '<a href="check_out.php?place_id=' . $trending['place_id'] . '" class="btn btn-info text-center fs-4 text-light rounded px-5">Explore</a>';?>
                </form>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>


    
    <div class="page page5 mx-3 mt-3">
    <div class="d-flex justify-content-between align-items-center my-3">
        <h3 class="display-6 fw-normal fw-bold">Top Destinations</h3>
        <div class="category-swiper-control d-flex">
          <div class="top-swiper-button-prev slider-arrow bg-info text-light me-3">
            <i class="fa-solid fa-angle-left"></i>
          </div>
          <div class="top-swiper-button-next slider-arrow bg-info text-light">
            <i class="fa-solid fa-angle-right"></i>
          </div>
        </div>
      </div>

      <div class="swiper top-swiper">
        <div class="swiper-wrapper fs-4">
          <?php
            while ($top = mysqli_fetch_assoc($top_result)) {
          ?>

            <div class="card p-2 swiper-slide border rounded-4"">
              <?php echo '<img class="card-img-top rounded-4" src="'. $top['photo1'] . '" alt="">'?>
              <div class="card-body p-3">
                <div class="card-title d-flex justify-content-between">
                  <p class="fs-2"><?php echo $top['name'] ?></p>
                  <i class="fa-regular fa-heart fs-2 pt-2"></i>
                </div>
                <div class="card-text mb-3">
                  <p><?php echo $top['about'] ?></p>
                </div>
                <form action="./check_out.php" method="post">
                    <?php echo '<a href="check_out.php?place_id=' . $top['place_id'] . '" class="btn btn-info text-center fs-4 text-light rounded px-5">Explore</a>';?>
                </form>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>


    <div class="page page6 mt-3 mx-3">
    <div class="d-flex justify-content-between align-items-center my-3">
        <h3 class="display-6 fw-normal fw-bold">Recommended destinations</h3>
        <div class="category-swiper-control d-flex">
          <div class="reco-swiper-button-prev slider-arrow bg-info text-light me-3">
            <i class="fa-solid fa-angle-left"></i>
          </div>
          <div class="reco-swiper-button-next slider-arrow bg-info text-light">
            <i class="fa-solid fa-angle-right"></i>
          </div>
        </div>
      </div>

      <div class="swiper reco-swiper">
        <div class="swiper-wrapper fs-4">
          <?php
            while ($recommended = mysqli_fetch_assoc($recommended_result)) {
          ?>

            <div class="card p-2 swiper-slide border rounded-4"">
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
                    <?php echo '<a href="check_out.php?place_id=' . $recommended['place_id'] . '" class="btn btn-info text-center fs-4 text-light rounded px-5">Explore</a>';?>
                </form>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <?php include('footer.php'); ?>
  </div>
</body>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
  window.onload = function () {
    document.querySelector('.loading').style.display = 'none';
  }
  
  var featured_slider = new Swiper(".featured-swiper", {
    spaceBetween: 30,
    effect: "fade",
    loop: 'true',
    navigation: {
      nextEl: ".featured-swiper-button-next",
      prevEl: ".featured-swiper-button-prev",
    },
  });

  var category_swiper = new Swiper(".category-swiper", {
    slidesPerView: 'auto',
    spaceBetween: 15,
    freeMode: true,

    navigation: {
      nextEl: ".category-swiper-button-next",
      prevEl: ".category-swiper-button-prev",
    },
  });

  var popular_swiper = new Swiper(".popular-swiper", {
    slidesPerView: 'auto',
    spaceBetween: 15,
    freeMode: true,

    navigation: {
      nextEl: ".popular-swiper-button-next",
      prevEl: ".popular-swiper-button-prev",
    },
  });

  var trending_swiper = new Swiper(".trending-swiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      loop: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 300,
        modifier: 1,
        slideShadows: true,
      },

      navigation: {
        nextEl: ".trending-swiper-button-next",
        prevEl: ".trending-swiper-button-prev",
      },
  });

    var top_swiper = new Swiper(".top-swiper", {
      grabCursor: true,
      effect: "creative",
      creativeEffect: {
        prev: {
          shadow: true,
          translate: ["-20%", 0, -1],
        },
        next: {
          translate: ["100%", 0, 0],
        },
      },
      navigation: {
        nextEl: ".top-swiper-button-next",
        prevEl: ".top-swiper-button-prev",
      },
    });

    var reco_swiper = new Swiper(".reco-swiper", {
    slidesPerView: 'auto',
    spaceBetween: 15,
    freeMode: true,

    navigation: {
      nextEl: ".reco-swiper-button-next",
      prevEl: ".reco-swiper-button-prev",
    },
  });

    
</script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>