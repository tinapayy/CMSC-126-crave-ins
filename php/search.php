<?php
    $connect = mysqli_connect("localhost", "root", "", "craveins_db");

    $searchQuery = $_GET['query'];

    // Modify the SQL query to include the search condition
    $sql = "SELECT * FROM restaurants WHERE name LIKE '%$searchQuery%' OR tags LIKE '%$searchQuery%' OR category LIKE '%$searchQuery%'";

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
