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
  <link rel="stylesheet" href="style.css">
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
  .loading {
    position: absolute;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ffffff83;
    z-index: 999;
  }

  .spinner-border {
    width: 4rem !important;
    height: 4rem !important;
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
    <h1 class="display-1 fw-thin my-5">About Us</h1>
  </div>

  <div class="d-flex flex-column w-75 mx-auto my-5 text-center">
    <div class="py-3 my-5 p-0">
        <div>
            <p class="fs-2">Clever Traveler is a leading website that specializes in providing comprehensive routes and directions for travelers.</p>
        </div>
    </div>

    <div class="py-3 my-5 p-0">
        <div class="my-3">
            <h3 class="fs-1">Background</h1>
            <p class="fs-2">Established in May 2024, Clever Traveler has been is hoping to cater the needs of wanderlust enthusiasts by offering reliable and efficient travel guidance.</p>
        </div>
        <div class="my-3">
            <h3 class="fs-1">Services</h1>
            <p class="fs-2">Our platform offers a user-friendly interface that allows users to easily plan their journeys, find the best routes, and obtain accurate directions..</p>
        </div>
    </div>

    <div class="my-5 p-0">
        <div class="my-3">
            <h3 class="fs-1">Mission</h1>
            <p class="fs-2">Our mission is to empower travelers by equipping them with the necessary tools and information to explore the world confidently and effortlessly.</p>
        </div>
        <div class=" my-3">
            <h3 class="fs-1">Vision</h1>
            <p class="fs-2">Our vision is to become the go-to platform for travelers worldwide, revolutionizing the way people navigate and experience their journeys.</p>
        </div>
    </div>
    
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