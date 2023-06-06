<?php
  session_start();
  if (isset($_SESSION['restaurantID'])) {
      $restaurantID = $_SESSION['restaurantID'];
      if (isset($_SESSION['email'])) {
        // User is logged in
        $email = $_SESSION['email'];
    }
  } else {
      echo "Restaurant ID is not set.";
  }
  include '../php/DBConnector.php';
  $sql = "SELECT *, ROUND(AVG(rating)) AS average_rating, COUNT(*) AS review_count FROM ratings NATURAL JOIN restaurants WHERE restaurant_id = '$restaurantID'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $restaurantName = $row['name'];
  $banner = $row['banner'];
  $description = $row['description'];
  $address = $row['address'];
  $openingTime = $row['open_time'];
  $rating = $row['average_rating'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/crave ins icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/restaurant.css">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">
    <script src="https://kit.fontawesome.com/51f7eec72a.js" crossorigin="anonymous"></script>

    <title>Restaurant Page</title>
</head>
<body>
    <header>
    <?php include '../html/navbar.php' ?>
    </header>
    <div id="restaurant-banner">
        <h2 id="restaurant-title" style="position:absolute; font-size:4em; top:250px; left:50px; font-family: 'DM Sans', sans-serif; color: white; text-shadow: 0px 7px 4px rgba(0, 0, 0, 0.65);">
          <?php echo $restaurantName; ?>
        </h2>
        <img src="<?php echo $banner ?>" alt="banner" id="restaurant-banner">
        <a href="../html/home.html.php">
            <button id="restaurant-backButton"> << Back </button>
        </a>
    </div>
    <div id="restaurant-restaurantInfo-container">
        <div id="restaurant-clickables">
            <a href="../html/menu.html.php">
                <button id="restaurant-menuButton">Menu <i class="fa fa-list-alt"></i></button>
            </a>
            <a href="../html/review.html.php">
                <button id="restaurant-reviewButton"> Write a Review <i class="fa fa-commenting-o"></i></button>
            </a>
            <form method="GET"><button type="submit" id="restaurant-followButton" name="follow"> Follow <i class="fa fa-heart" aria-hidden="true"></i></button></form>
            <?php 
              if(isset($_GET['follow'])){
                $sql = "SELECT * FROM favorites WHERE email_address = '$email' AND restaurant_id = '$restaurantID'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                  echo "<script>alert('You are already following this restaurant.')</script>";
                  echo "<script>document.getElementById('restaurant-followButton').innerHTML = 'Followed';</script>";
                } else {
                  $sql = "INSERT INTO favorites (email_address, restaurant_id) VALUES ('$email', '$restaurantID')";
                  $result = mysqli_query($conn, $sql);
                  echo "<script>alert('You are now following this restaurant.');</script>";
                  echo "<script>document.getElementById('restaurant-followButton').innerHTML = 'Followed';</script>";
                }
              }
            ?>
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
          $sql = "SELECT *,name, lastname, profpic FROM ratings NATURAL JOIN users WHERE restaurant_id = '$restaurantID' ORDER BY RAND() LIMIT 4";
      
          $result = mysqli_query($connect, $sql);
      
          $json_array = array();
      
          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  $json_array[] = $row;
              }
              $reviews = json_encode($json_array);
              echo "<script> var reviewInfo = " . json_encode($json_array) . ";</script>";
          } else {
              echo '<script>console.log(array());</script>';
          }
        ?>
        </div>
    </div>
</body>
<script src="../js/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/restaurant.js"></script>
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