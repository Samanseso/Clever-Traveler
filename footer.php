<?php 
    require_once ('config/db.php');

    $category3_query = "select distinct sub_cat from place_info";
    $category3_result = mysqli_query($conn, $category3_query);

?>

<style>
        .page-footer {
            width: 100vw;
            font-family: "Roboto", sans-serif;
            font-weight: 100;
            color: white;
            background-color: #696969d1;/*#676852*/ ; 
            padding-top: 10px; /* Place content 20px from the top */
            opacity: 1 !important;
            display: flex;
            flex-wrap: wrap;
        }

        .page-footer .logo {
            filter: invert(1);
        }

        .page-footer > div,.page-footer > nav {
            width: 30rem;
        }

        
        /* The navigation menu links */
        .page-footer nav ul  li a, .collapse a {
            font-family: "Roboto", sans-serif;
            text-decoration: none;
            color: #f5f5f5;
            padding: 5px 0;
            text-indent: 0;
        }

        .page-footer ul {
            list-style-type: none;
        }

        .credits ul {
            padding: 5px 0;
        }

        .credits ul li a {
            font-family: "Roboto", sans-serif;
            font-weight: 100;
            color: #f5f5f5;
            text-decoration: none;
        }

        /* When you mouse over the navigation links, change their color */
        .page-footer a:hover {
            color: #f5f5f5;
            opacity: 0.5;
        }

        .page-footer a {
            white-space: nowrap;
        }

        .page-footer #logo img {
            height: 8rem !important;
            width: 8rem !important;
        }
</style>

<div class="page-footer d-flex flex-column flex-md-row justify-content-between align-items-start px-4 px-md-5 mt-3 pt-5">
    <div class="d-flex flex-column justify-content-center text-center mb-5" style="width: 35rem;">
        <a id="logo" href="index.php" class="d-flex align-items-center justify-content-center fs-3 mb-2"><img src="css/images/logo.png" alt="" width="30px"></a>
        <p>Clever Traveler is a start up website that specializes in providing comprehensive routes and directions for travelers.</p>
    </div>


    <nav class="fs-3 d-flex flex-column mb-5" style="width: 30rem;">
        <h3 class="display-5">Links</h3>

        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.html">ABOUT</a></li>
            <li><a href="index.html">DISCOVER</a></li>
            <li><a data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">CATEGORIES</a></li>
            <div class="collapse" id="collapseExample2">
            <?php
                while ($category3 = mysqli_fetch_assoc($category3_result)) {
                    echo '<a href="category.php?cat=' . $category3['sub_cat'] . '">' . $category3['sub_cat'] . '</a><br>';
                }
            ?>
            </div>
            <li><a href="index.html">POPULAR</a></li>
            <li><a href="index.html">TOP</a></li>
            <li><a href="index.html">RECOMMENDED</a></li>
            <li><a href="index.html">TRENDING</a></li>
            <li><a href="index.html">CONTACT US</a></li>
        </ul>
    </nav>

    <div class="credits d-flex flex-column fs-3" style="width: 30rem;">
        <h3 class="display-5">Built with</hr>
        <ul class="fs-3">
            <li><a href="https://getbootstrap.com/docs/5.3/getting-started/introduction/">Boostrap</a></li>
            <li><a href="https://swiperjs.com/">Swiper</a></li>
            <li><a href="https://mdbootstrap.com/">Material Design for Bootstrap</a></li>
            <li><a href="https://www.graphhopper.com/">Graphhopper</a></li>
        </ul>

        <h3 class="display-5 mt-5">Attributions</h3>
         <ul class="fs-3">
            <li><a href="https://leafletjs.com/">Leaflet</a></li>
            <li><a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a></li>
        </ul>
    </div>
    
    
</div>