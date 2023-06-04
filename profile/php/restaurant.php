<?php
session_start();

if (isset($_SESSION['restaurantName'])) {
    $restaurantName = $_SESSION['restaurantName'];
    echo "Restaurant Name: " . $restaurantName;
} else {
    echo "Restaurant Name is not set.";
}
?>
