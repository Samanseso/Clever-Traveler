<?php
    require_once("config/db.php");

    $selected_category = 'default';

    if (isset($_GET['cat'])) {
        $selected_category  = $_GET['cat'];
    }

    

    $selected_category_query = "select * from place_info where sub_cat = '" . $selected_category  . "'";
    $selected_category_result = mysqli_query($conn, $selected_category_query);

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

  <style>
    .card {
        width: 33rem;
    }

    .card  .card-img-top {
        height: 17rem !important;
        object-fit: cover;
        object-position: center;
    }


    .card  .card-text p {
        display: -webkit-box;
        width: 100%;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }



    @media (min-width: 768px) {
        .card {
            width: 35rem;
        }

        .card  .card-img-top {
            width: 100%;
            height: 18rem !important;
        }
        
    }
  </style>
</head>

<body>
  <div class="loading">
    <div class="spinner-border text-info" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  <div class="mx-3">
   <?php include('header.php') ?>
  </div>
  <div class="w-100 text-center">
    <h1 class="display-1 fw-thin my-5"><?php echo $selected_category ?></h1>
  </div>

 

  <div class="row d-flex justify-content-around m-3">
    <?php while ($selected_category_row = mysqli_fetch_assoc($selected_category_result)) {
    ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5 card p-2 swiper-slide border rounded-4 fs-4">
        <?php echo '<img class="card-img-top rounded-4" src="'. $selected_category_row['photo1'] . '" alt="">'?>
        <div class="card-body p-3">
            <div class="card-title d-flex justify-content-between">
            <p class="fs-2"><?php echo $selected_category_row['name'] ?></p>
            <i class="fa-regular fa-heart fs-2 pt-2"></i>
            </div>
            <div class="card-text mb-3">
            <p><?php echo $selected_category_row['about'] ?></p>
            </div>
            <form action="./check_out.php" method="post">
                <?php echo '<a href="check_out.php?place_id=' . $selected_category_row['place_id'] . '" class="btn btn-info text-center fs-4 text-light rounded px-5">Explore</a>';?>
            </form>
        </div>
    </div>
    <?php } ?>
  </div>
  <?php include('footer.php') ?>
</body>
<script>
  window.onload = function () {
    document.querySelector('.loading').style.display = 'none';
  }
</script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<html>