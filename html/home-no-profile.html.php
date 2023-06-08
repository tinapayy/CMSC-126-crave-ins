<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crave Ins</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../images/crave ins icon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link rel="stylesheet" type="text/css" href="../css/navBar.css?">
  <link rel="stylesheet" type="text/css" href="../css/landmark.css?">
  <script src="https://kit.fontawesome.com/51f7eec72a.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>

  <?php include '../html/navbar-no-profile.php' ?>

	<div class="showcase-container">
		<h1 class="mainTitle" id="home-no-profile">Discover Restaurants that are near you.</h1>
		<h2 class="location"><i class="fa-sharp fa-solid fa-location-dot"></i> Miagao, Iloilo</h2>
    <!-- home.html.php -->
	</div>
	</header>

  <div class="container2 swiper">
    <div class="slide-container">
      <div class="card-wrapper swiper-wrapper">
        <div class="card swiper-slide">
          <div class="image-box">
            <img src="../images/showImg/healthy-foods.jpg" alt="" />
          </div>
          <div class="card-details">
            <div class="name-more">
              <h3 class="name">Healthy <i class="fa-solid fa-leaf"></i></h3>
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
            </div>
          </div>
        </div>
      </div>
      
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
  </div>
  </div>
  <script src="../js/swiper-bundle.min.js"></script>
  <script src="../js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/home.js"></script>

</body>
</html>

    