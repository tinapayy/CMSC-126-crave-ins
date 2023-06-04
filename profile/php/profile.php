<?php
    include 'DBConnector.php';
    if(isset($_POST['update'])){
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone-num'];
        $bday = $_POST['birthday'];
        $sex = $_POST['sex'];
        $email = $_POST['email'];

        $sql = "UPDATE users SET name='$fname', lastname='$lname', phone_number='$phone', birthdate='$bday',  sex='$sex' WHERE email_address='$email'";
        $result = $conn->query($sql);
    }

    header("Location: ../html/myprofile.html.php")
?>

