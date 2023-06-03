<?php
session_start();

if (isset($_POST['restaurantName'])) {
    $restaurantName = $_POST['restaurantName'];
    $_SESSION['restaurantName'] = $restaurantName;
    echo 'Restaurant name stored in session.';
} else {
    echo 'Restaurant name not provided.';
}
?>
