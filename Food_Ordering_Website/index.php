<?php

include('partials\_dbconnect.php');
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="index.js"></script>
    <title>Food Order</title>
</head>

<body>


    <section class="container">
        <div class="index-container">
            <div>
                <div class="container-left">
                    <img src="assets/image/swiggy-logo.png" alt="Logo image" style="width:100px; height:100px;" srcset="">
                    <?php
                    // if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
                    //     echo '<div>
                    //     <a href="login.php" class="btn " role="button">Log in</a>
                    //     <a href="signup.php" class="btn btn-dark" role="button">Sign Up</a>

                    // </div>';
                    // }
                    ?>
                </div>



                <div class="container-left-body">
                    <h1>Hungry?</h1>
                    <h5>Order food from favourite restaurants near you.</h5>
                </div>
                
                <form class="d-flex" action="home.php" method="GET">
                    <input id="search" class="form-control me-2" name="area" type="search" placeholder="Area" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" href="home.php">Search</button>
                </form>
            
            <?php 
                
                ?>



            </div>




            <div class="container-right">
                <img src="assets/image/index-right.jpeg" alt="image right">
            </div>
        </div>

    </section>





    <section class="index-body-sec">
        <div class="index-middle-sec">
            <div class="container-1">
                <div>
                    <img src="assets/image/handsup.png" alt="hands up">
                    <h2>No Minimum Order</h2>
                    <p>Order in for yourself or for the group, with no restrictions on order value</p>
                </div>
            </div>


            <div class="container-2">
                <div>
                    <img src="assets/image/location.png" alt="hands up">
                    <h2>No Minimum Order</h2>
                    <p>Order in for yourself or for the group, with no restrictions on order value</p>
                </div>
            </div>


            <div class="container-3">
                <div>
                    <img src="assets/image/bike-delivery.png" alt="hands up">
                    <h2>No Minimum Order</h2>
                    <p>Order in for yourself or for the group, with no restrictions on order value</p>
                </div>
            </div>
        </div>
    </section>







<script>
    document.addEventListener("keydown", e=>{
        if(e.key === "/"){
            const input = document.getElementById('search').select();
        }
    })
</script>

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