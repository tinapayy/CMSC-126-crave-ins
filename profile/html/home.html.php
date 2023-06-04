<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crave Ins</title>
	<link rel="icon" type="image/png" sizes="32x32" href="images/crave ins icon.png">
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script src="https://kit.fontawesome.com/51f7eec72a.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
		<div w3-include-html="index.html"></div>

	<img id="logoName" class="logo" src="../images/crave_ins_logo_name2.png" alt="Crave Ins Logo">
	<div class="navbar">
		<a href="home.html.php">Home</a>
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
		<a href="myprofile.html.php"><i class="fa-solid fa-user"></i> Profile</a>
	</div>

	<div class="showcase-container">
		<h1 class="mainTitle" id="home">Discover Restaurants that are near you.</h1>
		<h2 class="location"><i class="fa-sharp fa-solid fa-location-dot"></i> Miagao, Iloilo</h2>
    <form id="home-search-form" action="../html/results.html.php" method="GET">
        <input type="text" id="search-query" name="home-search" placeholder="Search">
        <button type="submit" id="search-button"><i class="fa fa-search"></i></button>
    </form>

	</div>
	</header>

	<div class="dropdown2">
		<button class="dropbtn2" id="choice">Select Landmark <i class="fa fa-caret-down"></i></button>
		<div class = "forScroll">
			<div class="dropdown-content2">
				<a id="landmark-choice">UPV CFOS</a>
				<a id="landmark-choice">UPV New Admin</a>
				<a id="landmark-choice">UPV Covered Court</a>
				<a id="landmark-choice">UPV CAS</a>
				<a id="landmark-choice">UPV SOTECH</a>
				<a id="landmark-choice">Hollywood Street</a>
				<a id="landmark-choice">Miagao Church</a>
				<a id="landmark-choice">Baybay Sur</a>
				<a id="landmark-choice">Baybay Norte</a>
			</div>
		</div>
	</div>
  
  <div class="container swiper">
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
  <script src="../js/swiper-bundle.min.js"></script>
  <script src="../js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/results.js"></script>
  <script src="../js/home.js"></script>
  <script>
      function searchByCategory(category) {
          // Redirect to the results page with the selected category as a query parameter
          window.location.href = "../html/results.html.php?category=" + encodeURIComponent(category);
      }
      // JavaScript code
      document.addEventListener('DOMContentLoaded', function() {
        var landmarkChoices = document.querySelectorAll('#landmark-choice');
        landmarkChoices.forEach(function(choice) {
          choice.addEventListener('click', function() {
            var selectedLandmark = choice.innerHTML;
            sendRequest(selectedLandmark);
          });
        });
      });

      function sendRequest(landmark) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../php/search.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the server
            var response = xhr.responseText;
            // Do something with the response
            console.log(response);
          }
        };
        xhr.send('landmark=' + landmark);
      }
  </script>
</body>
</html>

    