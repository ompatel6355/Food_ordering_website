<!DOCTYPE html>
<html lang="en">
<?php




?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../assets/css/res_order.css">
    <title>Document</title>
</head>

<body>
    <script>
        
        </script>
<!-- <button id="gameStart">Start</button> -->
<div class="header">
    <div class="home-header-logo">
      <img src="../assets/image/swiggy-logo.png" alt="Logo">

      <?php 
            // echo $_SESSION['email'];
            
            
           
              echo'
            <div class="header-search">
              
                </div>


                <div class="nav">
                <ul>

                
                  
                  
                  <li>
                  <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                  <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                </svg>
                  Help</a></li>';
                  
                  echo'

                  <li>
                  <a id="home_cart" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                  Cart</a></li>

                  <li>
                  <a id="home_cart" href="res_order.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>
                  Orders</a></li>';

                  echo '<li><a class="back_button" href="Javascript:history.back()"><img  src="../assets/image/back.svg" alt="Back">Back<a></li>';
                  
                                      
                '
              </ul>
                </div>
                ';
               
                ?>
    </div>
  </div>

<div class="container">
        <?php
include('_dbconnect.php');
session_start();
$email = $_SESSION['email'];
$sql = "SELECT * FROM `order` WHERE `restaurant_email` LIKE '$email'";
    $result = mysqli_query($conn, $sql);
    while($num_row = mysqli_fetch_assoc($result)){
        $dish_title = $num_row['dish_name'];
        $total = $num_row['dish_price'];
        $user_email = $num_row['user_email'];
        $user_address = $num_row['user_address'];
        $index_no = $num_row['index_no'];
        $status = $num_row['status'];
      
        
echo'
<div class="card" style="width: 20rem;">';

        if($status == "approved"){
            echo'<div class="alert alert-primary" role="alert">
                    Order Is Approved
             </div>';
        }
        else{
            echo '<div class="alert alert-dark" role="alert">
                    Not approved!
                </div>';
        }
echo'
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
    <div class="card-body">
        <h5 class="card-title">'. $dish_title .'</h5>
        <p class="card-text"><b>Price: </b>'.$total.'</p>
        <p class="card-text"><b>User email: </b>'.$user_email.'</p>
        <p class="card-text"><b>User address: </b>'.$user_address.'</p>
        <div style="display:flex;justify-content:space-evenly;">
        <input type="hidden" value='. $index_no .'></input>
                <div class="buttons">
                    <form action="accept.php?confirm_no='. $index_no .'" method="POST">
                        <input type="hidden" name="accept" value='. $index_no .' class="btn btn-success"></input>
                        <button type="submit"   class="btn btn-success">Accept</button>
                    </form>
                    <form action="decline.php?confirm_no='. $index_no .'" method="POST">
                        <input type="hidden" name="decline" value='. $index_no .' placeholder="Decline" class="btn btn-danger" ></input>
                        <button type="submit"  class="btn btn-danger">Decline</button>
                    </form>
                </div>
        </div>
    </div>
</div>


';
    }
    ?>
</div>
</body>

</html>