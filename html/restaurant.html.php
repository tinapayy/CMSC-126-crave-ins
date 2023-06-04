<?php
  session_start();
  if (isset($_SESSION['restaurantID'])) {
      $restaurantID = $_SESSION['restaurantID'];
  } else {
      echo "Restaurant ID is not set.";
  }
  include '../php/DBConnector.php';
  $sql = "SELECT *, ROUND(AVG(rating)) AS average_rating, COUNT(*) AS review_count FROM ratings NATURAL JOIN restaurants WHERE restaurant_id = '$restaurantID'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $banner = $row['banner'];
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
                  <a href="#" onclick="searchByCategory('Cafe')">Cafe</a>
                  <a href="#" onclick="searchByCategory('Carinderia')">Carinderia</a>
                  <a href="#" onclick="searchByCategory('Restaurant')">Restaurant</a>
                  <a href="#" onclick="searchByCategory('Bakery')">Bakery</a>
                  <a href="#" onclick="searchByCategory('Pizzeria')">Pizzeria</a>
                  <a href="#" onclick="searchByCategory('Snack Haus')">Snack Haus</a>
              </div>
            </div>
            <a href="../html/about.html.php">About</a>
            <a href="../html/favorites.html.php">Favorites</a>
            <a href="../html/profile.html.php"><i class="fa fa-user"></i> Profile</a>
        </div>
    </header>
    <div id="restaurant-banner">
        <img src="<?php echo $banner ?>" alt="banner" id="restaurant-banner">
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
        <?php 
                        $restaurantID = $_SESSION['restaurantID'];
                        $connect = mysqli_connect("localhost", "root", "", "craveins_db");
                    
                        // Modify the SQL query to include the search condition
                        $sql = "SELECT *,name, lastname, profpic FROM ratings NATURAL JOIN users WHERE restaurant_id = '$restaurantID' LIMIT 4";
                    
                        $result = mysqli_query($connect, $sql);
                    
                        $json_array = array();
                    
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $json_array[] = $row;
                            }
                            $reviews = json_encode($json_array);
                            echo "<script>
                            postReview();
                            function postReview() {
                                const reviewListContainer = document.getElementById('restaurant-review-container');
                                reviewListContainer.innerHTML = '';
                                var data = JSON.parse('$reviews');
                    
                                data.forEach(function(element) {
                                    const reviewInput = element.review;
                                    const ratingData = element.rating;
                                    const reviewerNameData = element.name + ' ' + element.lastname;
                                    const reviewerPicData = element.profpic;
                    
                                    // create new review element
                                    const newReview = document.createElement('div');
                                    newReview.classList.add('review');
                                
                                    // create review content element
                                    const reviewContent = document.createElement('div');
                                    reviewContent.id = 'reviewContent';
                                    reviewContent.textContent = reviewInput;
                                
                                    // create reviewer element
                                    const reviewer = document.createElement('div');
                                    reviewer.id = 'reviewer';
                                
                                    // create reviewer picture element
                                    const reviewerPic = document.createElement('img');
                                    reviewerPic.id = 'reviewerPic';
                                    reviewerPic.src = reviewerPicData;
                                    reviewerPic.alt = 'Reviewer Picture';
                                    reviewerPic.width = '25px';
                                
                                    // create reviewer info element
                                    const reviewerInfo = document.createElement('div');
                                    reviewerInfo.id = 'reviewerInfo';
                                
                                    // create reviewer name element
                                    const reviewerName = document.createElement('span'+'br');
                                    reviewerName.id = 'reviewerName';
                                    reviewerName.textContent = reviewerNameData;
                                
                                    // create line break element
                                    const lineBreak = document.createElement('br');
                    
                                    // create rating element
                                    const rating = document.createElement('span');
                                    rating.id = 'rating';
                                
                                    // create checked stars
                                    for (let i = 0; i < ratingData; i++) {
                                    const star = document.createElement('span');
                                    star.classList.add('fa', 'fa-star', 'checked');
                                    rating.appendChild(star);
                                    }
                                
                                    // create unchecked stars
                                    for (let i = ratingData; i < 5; i++) {
                                    const star = document.createElement('span');
                                    star.classList.add('fa', 'fa-star');
                                    rating.appendChild(star);
                                    }
                                
                                    // append elements to reviewer info element
                                    reviewerInfo.appendChild(reviewerName);
                                    reviewerInfo.appendChild(lineBreak);
                                    reviewerInfo.appendChild(rating);
                                
                                    // append elements to reviewer element
                                    reviewer.appendChild(reviewerPic);
                                    reviewer.appendChild(reviewerInfo);
                                
                                    // append elements to new review element
                                    newReview.appendChild(reviewContent);
                                    newReview.appendChild(reviewer);
                                
                                    // append new review to review list container
                                    reviewListContainer.appendChild(newReview);
                    
                                    // Clear the review input
                                    document.getElementById('reviewContent').value = '';
                    
                                    // Reset star rating
                                    const starInputs = document.querySelectorAll('input[name=\'rate\']');
                                    starInputs.forEach(input => {
                                    input.checked = false;
                                    });
                                });
                            }
                            </script>";
                        } else {
                            echo '<script>console.log(array());</script>';
                        }
                    ?>
        </div>
    </div>
</body>
<script src="../js/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>
<script>
    const ratingData = <?php echo $rating; ?>

    const rating = document.getElementById("restaurant-rating");
    rating.innerHTML = createStars(ratingData);


    // Function to create checked and unchecked stars
    function createStars(ratingData) {
      let starsHTML = '';

      for (let i = 0; i < ratingData; i++) {
        starsHTML += '<span class="fa fa-star checked"></span>';
      }

      for (let i = ratingData; i < 5; i++) {
        starsHTML += '<span class="fa fa-star"></span>';
      }

      return starsHTML;
    }
      function searchByCategory(category) {
          // Redirect to the results page with the selected category as a query parameter
          window.location.href = "../html/results.html.php?category=" + encodeURIComponent(category);
      }
</script>
</html>