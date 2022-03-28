<?php

session_start();
include('_dbconnect.php');
if(isset($_POST['submit'])){
    $file = $_FILES['file']; 
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
     $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'img', 'pdf', 'png', 'jfif');
    if(in_array( $fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){
                $fileNewname = uniqid('', true).".".$fileActualExt ;
                $fileDestination = 'C:\xampp\htdocs\Food_Ordering_Website\assets\dishes_img/'.$fileNewname;


                $email = $_SESSION['email'] ;
                $city = $_POST['city'] ;
                $address = $_POST['address'] ;
                $state = $_POST['state'] ;
                $dish = $_POST['dish'] ;
                $price = $_POST['price'] ;
                $area = $_POST['area'] ;
                $price = $_POST['price'] ;
                // $sql = "UPDATE `patient` SET `report_img` = '$fileNewname' WHERE `patient_id` = $id"; 
                // $sql = "UPDATE `area_wise_restaurants` SET `area` = '$area', `city` = '$city', `state` = '$state', `dishes_name` = '$dish', `dishes_image` = '$fileNewname', `price` = '$price' WHERE `area_wise_restaurants`.`sno.` = '$id'";
                
                $sql = "INSERT INTO `area_wise_restaurants` ( `res_email`, `res_address`, `area`, `city`, `state`, `dishes_name`, `dishes_image`, `price`) VALUES ( '$email', '$address', '$area', '$city', '$state', '$dish', '$fileNewname', '$price')";

                $update_result = mysqli_query($conn, $sql);

                move_uploaded_file($fileTmpName, $fileDestination);
                if($update_result){ 
                    // echo 'Successful';
                    header('Location: \Food_Ordering_Website\res_index.php');
                   
                }
                else{
                    echo'Not Updated';
                   

                }

            }
            else{
                echo "Your file is too large";
            }
        }else{
            echo "there is an error in your img";
        }
    }
    else{
        echo "You can not upload file of this type";
    }

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
    <link rel="stylesheet" href="assets/css/additem.css">
    <script src="assets/js/index.js"></script>

    <title>Home</title>
</head>

<body>
    <script>
    window.addEventListener('load', function() {
        document.querySelector('input[type="file"]').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                var img = document.querySelector('img');
                img.onload = () => {
                    URL.revokeObjectURL(img.src); // no longer needed, free memory
                }

                img.src = URL.createObjectURL(this.files[0]); // set src to blob url
            }
        });
    });
    </script>

    <div id="additem">
        <div class="login-form-container">
            <?php
        echo '<form class="container" action="additem.php" method="POST" enctype="multipart/form-data">
        <h1>Add item</h1>
       
    <div class="form-group">
        <label for="dish">Dish Name</label>
        <input type="text" class="form-control" id="dish" name="dish" 
            placeholder="Dish name" required>
        
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Area</label>
        <input type="text" class="form-control" id="area" name="area" aria-describedby="emailHelp"
            placeholder="Area" required>
        
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">City</label>
        <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp"
              required>
        
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">State</label>
        <input type="text" class="form-control" id="state" name="state" aria-describedby="emailHelp"
            required>
        
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp"
          required>
        
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">price</label>
        <input type="number" class="form-control" id="price" name="price" aria-describedby="emailHelp"
         required>
        
    </div>
    <div class="form-group">
    <div class="form-group">

           
            <input type="file" name="file">
            <br><img id="myImg" src="#">
           


        </div>
    </div>      
    <a onclick="history.back()" style="color:white;"  id = "backbutton" class="btn btn-dark" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16"
            height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>Back</a>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>

        </form>
        
    </div>
    </div>';
?>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
                integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                crossorigin="anonymous">
            </script>
</body>

</html>