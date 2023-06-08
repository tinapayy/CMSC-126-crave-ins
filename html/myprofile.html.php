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

    // Logout operation
    if (isset($_POST['logout'])) {
        // Unset the session variable
        unset($_SESSION['email']);
        // Redirect to the login page
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
        <a href="home.html.php"><button id="backButton"> << Back</button></a>
        <a href="../html/login.html.php"><button id="logout-btn" name="logout">Log out</button></a>
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
                <h3  id="personal-btn"><a class="profile-navv" title="current" href="myprofile.html.php">Personal Information</a></h3><br>
                <h3  id="change-pswd-btn"><a class="profile-navv" href="changepswd.html.php">Change Password</a></h3><br>
            </div>
        </div>

        <div class="profile-container">
                <span id="profile-title">My Profile</span><hr>
                <p class="profile-sub" id="profile-subtitle1">Manage my personal information.</p>
            <form action="../php/profile.php" method="POST" oninput="checkFormValues()">
                <?php
                    include '../php/DBConnector.php';
                    $sql = "SELECT * FROM users WHERE email_address='$email'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $fname = $row['name'];
                    $lname = $row['lastname'];
                    $phone = $row['phone_number'];
                    $birthday = $row['birthdate'];
                    $sex = $row['sex'];
                ?>
                <div class = "profile-form-inputs1">
                    <div class = "profile-input-box">
                        <label for="fname">First Name*</label><br>
                        <span><input class="profile-input" type="text" name="fname" id="fname" value="<?php echo $fname; ?>" required></span><br><br>
                    </div>
                    <div class="profile-input-box">
                        <label for="email">Email Address*</label><br>
                        <span><input class="profile-input" type="email" name="email" id="email" value="<?php echo $email; ?>" readonly required></span><br><br>
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
                            <span><input class="profile-input" type="date" id="birthday" name="birthday" value="<?php echo $birthday; ?>"></span>
                        </div>
                    </div>
                    <div class="profile-sex-container">
                        <label for="sex">Sex*</label><br>
                    <div class="profile-sex-choice">
                        <div class="profile-sex-choice1">
                            <input type="radio" name="sex" value="Male" <?php if ($row['sex'] == 'Male') echo 'checked'; ?> required>Male  &emsp;  &emsp;<br>
                        </div>
                        <div class="profile-sex-choice2">
                            <input type="radio" name="sex" value="Female" <?php if ($row['sex'] == 'Female') echo 'checked'; ?> required>Female<br>
                        </div>
                    </div>
                    </div>
                <div class = "profile-update-btn">
                    <button type="submit" id="update-btn" name="update" onclick="updateProfile()" disabled>Update</button><br>
                </div>
            </div>
            </form>

    <script src="../js/myprofile.js"></script>
    <script>document.getElementById("profile-name").innerHTML = "<?php echo $fname . ' '  . $lname; ?>";</script>
    <script>
        // Store the initial form values
        var initialFormValues = {
            fname: "<?php echo $fname; ?>",
            lname: "<?php echo $lname; ?>",
            phone: "<?php echo $phone; ?>",
            birthday: "<?php echo $birthday; ?>",
            sex: "<?php echo $sex; ?>"
        };

        function checkFormValues() {
            var updateButton = document.getElementById("update-btn");
            var formValues = {
                fname: document.getElementById("fname").value,
                lname: document.getElementById("lname").value,
                phone: document.getElementById("phone-num").value,
                birthday: document.getElementById("birthday").value,
                sex: document.querySelector('input[name="sex"]:checked').value
            };

            if (JSON.stringify(formValues) === JSON.stringify(initialFormValues)) {
                updateButton.disabled = true;
            } else {
                updateButton.disabled = false;
            }
        }
    </script>
    <script>
        function searchByCategory(category) {
            // Redirect to the results page with the selected category as a query parameter
            window.location.href = "../html/results.html.php?category=" + encodeURIComponent(category);
        }
    </script>
</body>