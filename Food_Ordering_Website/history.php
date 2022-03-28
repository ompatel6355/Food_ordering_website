<?php
//  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
//    header('location:login.php');
//  }
include('partials\_dbconnect.php');
$search = false;
session_start();
  $user_email =  $_SESSION['email'];
  $id = 0;
  $sql = "SELECT * FROM `order` WHERE `user_email` LIKE '$user_email' ORDER BY `index_no` DESC ";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/history.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>History</title>
    <script src="assets/js/index.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css">
</head>

<body>
<div class="home-header-logo">
<!-- <li onclick= searchmodal()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>Search</a></li> -->
          <img src="assets/image/swiggy-logo.png" alt="Logo">
          <?php
          echo'<div class="nav">
                <ul>
                <li>
                        <a href="home.php"><i class="fa fa-home" style="font-size:16px"></i>
                        Home</a></li>
                 
                  <li>
                  <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
                  <path d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
                  Offers</a></li>

                  
                  <li>
                  <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                  <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                  </svg>
                  Help</a></li>';
                  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
                    echo '

                  <li style="cursor:pointer;"><a style="" onClick="loginmodal()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  </svg>
                  Log in</a></li>';
                }
               
                  echo'

                  <li>
                  <a id="home_cart" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg>
                  Cart</a></li>';
                  if (isset($_SESSION['loggedin'])){
                  echo '<li>
                  <a id="history" href="history.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                  </svg>
                  History</a></li>
                  <li><a href="logout.php" style="margin-right:5px;">
                    
                    Log Out</a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg></li>';
                  }
                echo'</ul>
                </div>
                ';
                
                ?>
                </div>
    <div class="container">
        <table class="rwd-table">
            <tbody>
                <tr>
                    <th>Sno.</th>
                    <th>Dish Name</th>
                    <th>Order Date</th>
                    <th>Dish price</th>
                    <th>quantity</th>
                    <th>Total value</th>
                    <th>restaurant email</th>
                    <th>Reorder</th>
                </tr>
                <?php
 if($num >= 1 ){
  while($num_row = mysqli_fetch_assoc($result)){
      $dish = $num_row['dish_name'];
      $date = $num_row['date'];
      $total = $num_row['total'];
      $restaurant_email = $num_row['restaurant_email'];
      $dish_price = $num_row['dish_price'];
      $sno = $num_row['sno.'];
      $quantity = $num_row['quantity'];
      // $dish_price = $total/$quantity;
      $id++;
      
      
     echo'
     <form action="partials\order.php?dish_id='. $sno .'" method="POST">
                <tr>
                    <td data-th="Supplier Code">
                    '. $id .'
                    </td>
                    <td data-th="Supplier Name">
                        '. $dish .'
                    </td>
                    <td data-th="Invoice Number">
                    '. $date .'
                    </td>
                    <td data-th="Invoice Number">
                    '. $dish_price .'
                    </td>
                    <td data-th="Invoice Number">
                    <input type="number" value='. $quantity .' name="quantity" max=5 min=1></input>
                    </td>
                    <td data-th="Invoice Number">
                    '. $total .'
                    </td>
                    <td data-th="Invoice Number">
                    '. $restaurant_email .'
                    </td>
                    
                        <input type="hidden"  value=' . $restaurant_email . ' id="res_email" name="res_email" >
                        <input type="hidden" value="'.$dish.'" id="dishes_name" name="dishname" >
                        <input type="hidden" placeholder="number Of dishes" value="1" id="dishnumber" name="totaldish" min="1" max="5">
                        <input type="hidden" placeholder="dishPrice"  id="price" name="dish_price" value='. $dish_price .'>
                        <input type="hidden" placeholder="Price"  id="price" name="price" value='. $total .'>
                        <input type="hidden" placeholder="sno"  id="sno" name="sno" value='. $sno .'>
                        <td data-th="Invoice Number" style="color:white;     display: flex;
                        align-items: center;">
                        <input type="submit" name="submit" id="card-button" class="place-order" style="color:black;" value="Place Order again">
                        </td> 
          </div>
            </div>
            </form>
          
                   
                </tr>
          ';
    ?>
                <?php
  }
  echo'
  
';
}
else{
  echo 'make your first order.';
}
 ?>
</tbody>
  </table>
  <div style="display: flex;margin-bottom:15px;
  align-items: center;
  justify-content: center;    margin-top: 10px;">
  <a href="javascript:history.back()"  style="color: #fff;
                                              background-color: #fc8019;
                                              border-color: #cecece00;"
                                              class="btn btn-dark" role="button">back</a>
                                              
  <div class="text-center" style="    margin-left: 5px;">
              <button type="button" id="delete" class="btn btn-danger">
                <i class="glyphicon glyphicon-trash"></i> Clear History
              </button>
        </div>
</div>
</div>
<script> $('#delete').click(function(){
  
  swal({
  title: 'Are you sure?',
  text: "It will permanently deleted !",
  type: 'warning',
  showCancelButton: true,
  // confirmButtonText: '',
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '<a style="color:white; text-decoration:none;"href="delete.php">Yes, delete it!</a>',
  // confirmButtonTextcolor : 'white',
customClass: 'history.css',
  content: {
      element: "a",
      attributes: {
        href : "delete.php",
      }
}
}).then(function() {
  swal(
    'Deleted!',
    'Your file has been deleted.',
    'success',
    window.location.replace("history.php")
  );
})
  
})</script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
                    crossorigin="anonymous"></script>
</body>

</html>