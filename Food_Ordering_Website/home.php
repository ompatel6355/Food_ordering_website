<?php
$_SESSION['loggedin'] = false;
$label = false;
error_reporting(0);
include('partials\_dbconnect.php');
session_start();
$error = false;
if($_SERVER["REQUEST_METHOD"]=='GET'){
    $search1 = $_GET['area'];
    
    $sql = "SELECT * FROM `area_wise_restaurants` WHERE `area` LIKE '$search1' OR `city` LIKE '$search1'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
   
}
else{
    echo "SHow all res";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/home.css">
    <script src="assets/js/index.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://nuovosito.lealternative.net/wp-content/themes/twentytwentyone/assets/js/main.js?ver=5.8.2'
        id='js-file-js' defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.2.0/tailwind.min.css"> -->
    <title>Home</title>
</head>

<body>
    
    <script>
    let x = document.getElementById("price").innerHTML;
    let y = document.getElementById("dishnumber").value;
    document.getElementById("price").innerHTML = x * y;
    </script>
    <div class="header">
        <!-- <script>
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
            document.getElementById("hide").innerHTML = 'success';
        } else {
            document.getElementById("hide").innerHTML = "invalid credentials";

        }
        </script> -->
        <?php
        include 'nav.php';
        echo '<div class="rext">We found '. $num . ' of restuarant in this area.</div>';
        ?>
        <!-- <input type="text"   placeholder="Dishname"> -->
        <div class="col-3 input-effect">
        	<input class="effect-1" type="text" placeholder="Dishname" onkeyup="mySearchFun()" id="myInput" name="">
            <span class="focus-border"></span>
        </div>
    </div>
    <?php
    
    if($error == 1){
     echo "Invalid credentials";   
    }
    // echo $user_address;
    echo '
    ';

    if($num>0){
    $id = 0;  
   echo '<div class="res-display">';
    while($row = mysqli_fetch_assoc($result)){
        $sno = $row['sno.'];
        $area = $row['area'];
        $res_email = $row['res_email'];
        $restaurant_logo = $row['res_logo'];
        $restaurants_name= $row['res_name'];
        $restaurants_address = $row['res_address'];
        $dishes_image = $row['dishes_image'];
        $dishes_name = $row['dishes_name'];
        $price = $row['price'];
        $state = $row['state'];
        $GLOBALS['state']  = $row['state'];
        // $user_address = $_SESSION['user_address'];

        $id = $id+1;
        // <img src='. $dishes_image . ' alt="">
        echo '
        
        <form action="partials\order.php?dish_id='.$row['sno.'].'" method="POST" class="form-container">
        <div class="container" id="'. $sno .'" >
          <div class="card-body" id="card">
          <img class="card-img-top" src=assets/dishes_img/'. $dishes_image . ' alt="Card image cap"> 
          
          <h5 name="dishname" >Dish name: ' . $dishes_name . '</h5>
          <p name="dishname">Restaurant Name: ' . $restaurants_name . '</p>
             <input type="hidden"  value=' . $res_email . ' id="res_email" name="res_email" >
             <input type="hidden" value="'.$dishes_name.'" id="dishes_name" name="dishname" >
             <input type="hidden" value="'.$dishes_image.'" id="dish_img" name="dishimg" >
             <label for="dishnumber">Quantity:</label>
             <input type="number" placeholder="number Of dishes" value="1" id="dishnumber" name="quantity" min="1" max="5">
             <input type="hidden" placeholder="Price"  id="price" name="dish_price" value='. $price .'>
             <h6 id="price">Price: '. $price .'</h6>
             <p>' . $restaurants_address . '</p>
             <input type="hidden" name="sno" value='. $sno .'></input>';
             ?><?php
             if (isset($_SESSION['loggedin'])){
            echo'<input type="submit" name="submit" class="btn" id="card-button" value="Place Order">';
             }
             else{
              echo '  
              <a style="" onClick="loginmodal()" id="card-button">
              Place Order</a>';
             }
             echo'
        </div>
        </div>
        </form>
        
    
        ';
    }
    echo'
    <p id="text-show" ></p>
    </div>';
  }
        
 
  else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            No restaurant found in this area please enter valid location.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div><div class="alert alert-primary" role="alert" >
        Restaurants around the world
        </div>
';  
  $query = "SELECT * FROM `area_wise_restaurants`";
  $result1 = mysqli_query($conn, $query);
  echo '<div class="res-display">';
  while($row = mysqli_fetch_assoc($result1)){
        $sno = $row['sno.'];
        $area = $row['area'];
        $res_email = $row['res_email'];
        $restaurant_logo = $row['res_logo'];
        $restaurants_name= $row['res_name'];
        $restaurants_address = $row['res_address'];
        $dishes_image = $row['dishes_image'];
        $dishes_name = $row['dishes_name'];
        $price = $row['price'];
        $state = $row['state'];
        $GLOBALS['state']  = $row['state'];
        // $user_address = $_SESSION['user_address'];

        $id = $id+1;
        // <img src='. $dishes_image . ' alt="">
        echo '
        <div>
        
        <form action="partials\order.php?dish_id='.$row['sno.'].'" method="POST">
          <div class="container" id = '. $sno .'>
          <div class="card-body">
          <img class="card-img-top" src=assets/dishes_img/'. $dishes_image . ' alt="Card image cap"> 
          
             <h5 class="mt-5" name="dishname">' . $dishes_name . '</h5>
             <input type="hidden"  value=' . $res_email . ' id="res_email" name="res_email" >
             <input type="hidden" value="'.$dishes_name.'" id="dishes_name" name="dishname" >
             <input type="hidden" value="'.$dishes_image.'" id="dish_img" name="dishimg" >
             <label for="dishnumber">Quantity:</label>
             <input type="number" placeholder="number Of dishes" value="1" id="dishnumber" name="quantity" min="1" max="5">
             <input type="hidden" placeholder="Price"  id="price" name="dish_price" value='. $price .'>
             <h6 id="price">Price: '. $price .'</h6>
             <p>' . $restaurants_address . '</p>
             <input type="hidden" name="sno" value='. $sno .'></input>';
             ?><?php
             if (isset($_SESSION['loggedin'])){
            echo'<input type="submit" name="submit" id="card-button" value="Place Order">';
             }
             else{
              echo '  
              <a style="" onClick="loginmodal()" id="card-button">
              Place Order</a>';
             }
             echo'
        </div>
          </div>
          </form>
          </div>
        
        ';
    }
    echo'</div>';
  }
       
         
          
    
    ?>



    <div class="signinmodal" id="loginmodal">
        <div class="login-form-container">
            <div class="login-header">
                <h1>Log in</h1>
                <div onclick="closetab()" class="cross-icon" id="cross-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                        <path fill-rule="evenodd"
                            d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                    </svg>
                </div>
            </div>
            <form action="login.php" method="POST" id="login">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Login with Email address or Phone number</label>
                    <input class="form-control" name="user_email" id="exampleInputEmail1" id="validationCustom02"  required style="border-bottom: 1px dotted black !important;">
                    <span id="email_error" style="color:red;  font-weight:lighter; display:none;">*Email is required</span>
                </div>
                <div class="mb-3">
                    <label for="signinpassword" class="form-label">Password</label>
                    <div class="pass-line">
                        <input type="password" name="password" class="form-control" id="signinpassword" id="validationCustom02" style="border-bottom: 1px dotted black !important;"  required>
                        <span>
                            <i id="hide1" onClick="passwordtype()"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </i>
                            <i id="hide2" onClick="passwordtype()"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </i>

                        </span>
                    </div>
                        <span id="password_error" style="color:red;  font-weight:lighter; display:none;">*Password is required</span>

                </div>


                <button onclick="login()" class="btn btn-primary">Submit</button>

            </form>
            <div class="bottom-login">
                <p>If You don't have one you can join us by clicking below button</p>
                <a href="signup.php">Sign Up</a>
            </div>
        </div>
    </div>



    <script>
    document.addEventListener("keydown", e => {
        if (e.key === "/") {
            document.querySelector('#area-input1').focus();
            // input.focus();
            // input.select();
        }
    })
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>