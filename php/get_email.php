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