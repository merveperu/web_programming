<?php

$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';

    $conn = mysqli_connect($server, $user, $password, $database);
    /*

    $query = "INSERT INTO accepted_requests SELECT student_id, firstname, lastname, gpa FROM join_requests  ";
    $result=mysqli_query($conn,$query);

    if($result){
        echo"added";
    }

    else{
        echo "error adding course" . mysqli_error($conn);
    }
*/

$student_id = $_GET['student_id'];
$query = "INSERT INTO accepted_requests SELECT student_id, firstname, lastname, gpa FROM join_requests  WHERE student_id = '$student_id'";
$result=mysqli_query($conn,$query);
if($result<0){
    echo "error" . mysqli_error($conn);

}

else{
    $student = $_GET['student_id'];
    $query2 = "DELETE FROM join_requests WHERE student_id = '$student'";
    $result2=mysqli_query($conn,$query2);

    header("Location: Research.php");
    
}




?>