<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style>
.succes {
  background-color: #4BB543;
}
.succes-animation {
  animation: succes-pulse 2s infinite;
}

.danger {
  background-color: #CA0B00;
}
.danger-animation {
  animation: danger-pulse 2s infinite;
}

.custom-modal {
  position: relative;
  width: 350px;
  min-height: 350px;
  background-color: #fff;
  border-radius: 30px;
  margin: 40px 10px;
}
.custom-modal .content { 
  position: absolute;
  width: 100%;
  text-align: center;
  bottom: 0;
}
.custom-modal .content .type {
  font-size: 18px;
  color: #999;
}
.custom-modal .content .message-type {
  font-size: 20px;
  color: #000;
}
.custom-modal .border-bottom {
  position: absolute;
  width: 300px;
  height: 20px;
  border-radius: 0 0 30px 30px;
  bottom: -20px;
  margin: 0 25px;
}
.custom-modal .icon-top {
  position: absolute;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  top: -30px;
  margin: 0 125px;
  font-size: 30px;
  color: #fff;
  line-height: 100px;
  text-align: center;
}
@keyframes succes-pulse { 
  0% {
    box-shadow: 0px 0px 30px 20px rgba(75, 181, 67, .2);
  }
  50% {
    box-shadow: 0px 0px 30px 20px rgba(75, 181, 67, .4);
  }
  100% {
    box-shadow: 0px 0px 30px 20px rgba(75, 181, 67, .2);
  }
}
@keyframes danger-pulse { 
  0% {
    box-shadow: 0px 0px 30px 20px rgba(202, 11, 0, .2);
  }
  50% {
    box-shadow: 0px 0px 30px 20px rgba(202, 11, 0, .4);
  }
  100% {
    box-shadow: 0px 0px 30px 20px rgba(202, 11, 0, .2);
  }
}


.page-wrapper {
  height: 100vh;
  background-color: #eee;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 80px 0;
}
body { margin:0; font-family: 'Roboto';}
@media only screen and (max-width: 800px) {
  .page-wrapper {
    flex-direction: column;
  }
}
        </style>
</head>

<body>

    <?php
        include('_dbconnect.php');
        session_start();
        if ($_SESSION['loggedin'] == true){
            if(isset($_POST['submit'])){
                $dishname = $_REQUEST['dishname'];
                $price = $_POST['dish_price'];
                // $quantity = $_POST['totaldish'];
                $sno = $_POST['sno'];
                $quantity = $_POST['quantity'];
                $res_email = $_POST['res_email'];
                $user_email = $_SESSION['email'] ;
                $user_address =  $_SESSION['user_address'];
                $user_email =  $_SESSION['email'];
                $user_name =  $_SESSION['user_name'];
                $total = $price * $quantity;

                $sql  = "INSERT INTO `order` (`sno.`,`restaurant_email`, `dish_name`,`dish_price`, `quantity`, `total`, `user_email`, `user_name`, `user_address`) VALUES ('$sno','$res_email', '$dishname','$price', '$quantity','$total','$user_email', '$user_name', '$user_address')";

                $result = mysqli_query($conn,$sql);
                // $num = mysqli_num_rows($result);

                    if($result){
                        $url =  $_SERVER['HTTP_REFERER'];
                        // header('Location: ' . $url );
                            ?>

                            <div class="page-wrapper">
                                <div class="custom-modal">
                                    <div class="succes succes-animation icon-top"><i class="fa fa-check"></i></div>
                                    <div class="succes border-bottom"></div>
                                    <div class="content">
                                    <p class="type">Order</p>
                                    <p><b>Dish name: </b><?php echo $dishname ?></p>
                                    <p><b>Quantity: </b><?php echo $quantity ?></p>
                                    <p><b>Total price: </b><?php echo $total ?></p>
                                    <p class="message-type">Your order is Succesfully Boocked</p>
                                    <a href="javascript:history.back()"  style="color: #fff;
                                              background-color: #4bb543;
                                              border-color: #ffffff;"
                                              class="btn btn-dark" role="button">back</a>
                                    </div>
                                </div>
  
                            </div>
    <?php
                    }
                    else{
                        echo'Try again';
                    }
            }
        
        else{
          ?>
            <div class="page-wrapper">
            
            <div class="custom-modal">
                <div class="danger danger-animation icon-top"><i class="fa fa-times"></i></div>
                <div class="danger border-bottom"></div>
                <div class="content">
                <p class="type">Appointment</p>
                <p class="message-type">A Problem Occurred </p>
                </div>
            </div>
            </div>

            <?php
        }
      }
        else{
          ?>
          <a data-toggle="modal" href="../home.php" data-target="#loginmodal">Click me</a>
          <?php
        }


        ?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>