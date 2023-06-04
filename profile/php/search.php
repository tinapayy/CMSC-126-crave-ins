<?php
    $connect = mysqli_connect("localhost", "root", "", "craveins_db");

    $searchQuery = $_GET['query'];
    $landmarkChoice = $_GET['landmark'];

    // Modify the SQL query to include the search conditions for name, tags, category, and landmark
    $sql = "SELECT *, AVG(rating) AS average_rating, COUNT(*) AS review_count FROM ratings NATURAL JOIN restaurants  WHERE (name LIKE '%$searchQuery%' OR tags LIKE '%$searchQuery%' OR category LIKE '%$searchQuery%')";

    if ($landmarkChoice != '') {
        // Include the landmark search condition if a landmark choice is provided
        $sql .= " AND landmark LIKE '%$landmarkChoice%'";
    }

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