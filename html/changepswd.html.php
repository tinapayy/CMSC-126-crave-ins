<?php
    include '../php/DBConnector.php';
    session_start();
    // Check if the user is logged in by checking the existence of the session variable
    if (isset($_SESSION['email'])) {
        // User is logged in
        $email = $_SESSION['email'];

        $sql = "SELECT * FROM users WHERE email_address='$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $profpic = $row['profpic'];
        $password = $row['password'];
        $fname = $row['name'];
        $lname = $row['lastname'];
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
	<link rel="icon" type="image/png" sizes="32x32" href="../images/crave ins icon.png">
	<link rel="stylesheet" type="text/css" href="../css/navBar.css">
    <link rel="stylesheet" type="text/css" href="../css/myprofile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/51f7eec72a.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <?php include '../html/navbar.php' ?>
        <a href="../html/home.html.php"><button id="backButton"> << Back</button></a>
        
        <div class="profile-pic-container">
            <div class="profile-pic">
                <img id="output" src="<?php $profpic ?>" alt="Profile Picture" /><br>
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
                <div class = "profile-form-inputs1">
                    <div class = "profile-input-box">
                        <label for="fname">Old Password*</label><br>
                        <span><input class="profile-input" type="password" name="old-password" id="old-password" required></span><br><br>
                        <script>
                            var auth_password = "<?php echo $password; ?>";
                        </script>
                    </div>
                    <div class="profile-input-box">
                        <label for="email">New Password*</label><br>
                        <span><input class="profile-input" type="password" name="new-password" id="new-password" required></span><br><br>
                    </div>
                    <div class = "profile-input-box">
                        <label for="lname">Confirm New Password*</label><br>
                        <input class="profile-input" type="password" name="confirm-password" id="confirm-password" required></span><br><br>
                    </div>
                    <p class="profile-sub" id="profile-subtitle2">*Required Fields</p>
                    </div>
                <div class = "changepswd-update-btn">
                    <button type="submit" id="update-btn" name="change_password" onclick="updatePassword()">Update</button><br>
                </div>
            </div>
            </form>
    
    <script src="../js/myprofile.js"></script>
    <script>document.getElementById("profile-name").innerHTML = "<?php echo $fname . ' '  . $lname; ?>";</script>
    <script>
        function searchByCategory(category) {
            // Redirect to the results page with the selected category as a query parameter
            window.location.href = "../html/results.html.php?category=" + encodeURIComponent(category);
        }
    </script>
</body>
</html>