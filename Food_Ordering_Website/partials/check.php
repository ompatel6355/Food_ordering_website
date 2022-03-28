<?php
include('config.php');
session_start();
if(!empty($_GET['did'])){
    $query = "DELETE FROM `crud1` WHERE id=".$_GET['did'];
    $delete = mysqli_query($con,$query);
}
else if(!empty($_GET['upid'])){    
    $do = 'Edit';
    $doid = $_GET['upid'];
    $query = "SELECT * FROM `crud1` WHERE id=".$doid;
    $r = mysqli_query($con,$query);
    $row = mysqli_fetch_array($r);
}
else{
    $do = 'Add';
    $doid = "";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- <style>
            table{
                margin: auto;
            }
            form{
                border: solid 10px tan;
                border-radius: 20px;
                width: 300px;
                text-align: center;
                height: 280px;
                margin: auto;
            }
            input{
                margin-top: 15px;
            }
            
            table,tr,td{
                border: solid 1px black;
                border-collapse: collapse;
                padding: 10px;
                text-align: center;
            }
            .submit{
                background-color: tan;
                padding: 7px;
                border: 0;
                border-radius: 6px;
                cursor: pointer;
            }
        </style> -->
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
        <div><?php 
             $email1= $_SESSION['email'];
             $r="SELECT name FROM crud1 WHERE email='$email1'";
             $resultname=mysqli_query($con,$r);
             if(! $resultname){
                die(mysqli_error($con));
            }
            if (mysqli_num_rows($resultname) > 0) {
                while($rowData = mysqli_fetch_array($resultname)){
                    echo "Hello " .$rowData["name"].'<br>';
                }
            }
            //$query = "SELECT name FROM `crud1` WHERE id=".$doid;
          ?> 
          </div> 
        <div><a style="float:right" href="destroy.php" class="link-dark">Logout</a></div>
      </form>
    </div>  
</nav>
        <div class="container">
           
            <div class="offset-md-4 col-md-4 col-sm-12">
                <form action="action.php" method="POST">
                    <input type="hidden" name="do" value="<?php echo $do;?>">
                    <input type="hidden" name="doid" value="<?php echo $doid;?>">
                    <div class="form-group">
                        <label for="Name">Name </label>
                        <input class="form-control" type="text" name="name" placeholder="Enter Your Name" value="<?php if(isset($row)){ echo $row['name']; } ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email </label>
                        <input class="form-control" type="email" name="email" placeholder="Enter Your Email" value="<?php if(isset($row)){ echo $row['email']; } ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password </label>
                        <input class="form-control" type="Password" name="password" placeholder="Enter Your Password" value="<?php if(isset($row)){ echo $row['password']; } ?>" required>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-primary" type="submit" name="submit" value="<?php if(isset($row)){echo "Update";}else{echo "Submit";} ?>">
                    </div>
                </form>
            </div>
        </div>
        
                <table class="table table-stripped table-hover text-center">
                    <thead>
                        <tr>
                            <th>Sr. no.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!-- <th>Password</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      
                        $query = mysqli_query($con,"SELECT * FROM `crud1` ORDER BY ID DESC");
                        $i=0;
                        while($row = mysqli_fetch_assoc($query)){
                            
                            $i++;
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['email']."</td>";
                            // echo  "<td>".md5($row['password'])."</td>";
                            echo "<td><a class='btn btn-success' href='table.php?upid=".$row['id']."'>Edit</a> 
                            <a class='btn btn-danger' href='table.php?did=".$row['id']."'>Delete</a></td>";
                            echo "</tr>";
                        
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>