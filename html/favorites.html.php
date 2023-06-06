<?php
	session_start();
	if(!isset($_SESSION['email'])){
		header("Location: ../html/login.html.php");
	} else {
		$email = $_SESSION['email'];
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FOLLOWED</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../images/crave_ins_icon.png">
	<link rel="stylesheet" type="text/css" href="../css/followed.css">
	<link rel="stylesheet" type="text/css" href="../css/navBar.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/51f7eec72a.js" crossorigin="anonymous"></script>
	<script src="../js/followed.js"></script>
</head>

<body>
	<?php include '../html/navbar.php' ?>

	  <form role="search" id="form">
				<input type="search" id="query" name="q"
				 placeholder="Search"
				 aria-label="Search through site content">
				<button class="searchBtn">
					<i class="fa-solid fa-magnifying-glass"></i>
				</button>
		</form>

		<div class="backBtn">
			<a title="link" href="../favorites-followed-rated/favorites.html"><button id="backButton"> << Back</button></a>
		</div>  
    
	<section>
		<div class="FOLLOWEDRESTAURANTS"> FOLLOWED RESTAURANTS</div>
		<div class="FOLLOWEDRESTAURANTS-container"> 
			<?php
				include '../php/DBConnector.php';
				$sql = "SELECT * FROM favorites NATURAL JOIN restaurants WHERE email_address = '$email'";
				$result = mysqli_query($conn, $sql);

				$restaurantData = array();
				//display all the data
				while ($row = mysqli_fetch_assoc($result)) {
					$restaurantData[] = $row;
				}
				echo "<script>var restaurantData = " . json_encode($restaurantData) . ";</script>";

				$conn->close();
			?>
			<div id="card-container"></div>
		</div>
		<footer>
             <div id="tagline">
                <span class="tagline">With &nbsp;<span class="crave">crave ins</span><br>your cravings will be satisfied.</span>
             </div>
             <div class="footer-details">
                <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> Miagao, Iloilo</div><br>
                <div class="email"><i class="fa fa-inbox" aria-hidden="true"></i> KKK@gmail.com</div>
            </div>
            <br>
            <hr>
            <div class="footbar">
                <a class="HOME" href="home.html">Home</a>
                <a class="ABOUT" href="about.html">About</a>
                <a class="CONTACT" href="about.html">Contact Us</a>
            </div>
            <div class="copyright"> 
                <div class="copyrightdetails"><i class="fa fa-copyright" aria-hidden="true"></i> 2023 KKK Team. All Rights Reserved.</div>
            </div> 
     </footer>
	 <script src="../js/followed.js"></script>
	 <script>
		function searchByCategory(category) {
			// Redirect to the results page with the selected category as a query parameter
			window.location.href = "../html/results.html.php?category=" + encodeURIComponent(category);
		}
	</script>
</body>
</html>	