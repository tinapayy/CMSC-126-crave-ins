<?php
    session_start();
    if(isset($_SESSION['restaurantID'])){
        $restaurantID = $_SESSION['restaurantID'];
    }
    include '../php/DBConnector.php';
    $sql = "SELECT * FROM menu NATURAL JOIN menu_items WHERE restaurant_id = $restaurantID";
    $result = mysqli_query($conn, $sql);

    $menuData = array();
    //display all the data
    while ($row = mysqli_fetch_assoc($result)) {
        $menuData[] = $row;
    }
    echo "<script>var menuData = " . json_encode($menuData) . ";</script>";
    // echo json_encode($menuData);

    $sql = "SELECT *, ROUND(AVG(rating)) AS average_rating, COUNT(*) AS review_count FROM ratings NATURAL JOIN restaurants WHERE restaurant_id = '$restaurantID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $restaurantName = $row['name'];
    $banner = $row['banner'];
    $description = $row['description'];
    $address = $row['address'];
    $openingTime = $row['open_time'];
    $rating = $row['average_rating'];

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/crave ins icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/menu.css">
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
    <span id="restaurant-title2">Full Menu</span>
    <div id="restaurant-details-container">
    </div>
</body>
<script src="../js/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/menu.js"></script>
<script>
    function searchByCategory(category) {
        // Redirect to the results page with the selected category as a query parameter
        window.location.href = "../html/results.html.php?category=" + encodeURIComponent(category);
    }
</script>
</html>