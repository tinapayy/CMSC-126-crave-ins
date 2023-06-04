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
                <a href="../html/about.html.php">About</a>
                <a href="../html/favorites.html.php">Favorites</a>
                <a href="../html/myprofile.html.php"><i class="fa fa-user"></i> Profile</a>
            </div>
                <a href="restaurant.html">
                    <button id="backButton" onclick="history.back()"> << Back</button>
                </a>      
        </header>
        <main>
            <div id="reviewForm">
                <form method="POST">
                    <span id="title"> </span><br>
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
                    <?php 
                        session_start();
                        $restaurantID = $_SESSION['restaurantID'];
                        $connect = mysqli_connect("localhost", "root", "", "craveins_db");
                    
                        // Modify the SQL query to include the search condition
                        $sql = "SELECT *,name, lastname, profpic FROM ratings NATURAL JOIN users WHERE restaurant_id = '$restaurantID'";
                    
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
                                const reviewListContainer = document.getElementById('reviewList');
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
                                    document.getElementById('reviewInput').value = '';
                    
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
        </main>
        <footer>
             <div id='tagline'>
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
</html>
