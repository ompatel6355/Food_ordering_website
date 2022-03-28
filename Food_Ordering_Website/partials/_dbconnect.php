<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "food ordering";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    echo mysqli_error($conn);
}
// else{
//     echo "connection successful";
// }

?>