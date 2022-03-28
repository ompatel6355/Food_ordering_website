<?php
error_reporting(0);
include('partials\_dbconnect.php');
session_start();
$login = true;
$res_login = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/res_index.css"> 
    <title>Document</title>
</head>

<body>
    <?php
    include 'partials/res_nav.php';
        ?>
    <div><?php
     echo '<div  class="add-item" style="    margin: 0px 10%;
     text-align: end;">
  <a class="add_item" style="text-decoration: none;
  color: black;" href="partials\additem.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
  </svg>Add Item</a></div>
    <div class="res-display">
   ';

    if($num>0){
    $id = 0;  
    while($row = mysqli_fetch_assoc($result)){
          $sno = $row['sno.'];
          $area = $row['area'];
          $dish = $row['dishes_name'];
          $price = $row['price'];
          $area = $row['area'];
          $dishes_image = $row['dishes_image'];
          $restaurants_name= $row['res_name'];
          $restaurants_address = $row['res_address'];
          $state = $row['state'];
          $GLOBALS['state']  = $row['state'];
          $id = $id+1;
          $number = $sno;
        echo'
          <div class="card" style="width: 18rem; height:100%;">
                  
                  <div class="card-body">
                    <img class="card-img-top" src=assets/dishes_img/'. $dishes_image . ' alt="Card image cap">
                  <div class="card-body" style="
                  text-align: left;">
                    <h3>'. $dish .'</h3>
                    <h4>Price: ' . $price . '</h4>
                    <h5>Area: ' . $area . '</h5>
                    <p>State: ' . $state . '</p>
                  <div style="display:flex;     justify-content: center;
                  ">
                      <a  href = "partials\manage_dishes.php?manage='.$row['sno.'].'" id="card-button" class="btn btn-primary btn-sm" type="submit" data-target="#exampleModalCenter" value='. $sno .'>Manage item </a>
                      <a href = "dish_delete.php?manage='.$row['sno.'].'" style="margin-left:5px;" type="Delete" name="delete"  class="btn btn-danger btn-sm">Delete Item</a>
                      </div>

  </div>
</div>
      </div>';
    }
  }
  else{
    echo '<h1>You have not add any dishes</h1>';  
  }
       
         
          
    
?>
    </div>

    <?php 
        ?>


    </div>
</body>

</html>