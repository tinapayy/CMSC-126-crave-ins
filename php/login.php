<?php
// Database configuration
include 'DBConnector.php';

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute the SQL query to check if the email and password exist in the database
$checkQuery = "SELECT * FROM users WHERE email_address = '$email' AND password = '$password'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
    // Fetch the user data
    $user = $checkResult->fetch_assoc();
    
    // Create a session for the user using their email address
    session_start();
    $_SESSION['email'] = $user['email_address'];
    
    // Redirect the user to the home page
    header("Location: ../html/home.html.php");
    exit();
} else {
    // Login failed
    // You can display an error message or redirect to a failure page
    echo "<script> window.alert('Invalid email or password. Please try again.') </script>";
    echo "<meta http-equiv='refresh' content='0;url=../html/login.html.php'>";
}

// Close the database connection
$conn->close();
?>
