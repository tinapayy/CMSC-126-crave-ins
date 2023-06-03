<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crave Ins</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../images/crave ins icon.png">
	<link rel="stylesheet" type="text/css" href="../css/navBar.css">
    <link rel="stylesheet" type="text/css" href="../css/myprofile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/51f7eec72a.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <img id="logoName" class="logo" src="../images/crave ins logo name2.png" alt="Crave Ins Logo">
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
            <a href="profile.html"><i class="fa-solid fa-user"></i> Profile</a>
        </div>
        <a href="home.html"><button id="backButton"> << Back</button></a>
        
        <div class="profile-pic-container">
            <div class="profile-pic">
                <label class="label" for="file">
                    <span>Change Image</span>
                </label>
                <input id="file" type="file" onchange="loadFile(event)"/>
                <img src="../images/profile3.jpg" id="output"/>
            </div>
            <h1 id="profile-name" value="''">Harry Styles</h1>
            <div class = "profile-nav-btn">
                <h3  id="personal-btn"><a class="profile-navv" title="current" href="myprofile.html">Personal Information</a></h3><br>
                <h3  id="change-pswd-btn"><a class="profile-navv" href="changepswd.html">Change Password</a></h3><br>
            </div>
        </div>

        <div class="profile-container">
                <span id="profile-title">My Profile</span><hr>
                <p class="profile-sub" id="profile-subtitle1">Manage my personal information.</p>
                <?php
                    session_start();

                    // Check if the user is logged in by checking the existence of the session variable
                    if (isset($_SESSION['email'])) {
                        // User is logged in
                        $email = $_SESSION['email'];
                    } else {
                        // User is not logged in
                        header("Location: login.html.php");
                        exit();
                    }
                ?>
                <?php
                    include '../php/DBConnector.php';
                    $sql = "SELECT * FROM users WHERE email_address='$email'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $fname = $row['name'];
                    $lname = $row['lastname'];
                    $phone = $row['phone_number'];
                ?>
            <form action="../php/profile.php" method="POST">
                <div class = "profile-form-inputs1">
                    <div class = "profile-input-box">
                        <label for="fname">First Name*</label><br>
                        <span><input class="profile-input" type="text" name="fname" id="fname" value="<?php echo $fname; ?>" required></span><br><br>
                    </div>
                    <div class="profile-input-box">
                        <label for="email">Email Address*</label><br>
                        <span><input class="profile-input" type="email" name="email" id="email" value="<?php echo $email; ?>" required></span><br><br>
                    </div>
                    <div class="profile-input-box">
                        <label for="phone-num">Phone Number*</label><br>
                        <span><input class="profile-input" type="number" name="phone-num" id="phone-num" value="<?php echo $phone; ?>" required></span><br><br>
                    </div>
                    <p class="profile-sub" id="profile-subtitle2">*Required Fields</p>
                    </div>
                    <div class="profile-form-inputs2">
                    <div class = "profile-input-box">
                        <label for="lname">Last Name*</label><br>
                        <input class="profile-input" type="text" name="lname" id="lname" value="<?php echo $lname; ?>" required></span><br><br>
                    </div>
                    <div class="profile-input-box">
                        <div class="profile-date">
                            <label for="birthday">Date of Birth*</label><br>
                            <span><input class="profile-input" type="date" id="birthday" name="birthday"></span>
                        </div>
                    </div>
                    <div class="profile-sex-container">
                        <label for="sex">Sex*</label><br>
                    <div class="profile-sex-choice">
                        <div class="profile-sex-choice1">
                            <input type="radio" name="sex" value="Male" required="required">Male  &emsp;  &emsp;<br>
                        </div>
                        <div class="profile-sex-choice2">
                            <input type="radio" name="sex" value="Female">Female<br>
                        </div>
                    </div>
                    </div>
                <div class = "profile-update-btn">
                    <button type="submit" id="update-btn" name="update">Update</button><br>
                </div>
            </div>
            </form>

    <script src="../js/myprofile.js"></script>
</body>