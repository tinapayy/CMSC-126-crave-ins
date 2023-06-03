<?php
    // Create a connection
    include "DBConnector.php";

    // Gets data from form and passes them to the database
    if(isset($_POST['submit']))
    {      
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $birthdate = $_POST['birthdate'];
        $sex = $_POST['sex'];
        $profpic = $_POST['profpic'];
        $email = $_POST['email'];
        $sql = "UPDATE `users` SET `name`='$name',`phone_number`='$phone_number',`birthdate`='$birthdate',`sex`='$sex',`profpic`='$profpic' WHERE `email_address`='$email'";

        $update = mysqli_query($conn, $sql);

        if(!$update)
        {
            echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
        }
        else
        {
            echo "Information updated successfully.";
        }
    }

    // Close the database connection
    $conn->close();
?>