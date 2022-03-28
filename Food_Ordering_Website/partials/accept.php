<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit page</title>
<?php

include('_dbconnect.php');
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $index_no = $_POST['accept'];
    $accept_sql = "UPDATE `order` SET `status` = 'approved' WHERE `order`.`index_no` = '$index_no'";
    $result = mysqli_query($conn, $accept_sql);
    // echo $index_no;
    // exit();
    if($result){?>
       <script>
           
            alert('You accepted a order no <?php echo $index_no ?>');
            
            window.location.href = history.back();
    </script>
    <?php }
    else{
        echo 'Declined';
    }
}
?>
</head>
<body>

</body>
</html>