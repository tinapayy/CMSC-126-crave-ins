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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crave Ins</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../imgs/crave ins icon.png">
	<link rel="stylesheet" type="text/css" href="../css/navBar.css">
    <link rel="stylesheet" type="text/css" href="../css/myprofile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/51f7eec72a.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <img id="logoName" class="logo" src="../images/crave_ins_logo_name_orange.png" alt="Crave Ins Logo">
        <div class="navbar">
            <a href="../home/home.html">Home</a>
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
            <a href="../html/myprofile.html.php"><i class="fa-solid fa-user"></i> Profile</a>
        </div>
        <a href="../html/home.html.php"><button id="backButton"> << Back</button></a>
        
        <div class="profile-pic-container">
            <div class="profile-pic">
                <label class="label" for="file">
                    <span>Change Image</span>
                </label>
                <form action='' method='POST' enctype='multipart/form-data'>
                    <input id="file" type='file' name='userFile' onchange="loadFile(event)"><br>
                    <img id="output" src="" alt="Profile Picture" /><br>
                    <input id="upload-btn" type='submit' name='upload_btn' value=''>
                    <label for="upload-btn"><i class="fas fa-camera"></i></label>
                </form>

                <?php
                if (isset($_FILES['userFile'])) {
                    $target_Path = "../images/profile/";
                    $target_Path = $target_Path . basename($_FILES['userFile']['name']);
                    move_uploaded_file($_FILES['userFile']['tmp_name'], $target_Path);
                    $uploadedFilePath = $target_Path; // Store the uploaded file path

                    include '../php/DBConnector.php';
                    $sql = "UPDATE users SET profpic='$uploadedFilePath' WHERE email_address='$email'";
                    $result = $conn->query($sql);

                    echo "<script type='text/javascript'>alert('Image Uploaded!');</script>";
                }
                ?>
            </div>
            <h1 id="profile-name"></h1>
            <div class = "profile-nav-btn">
                <h3  id="personal-btn"><a class="profile-navv" href="myprofile.html.php">Personal Information</a></h3><br>
                <h3  id="change-pswd-btn"><a class="profile-navv" title="current" href="changepswd.html.php">Change Password</a></h3><br>
            </div>
        </div>

        <div class="changepswd-container">
                <span id="profile-title">Change Password</span><hr>

            <form action="../php/change_password.php" method="POST">
                <?php
                    include '../php/DBConnector.php';
                    $sql = "SELECT * FROM users WHERE email_address='$email'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $fname = $row['name'];
                    $lname = $row['lastname'];
                ?>
                <div class = "profile-form-inputs1">
                    <div class = "profile-input-box">
                        <label for="fname">Old Password*</label><br>
                        <span><input class="profile-input" type="password" name="old-password" id="old-password" required></span><br><br>
                    </div>
                    <div class="profile-input-box">
                        <label for="email">New Password*</label><br>
                        <span><input class="profile-input" type="password" name="new-password" id="new-password" required></span><br><br>
                    </div>
                    <div class = "profile-input-box">
                        <label for="lname">Confirm New Password*</label><br>
                        <input class="profile-input" type="password" name="confirm-password" id="confirm-password" required></span><br><br>
                    </div>
                    <p class="profile-sub" id="profile-subtitle2">*Can be updated</p>
                    </div>
                <div class = "changepswd-update-btn">
                    <button type="submit" id="update-btn" name="change_password" onclick="updatePassword()">Update</button><br>
                </div>
            </div>
            </form>
    
    <script src="../js/myprofile.js"></script>
    <script>document.getElementById("profile-name").innerHTML = "<?php echo $fname . ' '  . $lname; ?>";</script>
</body>