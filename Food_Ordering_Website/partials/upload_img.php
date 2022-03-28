<?php
if(isset($_POST['submit_img'])){
    $file = $_FILES['file']; 
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
     $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'img', 'pdf', 'png');
    if(in_array( $fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){
                $fileNewname = uniqid('', true).".".$fileActualExt ;
                $fileDestination = 'report/'.$fileNewname;


                $id = $_SESSION['id'];
                $email = $_SESSION['email'];
                $sql = "UPDATE `patient` SET `report_img` = '$fileNewname' WHERE `patient_id` = $id";
                mysqli_query($conn, $sql);

                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location:index.php?uploadsuccess");

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