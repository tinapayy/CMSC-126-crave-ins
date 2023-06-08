<?php
    include 'DBConnector.php';

    $sql = "SELECT * FROM menu WHERE restaurant_id = 1";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $food = $row['food'];
        echo "<div class='menu-item'>
                <div class='menu-item-info'>
                    <p>$food</p>
                </div>
                
            </div>";
    }
?>