<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/crave ins icon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/results.css">

        <title>Results Page</title>
    </head>
    <body>
        <header>
            <img id="logoName" class="logo" src="../images/crave_ins_logo_name2.png" alt="Crave Ins Logo" width="200px">
            <div class="navbar">
                <a href="home.html.php">Home</a>
                <div class="dropdown">
                <button class="dropbtn">Categories
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#" id="dropdown-choice">Cafe</a>
                    <a href="#" id="dropdown-choice">Carinderia</a>
                    <a href="#" id="dropdown-choice">Restaurant</a>
                    <a href="#" id="dropdown-choice">Bakery</a>
                    <a href="#" id="dropdown-choice">Pizzeria</a>
                    <a href="#" id="dropdown-choice">Snack Haus</a>
                </div>
                </div>
                <a href="../html/about.html.php">About</a>
                <a href="../html/favorites.html.php">Favorites</a>
                <a href="../html/myprofile.html.php"><i class="fa fa-user"></i> Profile</a>
            </div>
                <a href="../html/home.html.php">
                    <button id="backButton" onclick="history.back()"> << Back</button>
                </a>      
        </header>
        <main>
            <div id="filters-container">
                <h3 id="filter-title">Filters <i class="fa fa-filter" aria-hidden="true"></i></h3>
                <p id="filter-subtitle1">Price range</p>
                <input type="range" min="0" max="500" value="50"  id="myRange">
                <span id="slider-value"></span>
                <p id="filter-subtitle2">Rating</p>
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
                <hr>
                <div id="filter-links">
                    <a href="../html/recommended.html.php">
                        <button class="filter-button"> Recommended</button>
                    </a>
                    <a href="../html/highest-rated.html.php">
                        <button class="filter-button"> Highest Rated</button>
                    </a>
                    <a href="../html/most-reviewed.html.php">
                        <button class="filter-button"> Most Reviewed</button>
                    </a>
                </div>

            </div> 
            <div id="results-container"> 
                <!-- create a search button with a heading text beside it -->
                <div id="search-container">
                    <span id="subtext">Results for </span><br> <span id="query"></span>
                    <?php
                    if(isset($_GET['home-search'])) {
                        $query = $_GET['home-search'];
                        $landmark = $_GET['landmark'];
                        $query = $query . '' . $landmark;  
                    } else if(isset($_GET['category'])){
                        $query = $_GET['category'];
                    }  else if(isset($_GET['tags'])){
                        $query = $_GET['tags'];
                    } else if(isset($_GET['rating'])) {
                        $query = $_GET['home-search'];
                    }
                    ?>
                    <form id="search-form" onsubmit="searchData(event)">
                        <input type="text" id="search-query" name="search" placeholder="Search" value="<?php echo $query ?>">
                        <button type="submit" id="search-button"><i class="fa fa-search"></i></button>
                    </form>

                </div>  
                <div id="results"></div>    
            </div>    
        </main>
        <footer>
             <div id="tagline">
                <span class="tagline">With &nbsp;<span class="crave">crave ins</span><br>your cravings will be satisfied.</span>
             </div>
             <div class="footer-details">
                <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> Miagao, Iloilo</div><br>
                <div class="email"><i class="fa fa-inbox" aria-hidden="true"></i> KKK@gmail.com</div>
            </div>
            <br>
            <hr id="footer-hr">
            <div class="footbar">
                <a class="HOME" href="../html/home.html">Home</a>
                <a class="ABOUT" href="../html/about.html">About</a>
                <a class="CONTACT" href="../html/about.html">Contact Us</a>
            </div>
            <div class="copyright"> 
                <div class="copyrightdetails"><i class="fa fa-copyright" aria-hidden="true"></i> 2023 KKK Team. All Rights Reserved.</div>
            </div> 
        </footer>
    </body>
    <script src="../js/results.js"></script>

</html>
