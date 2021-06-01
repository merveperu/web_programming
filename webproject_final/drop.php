<?php

$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';

    $conn = mysqli_connect($server, $user, $password, $database);
    
    $coursecode = $_GET['coursecode'];
    $query = "DELETE FROM taken_courses  WHERE coursecode ='$coursecode'  ";
    $result=mysqli_query($conn,$query);

    if($result){
        
        header("Location:StudentCourses.php");

    }

    else{
        echo "error dropping record" . mysqli_error($conn);
    }




?>