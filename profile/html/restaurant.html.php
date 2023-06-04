<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="icon" href="../images/FINAL LOGO CRAVE INS green 1.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/restaurant.css">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">
    <script src="https://kit.fontawesome.com/51f7eec72a.js" crossorigin="anonymous"></script>

    <title>Restaurant Page</title>
</head>
<body>
    <header>
        <img id="logoName" class="logo" src="../images/crave_ins_logo_name2.png" alt="Crave Ins Logo" width="200px">
        <div class="navbar">
            <a href="../html/home.html.php">Home</a>
            <div class="dropdown">
              <button class="dropbtn">Categories
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="#">Cafe</a>
                <a href="#">Carinderia</a>
                <a href="#">Restaurant</a>
                <a href="#">Bakery</a>
                <a href="#">Pizzeria</a>
                <a href="#">Snack Haus</a>
              </div>
            </div>
            <a href="../html/about.html.php">About</a>
            <a href="../html/favorites.html.php">Favorites</a>
            <a href="../html/profile.html.php"><i class="fa fa-user"></i> Profile</a>
        </div>
    </header>
    <div id="restaurant-banner">
        <img src="../images/banner.png" alt="banner" id="restaurant-banner">
        <a href="../html/home.html.php">
            <button id="restaurant-backButton"> << Back </button>
        </a>
    </div>
    <div id="restaurant-restaurantInfo-container">
        <!-- <img src="../images/Restaurant Page-background.png" alt="restaurant-bg" id="restaurant-bg"> -->
        <div id="restaurant-clickables">
            <a href="../html/menu.html.php">
                <button id="restaurant-menuButton">Menu <i class="fa fa-list-alt"></i></button>
            </a>
            <a href="../html/review.html.php">
                <button id="restaurant-reviewButton"> Write a Review <i class="fa fa-commenting-o"></i></button>
            </a>
            <a href="../html/favorites.html.php">
                <button id="restaurant-followButton"> Follow <i class="fa fa-heart" aria-hidden="true"></i></button>
            </a>
        </div>
        <div id="restaurant-rating">
        </div>
        <div id="restaurant-abt">
            <span id="restaurant-abt-title"> About the Restaurant</span><br>
            <?php
            session_start();
            if (isset($_SESSION['restaurantID'])) {
                $restaurantID = $_SESSION['restaurantID'];
            } else {
                echo "Restaurant ID is not set.";
            }
            include '../php/DBConnector.php';
            $sql = "SELECT *, AVG(rating) AS average_rating, COUNT(*) AS review_count FROM ratings NATURAL JOIN restaurants WHERE restaurant_id = '$restaurantID'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $description = $row['description'];
            $address = $row['address'];
            $openingTime = $row['open_time'];
            $rating = $row['average_rating'];

            $sql = "SELECT * FROM menu where restaurant_id = '$restaurantID'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $foodName = $row['food'];
            }

            ?>
            <span id="restaurant-abt-content"><?php echo $description; ?></span>
        </div>
    </div>
    <div class="container swiper">
        <span id="restaurant-title2">Popular Picks</span>
        <div class="slide-container">
          <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="../images/showImg/healthy-foods.jpg" alt="" />
              </div>
              <div class="card-details">
                <div class="name-more">
                  <h3 class="name">Healthy <i class="fa-solid fa-leaf"></i></h3>
                  <h4 class="more"><a href="home.html" class="moreLink">See more &ensp; <i class="fa-solid fa-arrow-right"></i></a></h4>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="../images/showImg/chicken.jpg" alt="" />
              </div>
              <div class="card-details">
                <div class="name-more">
                  <h3 class="name">Chicken <i class="fa-solid fa-drumstick-bite"></i></h3>
                  <h4 class="more"><a href="results.html" class="moreLink">See more &ensp; <i class="fa-solid fa-arrow-right"></i></a></h4>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="../images/showImg/pizza.jpg" alt="" />
              </div>
              <div class="card-details">
                <div class="name-more">
                  <h3 class="name">Pizza <i class="fa-sharp fa-solid fa-pizza-slice"></i></h3>
                  <h4 class="more"><a href="results.html" class="moreLink">See more &ensp; <i class="fa-solid fa-arrow-right"></i></a></h4>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="../images/showImg/pasta.jpg" alt="" />
              </div>
              <div class="card-details">
                <div class="name-more">
                  <h3 class="name">Pasta <i class="fa-solid fa-bacon"></i></h3>
                  <h4 class="more"><a href="results.html" class="moreLink">See more &ensp; <i class="fa-solid fa-arrow-right"></i></a></h4>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="../images/showImg/drinks.jpg" alt="" />
              </div>
              <div class="card-details">
                <div class="name-more">
                  <h3 class="name">Drinks <i class="fa-solid fa-mug-hot"></i></h3>
                  <h4 class="more"><a href="results.html" class="moreLink">See more &ensp; <i class="fa-solid fa-arrow-right"></i></a></h4>
                </div>
              </div>
            </div>
          </div>
          
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <div id="restaurant-details-container">
        <h3 id="address">Address</h3>
        <span id="restaurant-address" class="restaurant-details"><?php echo $address; ?></span><br>
        <h3 id="features">Features</h3><br>
        <span id="restaurant-features" class="restaurant-details"><i class="fa-solid fa-check-square-o"></i> Affordable</span><br>
        <span id="restaurant-features" class="restaurant-details"><i class="fa-solid fa-check-square-o"></i> Provides Wifi</span><br>
        <span id="restaurant-features" class="restaurant-details"><i class="fa-solid fa-check-square-o"></i> Offers Takeout</span><br>
        <span id="restaurant-features" class="restaurant-details"><i class="fa-solid fa-check-square-o"></i> Offers Delivery</span><br>
        <h3 id="openingHours">Opening Hours</h3>
        <span id="restaurant-opening" class="restaurant-details">Opens (<?php echo $openingTime; ?>)</span><br>
        <span id="restaurant-opening" class="restaurant-details">Monday-Thursday & Saturday-Sunday</span>
    </div>
    <div id="restaurant-featuredReviews">
        <h3 id="restaurant-title3">Featured Reviews</h3>
        <div id="restaurant-review-container">
            <div id="review1" class="review">
                <div id="reviewContent">
                    “The customer service is superb and I really wanted to go back again the moment I left the place."<br>
                </div>
                <div id="reviewer">
                    <img id="reviewerPic" src="../images/picture.png" alt="Reviewer Picture">
                    <div id="reviewerInfo">
                        <span id="reviewerName">Niall Horan</span><br>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                    </div>
                </div>
            </div>
            <div id="review2" class="review">
                <div id="reviewContent">
                    “Wow what a great place! I was really satisfied with their delicious meals and drinks.”<br>
                </div>
                <div id="reviewer">
                    <img id="reviewerPic" src="../images/picture.png" alt="Reviewer Picture">
                    <div id="reviewerInfo">
                        <span id="reviewerName">Harry Styles</span><br>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star"></span>
                        <span id="rating" class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div id="review3" class="review">
                <div id="reviewContent">
                    “To die for! I would definitely go here everyday. I also recommend their chocolate milo lava and their set meals!!<br>
                </div>
                <div id="reviewer">
                    <img id="reviewerPic" src="../images/picture.png" alt="Reviewer Picture">
                    <div id="reviewerInfo">
                        <span id="reviewerName">Zayn Malik</span><br>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div id="review4" class="review">
                <div id="reviewContent">
                    “The customer service is superb and I really wanted to go back again the moment I left the place.”<br>
                </div>
                <div id="reviewer">
                    <img id="reviewerPic" src="../images/picture.png" alt="Reviewer Picture">
                    <div id="reviewerInfo">
                        <span id="reviewerName">Liam Payne</span><br>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star checked"></span>
                        <span id="rating" class="fa fa-star"></span>
                        <span id="rating" class="fa fa-star"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>
<script>
    document.getElementById("restaurant-rating").innerHTML = <?php echo $rating?> + "/5";
    
    // create checked stars
    for (let i = 0; i < <?php echo $rating?>; i++) {
      const star = document.createElement("span");
      star.classList.add("fa", "fa-star", "checked");
      rating.appendChild(star);
    }
  
    // create unchecked stars
    for (let i = <?php echo $rating?>; i < 5; i++) {
      const star = document.createElement("span");
      star.classList.add("fa", "fa-star");
      rating.appendChild(star);
    }
    
</script>
</html>