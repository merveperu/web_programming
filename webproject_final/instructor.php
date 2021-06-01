<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Instructor.css">
    <title>Instructor Home Page</title>
</head>
<body>

    <br><br>

    <div id="middle">
        <h1>Instructor Home Page</h1>
    </div>

    <br>

    <div class="menu">
        <ul>
            <li> <a href="Course.php">  Courses Page </a></li>
            <li> <a href="Research.php"> Research Group Page </a></li>
        
        </ul>
    </div>

<br><br><br>
<form action="instructor.php" method="post">

<button id="logout" type="submit" name="logout">Log out</button> 
</form>

</html>

<?php

$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';

    $conn = mysqli_connect($server, $user, $password, $database);
    

   if(isset($_POST['logout'])){
    $query = "DELETE FROM login ";
    $result=mysqli_query($conn,$query);
    header("Location:mainpage.php");

   }
 
?>