<?php
include('_dbconnect.php');
session_start();
if (!isset($_SESSION['res_login']) || $_SESSION['res_login'] != true){
    header("Location: /Food Ordering Website/reslogin.php" );
    exit;
}
// $sql = "UPDATE `area_wise_restaurants` SET `area` = 'nothing1', `state` = 'here1', `restaurant_logo` = 'no1', `restaurants_name` = 'nomen1', `restaurants_address` = 'right side1', `dishes_name` = 'check in menu1', `dishes_image` = '1' WHERE `area_wise_restaurants`.`sno.` = '. $roll_no .'";

if($_SERVER["REQUEST_METHOD"]=='GET'){
    
$roll_no = $_GET['manage'];
        $sql1 = "SELECT * FROM `area_wise_restaurants` WHERE `sno.` = '$roll_no'";
        $result = mysqli_query($conn, $sql1);
        $num = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        // echo $row['res_email'];echo'<br>';
        // echo $row['area']; echo '<br>';
        // echo $row['res_logo'];
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>manage_dishes</title>
  </head>
  <body>
      <script>
          window.addEventListener('load', function() {
  document.querySelector('input[type="file"]').addEventListener('change', function() {
      if (this.files && this.files[0]) {
          var img = document.querySelector('img');
          img.onload = () => {
              URL.revokeObjectURL(img.src);  // no longer needed, free memory
          }

          img.src = URL.createObjectURL(this.files[0]); // set src to blob url
      }
  });
});
      </script>
      <!-- <div class="form-group">
          <input type="hidden" class="form-control" id="dish" name="id" 
              value='. $_GET['manage'] .'>
          
      </div> -->
      <?php
      $update=$row['sno.'];
    //   echo $update;
      echo'
  <div id="manage_dishes">
      <div class="container">
        <form action="update.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="sno" 
                    value='. $update.' readonly
                
            </div>
            <div class="form-group">
                <label for="dish">Dish Name</label>
                <input type="text" class="form-control" id="dish" name="dish" 
                    value='. $row['dishes_name'] .' >
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Area</label>
                <input type="text" class="form-control" id="area" name="area" aria-describedby="emailHelp"
                    value='. $row['area'] .' >
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">City</label>
                <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp"
                    value='. $row['city'] .' >
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">State</label>
                <input type="text" class="form-control" id="state" name="state" aria-describedby="emailHelp"
                    value='. $row['state'] .' >
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp"
                    value='. $row['res_address'] .' >
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">price</label>
                <input type="text" class="form-control" id="price" name="price" aria-describedby="emailHelp"
                    value='. $row['price'] .' >
                
            </div>
            <div class="form-group">
            <div class="form-group">

                   
                    <input type="file" name="file" required>
                    <br><img id="myImg" src="#">
                   


                </div>
            </div>  
            
            
            <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>';

}
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>



<!-- <label for="exampleFormControlFile1">Dish Image</label>
                     <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file"  placeholder='. $row['dishes_image'] .' required> -->
