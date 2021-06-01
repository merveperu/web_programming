<?php

$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';

    $conn = mysqli_connect($server, $user, $password, $database);
    
    $student_id = $_GET['student_id'];
    $query = "DELETE FROM accepted_requests WHERE student_id= '$student_id' ";
    $result=mysqli_query($conn,$query);

    if($result){
        header("Location:Research.php");
    }

    else{
        echo "error deleting course" . mysqli_error($conn);
    }




?>