<?php
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


                $id = $_POST['sno'] ;
                $city = $_POST['city'] ;
                $state = $_POST['state'] ;
                $dish = $_POST['dish'] ;
                $price = $_POST['price'] ;
                $area = $_POST['area'] ;
                $price = $_POST['price'] ;
                // $sql = "UPDATE `patient` SET `report_img` = '$fileNewname' WHERE `patient_id` = $id"; 
                $sql = "UPDATE `area_wise_restaurants` SET `area` = '$area', `city` = '$city', `state` = '$state', `dishes_name` = '$dish', `dishes_image` = '$fileNewname', `price` = '$price' WHERE `area_wise_restaurants`.`sno.` = '$id'";

                $update_result = mysqli_query($conn, $sql);

                move_uploaded_file($fileTmpName, $fileDestination);
                if($update_result){ 
                    
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

