<?php


$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';


if(isset($_POST['register'])){  
    $fullname = $_POST['fullname'];
    $username = $_POST['usn'];
    $passw = $_POST['passw'];
    $acc_type = $_POST['acc_type'];  

    $conn = mysqli_connect($server, $user, $password, $database);   // connect to the database

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }


    $query = "INSERT INTO accounts2(fullname,username,passw,acc_type) VALUES (?,?,?,?)";
    $result = mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($result,'ssss',$fullname,$username,$passw,$acc_type);

    mysqli_stmt_execute($result);
    print(mysqli_stmt_error($result) . "\n");

    echo "<br>";
    echo "New Record Created Successfully!";
    echo "<br>";
    echo " <b> Full Name: </b> ". $fullname . "<br>";
    echo " <b> Username: </b> ". $username . "<br>" ; 
    echo " <b> Account Type: </b> ". $acc_type . "<br>" ; 

    mysqli_stmt_close($result);
    mysqli_close($conn);
}

?>

<?php

session_start();

$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';

if(isset($_POST['login'])){  

    $fullname=$_POST['fullname'];
    $usnlogin=$_POST['usnlogin'];
    $passwlogin=$_POST['passwlogin'];
    $acc_typelogin = $_POST['acc_typelogin'];

    $conn = mysqli_connect($server, $user, $password, $database);
    
    $sql = "SELECT * FROM accounts2 WHERE username='$usnlogin' and passw='$passwlogin' and acc_type='$acc_typelogin' and fullname='$fullname' ";
    $result=mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);
 
    $query = "INSERT INTO login(fullname) VALUES (?)";
    $result2 = mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($result2,'s',$fullname);

    mysqli_stmt_execute($result2);

if ($num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)){
        
        $_SESSION['firstname']=$firstname2;
        $_SESSION['lastname']=$lastname2;

    $_SESSION['username']=$usnlogin;
    $_SESSION['passw']=$passwlogin;
    $_SESSION['acc_type']=$acc_typelogin;

   if ( $_SESSION['acc_type'] == "Secretary") 
   {
       header ( "location: secretary.php" );
   } 
   else if ( $_SESSION['acc_type'] == "Instructor") 
   {
       header ( "location: instructor.php" );
   } 
   else if ( $_SESSION['acc_type'] == "Student") 
   {
       header ( "location: student.php" );
   }
}
    
}
else {
    echo "Incorrect entry! Try again.";
    echo "<br>";
    echo "If you do not have an account, you need to register first!";
    }

}
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="./main_page.css">
</head>
<body>


<div id="register">REGISTER</div>
<div id="lo">LOGIN</div>
                                     <!--          REGISTER           -->
<form action="mainpage.php" method="post">

    Full Name:
    <input type="text" placeholder="Enter Full Name" name="fullname" id="fn" size="15px"  required>
    
    <br><br>
    
   
    Username:
    <input type="text" placeholder="Enter Username" name="usn" id="usn" size="15px" required>
    
    <br><br>
    
    Password (max 10 characters):
    <input type="password" placeholder="Enter Password" name="passw" maxlength="10" size="15px" id="psw" required>
    
    <br><br>
    
    Account Type:
    <select name="acc_type" id="acc" required >
    <option value="Secretary" >Secretary</option>
    <option value="Instructor" id="inst">Instructor</option>
    <option value="Student" >Student</option>
    </select>
    <br><br>
    <hr>
    <br><br>

    <button id="s" type="submit" name="register">Register</button> 
     <button id="r" type="reset">Reset</button> 

</form>


    <hr id="hrr">
<br><br><br>
                      <!--          LOGIN           -->
<form id="formtwo" action="mainpage.php" method="post">

    Full Name:
    <input type="text" placeholder="Enter Full Name" name="fullname" id="fn" size="15px"  required>
    
    <br><br>
    
    Username:
    <input type="text" placeholder="Enter Username" name="usnlogin" id="usn" size="15px"  required>
    
    <br><br>
    
    Password (max 10 characters):
    <input type="password" placeholder="Enter Password" name="passwlogin" maxlength="10" size="15px" id="psw" required>
    
    <br><br>

    Account Type:
    <select name="acc_typelogin" id="acc" required >
    <option value="Secretary" >Secretary</option>
    <option value="Instructor" id="inst">Instructor</option>
    <option value="Student" >Student</option>
    </select>

    <br><br>
    <hr>
    <br><br>

    <button id="s" type="submit" name="login">Login</button> 
    <button id="r" type="reset">Reset</button> 

</form>

</body>
</html>