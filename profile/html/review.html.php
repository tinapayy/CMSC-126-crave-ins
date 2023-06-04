<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../images/FINAL LOGO CRAVE INS green 1.png" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/review.css">
        <title>Review Page</title>
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
                    <a href="#">Cafe</a>
                    <a href="#">Carinderia</a>
                    <a href="#">Restaurant</a>
                    <a href="#">Bakery</a>
                    <a href="#">Pizzeria</a>
                    <a href="#">Snack Haus</a>
                </div>
                </div>
                <a href="about.html">About</a>
                <a href="favorites.html">Favorites</a>
                <a href="profile.html"><i class="fa fa-user"></i> Profile</a>
            </div>
                <a href="restaurant.html">
                    <button id="backButton" onclick="history.back()"> << Back</button>
                </a>      
        </header>
        <main>
            <div id="reviewForm">
                <form method="POST">
                    <span id="title"> Nabi's Kitchen</span><br>
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
                    <span class="select">Select your rating</span><br>
                    <textarea id="reviewInput" name="review" rows="4" cols="50" placeholder="Write a Review"></textarea><br>
                    <button type="submit" class="postReview" name="review_btn" >Post a Review</button>
                </form>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        session_start();
                        $email = $_SESSION['email'];
                        $restaurantID = $_SESSION['restaurantID'];
                        $rating = $_POST['rate'];
                        $review = $_POST['review'];

                        // Insert the data into the database
                        include "../php/DBConnector.php";
                        $sql = "INSERT INTO ratings (email_address, restaurant_id, rating, review) VALUES ('$email', '$restaurantID', '$rating', '$review')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "<script>alert('Review posted successfully!');</script>";
                        } else {
                            echo "<script>alert('Error posting review!');</script>";
                        }
                    }
                ?>
            </div>
            <div id="reviewList-container">
                <span id="main-title">Recent Reviews</span><br>
                <span class="sub-title">Below are the reviews of other people for this place. Check it out!</span>
                <div id="reviewList">
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
                                <span id="rating" class="fa fa-star"></span>
                                <span id="rating" class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                </div>    
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
    </body>
    <script src="../js/review.js"></script>
</html>