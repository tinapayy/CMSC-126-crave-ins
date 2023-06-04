<?php
    $connect = mysqli_connect("localhost", "root", "", "craveins_db");

    // Modify the SQL query to include the search condition
    $sql = $sql = "SELECT restaurants.*, ROUND(AVG(ratings.rating)) AS average_rating, COUNT(ratings.review) AS total_reviews
    FROM ratings
    NATURAL JOIN restaurants
    GROUP BY restaurants.restaurant_id
    ORDER BY RAND() DESC
    LIMIT 6";


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
