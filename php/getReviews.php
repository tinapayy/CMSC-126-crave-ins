<?php 
    session_start();
    $restaurantID = $_SESSION['restaurantID'];
    $connect = mysqli_connect("localhost", "root", "", "craveins_db");

    // Modify the SQL query to include the search condition
    $sql = "SELECT *,name, lastname, profpic FROM ratings NATURAL JOIN users WHERE restaurant_id = '$restaurantID'";

    $result = mysqli_query($connect, $sql);

    $json_array = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $json_array[] = $row;
        }
        echo json_encode($json_array);
    } else {
        echo json_encode(array());
    }
?>