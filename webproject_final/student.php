<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home Page</title>
    <link rel="stylesheet" href="./Student.css">
</head>
<body>


  <br><br>

  <div id="middle">
      <h1>Student Home Page</h1>
  </div>

  <br>

  <div class="menu">
      <ul>
        <li><a href="StudentCourses.php"> COURSES </a></li>
        <li><a href="Joinaresearchgroup.php"> JOIN A RESEARCH GROUP </a></li>
      
      </ul>
  </div>

<br><br><br>
<form action="student.php" method="post">

<button id="logout" type="submit" name="logout">Log out</button> 

</form>

</body>
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