<?php
include('partials\_dbconnect.php');

session_start();
$useremail = $_SESSION['email'];
// echo  $useremail;

$sql = "DELETE FROM `order` WHERE `order`.`user_email` = '$useremail'";
$result = mysqli_query($conn, $sql);
if($result){
    header('location:history.php');
}
else{
    echo "nahi karna delete";
}

?>