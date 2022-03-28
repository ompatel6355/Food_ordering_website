<?php
if (isset($_SESSION['res_login'])){
    exit();
 }

// $login = False;
$res_login = False;
$showError = False;
$_SESSION['loggedin'] = false;
$_SESSION['res_login'] = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include('partials\_dbconnect.php');
    $res_name = $_POST['res_name'];
    $res_email = $_POST['res_email'];
    $c_password = $_POST['c_password'];
    $password = $_POST['password'];
    $res_phone = $_POST['res_phone'];
    $res_address = $_POST['res_address'];
    $res_area = $_POST['res_area'];
    $res_city = $_POST['res_city'];
    
    $date = "SELECT * FROM `restaurants` WHERE `res_email` LIKE '$res_email' ";
    $result1 = mysqli_query($conn, $date);
    $num1 = mysqli_num_rows($result1);
    $num_row = mysqli_fetch_assoc($result1);
    if($num1 > 0){
     $showError = True;
   }
   else{
       
       if($password == $c_password){
        echo "Enter";
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `restaurants` ( `res_email`, `Name_of_Restaurants`, `password`, `Address`,`area`,`City`, `Phone_number`) VALUES ( '$res_email' , '$res_name', '$hash', '$res_address','$res_area','$res_city'  ,'$res_phone' )";
      
      $result = mysqli_query($conn, $sql);
      if($result){
        session_start();
        // $login = true;
        $res_login = true;
        // $_SESSION['loggedin'] = True;
        $_SESSION['res_login'] = True;
        $_SESSION['username'] = $res_name;
        $_SESSION['email'] = $res_email;
        $_SESSION['res_address'] = $res_address;
        $_SESSION['res_phone'] = $res_phone;
        $_SESSION['res_area'] = $res_area;
        $_SESSION['res_city'] = $res_city;
        echo  $_SESSION['res_city'];
        echo  $_SESSION['res_phone'];
        header('Location:res_index.php');
        // echo "Matched";
    }
  }
    else{
        $showError = "Password Do not match ";
    }

   }


}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets\css\signup.css" media="screen" />
    <script src="assets/js/index.js"></script>
    <title>Sign Up</title>
    <script>
                  
                    </script>
</head>

<body>


    <?php
     if($showError){
     echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong> Error</strong> User already exist. You might wants to <a href="login.php">login</a>
     
      </button>
    </div>';
  }
    
    
    ?>
    <div class="signup-form-container">
        <h1>RES-Sign Up</h1>
        <div class="user">

            <button type="button" onClick="usersignuppage()" class="btn btn-warning">User</button>
            <button type="button" id="Userlogin" onClick="ressignup()" class="btn btn-warning">Restaurants</button>

        </div>

        <form action="res_user_signup.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Restaurant Name</label>
                <input type="name" class="form-control" name="res_name" id="name" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="res_email" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="PhoneNumber" class="form-label">PhoneNumber</label>
                <input type="" class="form-control" name="res_phone" id="phoneNumber" aria-describedby="emailHelp"
                    minlength="10">
            </div>

            <div class="mb-3">
                <label for="signinpassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="signinpassword" minlength="8">
                <span>
                   
                    <i id="hide1" onClick="passwordtype()"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path
                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path
                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg></i>
                    <i id="hide2" onClick="passwordtype()"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                            <path
                                d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                            <path
                                d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                            <path
                                d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                        </svg></i>

                </span>
                <div class="mb-3">
                    <label for="signinpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="c_password" id="signinpassword" minlength="8">

                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">address</label>
                    <input type="text" class="form-control" name="res_address" id="address">
                </div>
                <div class="mb-3">
                    <label for="area" class="form-label">Area</label>
                    <input type="text" class="form-control" name="res_area" id="area">
                </div>
                <div class="mb-3">
                    <label for="area" class="form-label">City</label>
                    <input type="text" class="form-control" name="res_city" id="city">
                </div>

                <a href="javascript:history.back()" class="btn btn-dark" role="button"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>Back</a>
                <button type="submit" class="btn btn-primary" onclick=validatePassword()>Submit</button>

        </form>
        <div class="bottom-login">
            <p>Already have an account?</p>
            <a href="login.php">Login</a>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>