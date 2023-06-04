<?php
include 'DBConnector.php';

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

// Fetch the image path from the database
$sql = "SELECT profpic FROM users WHERE email_address='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $uploadedFilePath = $row['profpic'];

  echo $uploadedFilePath; // Return the image path as the response
} else {
  echo ""; // Return an empty string if no image path found
}

$conn->close();
?>
