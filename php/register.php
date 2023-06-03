<?php
// // Database configuration
include 'DBConnector.php';

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// // Check if email already exists in the database
$checkQuery = "SELECT email_address FROM users WHERE email_address = '$email'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
    // Email already exists, handle the error (display an error message or redirect to a failure page)
    echo "Email already exists. Please choose a different email.";
} else {
    // Prepare and execute the SQL query to insert data into the database
    $insertQuery = "INSERT INTO users (email_address, password) VALUES ('$email', '$password')";

    if ($conn->query($insertQuery) === true) {
        // Redirect the user to a success page or display a success message
        echo "Registration successful!";
        header("Location: ../html/login.html.php");
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
