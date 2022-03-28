<?php
include('partials\_dbconnect.php');

session_start();
// $useremail = $_SESSION['email'];
// echo  $useremail;
$roll_no = $_GET['manage'];
// echo $roll_no;
// exit();
$sql = "DELETE FROM `area_wise_restaurants` WHERE `area_wise_restaurants`.`sno.` = $roll_no";
$result = mysqli_query($conn, $sql);
    if($result){?>
    <script>
    alert("Your data has been deleted");
    window.location.href = "res_index.php";
        </script>
        <?php
        
    }
    else{
        echo "nahi karna delete";
    }

?>