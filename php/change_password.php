<?php
    include 'DBConnector.php';
    if(isset($_POST['change_password'])){
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
        $old_pwd = $_POST['old-password'];
        $new_pwd = $_POST['new-password'];

        $sql = "UPDATE users SET password='$new_pwd' WHERE email_address='$email'";
        $result = $conn->query($sql);
    }

    header("Location: ../html/changepswd.html.php")
?>

