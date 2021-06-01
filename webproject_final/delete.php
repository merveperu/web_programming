<?php

$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';

    $conn = mysqli_connect($server, $user, $password, $database);
    
    $id = $_GET['id'];
    $query = "DELETE FROM courses WHERE id= '$id' ";
    $result=mysqli_query($conn,$query);

    if($result){
        header("Location:secretary.php");
    }

    else{
        echo "error deleting course" . mysqli_error($conn);
    }




?>