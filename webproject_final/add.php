<?php

$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';

    $conn = mysqli_connect($server, $user, $password, $database);
    
    $coursecode = $_GET['coursecode'];
    $query = "INSERT INTO taken_courses SELECT coursecode,coursename,coursetype,courseinstructor FROM courses WHERE coursecode ='$coursecode'  ";
    $result=mysqli_query($conn,$query);

    if($result<0){
        echo "error" . mysqli_error($conn);
    
    }
    
    else{
        $coursecode = $_GET['coursecode'];
        $query2 = "DELETE FROM courses WHERE coursecode = '$coursecode'";
        $result2=mysqli_query($conn,$query2);
    
        header("Location: StudentCourses.php");
        
    }
    



?>