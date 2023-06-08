<?php
session_start();

if (isset($_POST['restaurantID'])) {
    $restaurantName = $_POST['restaurantID'];
    $_SESSION['restaurantID'] = $restaurantName;
    echo 'Restaurant ID stored in session.';
} else {
    echo 'Restaurant ID not provided.';
}
?>
