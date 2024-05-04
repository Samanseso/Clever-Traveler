    <?php 
    require_once ('config/db.php');

    $category1_query = "select distinct sub_cat from place_info";
    $category1_result = mysqli_query($conn, $category1_query);

    $category2_query = "select distinct sub_cat from place_info";
    $category2_result = mysqli_query($conn, $category2_query);

    ?>



    <header class="row d-flex justify-content-between align-items-center mt-3 mb-5 position-relative z-3">
        <div class="col-sm-5 d-flex justify-content-between align-items-center">
            <a id="logo" href="index.php" class="d-flex align-items-center"><img src="css/images/logo.png" alt="" width="30px"></a>
            <form class="top-search-bar input-group" action="./filter.php" method="post">
                <div id="overlay"></div>
                <input type="text" class="search-input form-control px-3 py-3 fs-4" name="filter" placeholder="Search places" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="search-btn btn btn-outline-secondary bg-light px-4 fs-4" type="submit" id="button-addon"><i class="icon fa-solid fa-magnifying-glass"></i></button>
            </form>

            <div id="mySidenav" class="sidenav d-block d-sm-none">
                <nav>
                        <hr style="color: #ffffff;width: 90%; margin: auto; margin-bottom: 15px; margin-top: 70px">
                        <a href="index.php">HOME</a>
                        <a href="about.php">ABOUT</a>
                        <a href="filter.php?filter=discover">DISCOVER</a>
                        <a class="btn btn-info" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">CATEGORIES</a>
                        <div class="collapse ms-5" id="collapseExample">
                        <?php
                            while ($category = mysqli_fetch_assoc($category1_result)) {
                            echo '<a class href="category.php?cat=' . $category['sub_cat'] . '">' . $category['sub_cat'] . '</a>';
                            }
                        ?>
                        </div>
                        <a href="filter.php?filter=popular">POPULAR</a>
                        <a href="filter.php?filter=top_destinations">TOP DESTINATIONS</a>
                        <a href="filter.php?filter=recommended">RECOMMENDED</a>
                        <a href="filter.php?filter=trending">TRENDING</a>
                        <a href="filter.php?filter=contact_us">CONTACT US</a>
                </nav>
            </div>
            <!-- element to open the sidenav -->
            <span onclick="openNav()"><i class="d-block d-sm-none icon fa-solid fa-bars"></i></span>
        </div>
        <nav class="col-sm-7 d-none d-sm-block text-end">
            <ul class="d-flex justify-content-end align-items-center mb-0">
                <a class="ms-2 ms-md-4 text-decoration-none text-dark fs-4" href="index.php">HOME</a>
                <a class="ms-2 ms-md-4 text-decoration-none text-dark fs-4" href="filter.php?filter=discover">DISCOVER</a>
                <div class="dropdown d-flex flex-direction-column align-items-center">
                    <a class="dropdown-toggle ms-2 ms-md-4 text-decoration-none text-dark fs-4" href="#" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        CATEGORIES
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php
                            while ($category2 = mysqli_fetch_assoc($category2_result)) {
                                echo '<li><a class="dropdown-item fs-4" href="category.php?cat=' . $category2['sub_cat'] . '">' . $category2['sub_cat'] . '</a></li>';
                            }
                        ?>
                    </ul>
                </div>
                <a class="ms-2 ms-md-4 text-decoration-none text-dark fs-4" href="#">CONTACT US</a>
            </ul>
        </nav>
        </header>

    <style>
        #overlay {
            position: fixed; /* Sit on top of the page content */
            display: none; /* Hidden by default */
            width: 100vw; /* Full width (cover the whole page) */
            height: 100vh; /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5); /* Black background with opacity */
            z-index: 3; /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer; /* Add a pointer on hover */
        }

        .search-btn::before {
            content: '';
        }

        .sidenav {
            font-family: "Roboto", sans-serif;
            font-weight: 100;
            height: 100%; /* 100% Full-height */
            width: 70vw; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 4; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 100%;
            background-color: rgb(8, 15, 56); /*#676852*/ ; 
            overflow-x: hidden; /* Disable horizontal scroll */    
            padding-top: 10px; /* Place content 20px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
        }

        
        /* The navigation menu links */
        .sidenav nav a {
            font-family: "Roboto", sans-serif;
            text-decoration: none;
            font-size: 4vw;
            width: 0px;
            color: #f5f5f5;
            display: block;
            transition: 0.3s;
            text-indent: 15px;
            padding: 5px 0
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
            color: #f5f5f5;
            opacity: 0.5;
        }

        #nav_sign_in {
            width: 80%;
            background-color: #f5f5f5;
            color: black !important;
            padding: 0;
            margin: 25px auto 10px auto;
            border: none;
            font-size: 4vw;
            padding: 5px 0;
            border-radius: 25px;
        }

        header nav  a {
            white-space: nowrap;
        }

        .page1 header {
            height: 5vh !important;
        }

        .page1 #logo {
            mix-blend-mode: darken;
        }

        .top-search-bar {
            margin: 0 2rem !important;
        }
        .top-search-bar .search-input {
            border-top-left-radius: calc(infinity * 1px) !important;
            border-bottom-left-radius: calc(infinity * 1px) !important;
        }

        .top-search-bar button {
            border-top-right-radius: calc(infinity * 1px);
            border-bottom-right-radius: calc(infinity * 1px);
        }

    </style>