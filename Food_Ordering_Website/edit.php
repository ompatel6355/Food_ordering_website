<?php
include('partials\_dbconnect.php');
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_name = $_POST['user_name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_SESSION['email'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    // echo $pincode;
    // exit();
    
        $sql = "UPDATE `user_data` SET `user_name` = '$user_name', `surname` = '$surname', `user_phone_no` = '$phone',`user_address` = '$address', `pincode`= '$pincode',  `state` = '$state', `country` = '$country' WHERE `user_data`.`user_email` = '$email'";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location:edit_profile.php");
        }
        else{
            ?>
            <script>
                alert("Something Went Wrong try again");
                window.location.replace('edit_profile.php')
                </script>
            <?php
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>