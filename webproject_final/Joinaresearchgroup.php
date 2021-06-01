<?php

$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';

if(isset($_POST['sendd'])){  
   
    $student_id = $_POST['student_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gpa = $_POST['gpa'];
    $resume = $_POST['resume'];
    $message = $_POST['message'];
    $courseinstructor = $_POST['courseinstructor'];
    
    $conn = mysqli_connect($server, $user, $password, $database);   // connect to the database

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }


    $query = "INSERT INTO join_requests(student_id,firstname,lastname,gpa,resume,message,courseinstructor) VALUES(?,?,?,?,?,?,?)"; 
    $result = mysqli_prepare($conn,$query);
    
    mysqli_stmt_bind_param($result,'issdsss',$student_id,$firstname,$lastname,$gpa,$resume,$message,$courseinstructor);

    mysqli_stmt_execute($result);
    print(mysqli_stmt_error($result) . "\n");

    echo "<br>";
    echo "Request Sended Successfully!";
    echo "<br>";
    echo " <b> Student ID: </b> ". $student_id . "<br>";
    echo " <b> First Name: </b>". $firstname . "<br>" ; 
    echo " <b> Last Type: </b> ". $lastname . "<br>" ; 
    echo " <b> GPA: </b> ". $gpa . "<br>" ; 
    echo " <b> Resume: </b> ". $resume . "<br>" ; 
    echo " <b> Message: </b> ". $message . "<br>" ; 
    echo " <b> Instructor: </b> ". $courseinstructor . "<br>" ; 

    mysqli_stmt_close($result);
    mysqli_close($conn);


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join a research group</title>
    <link rel="stylesheet" href="./Joinaresearchgroup.css">
</head>
<body>
<a href="student.php">
    
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAe1BMVEX///8AAADw8PBTU1MYGBj09PTLy8thYWGVlZXr6+uYmJjIyMjDw8PGxsbZ2dn4+PhBQUEjIyOlpaWenp4uLi5jY2N3d3c0NDQ5OTltbW3T09O2trbl5eWsrKwpKSmPj49KSkpxcXGCgoILCwsXFxdNTU2IiIhZWVkeHh6i/8NvAAAElUlEQVR4nO2di0IiMQxFmXER1scwA4K88YHC/3/hAuqKTFop9ja23PMBJpem07RJa6NBCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCfidFe9T6pD8avM7GRUfbK38UD5nEuny9SUNlT9T3Ttn9q+3fj+naBG5ZTeIeyfF3AjdUV01tN3/AxREKNyyiHcfiOIEbutqunsjV0Qqzcqzt7Ek8Hq9wE6ra3p7CkdPwnfsIl46+k8Isu9F22JmFo8Ksp+2xK9euCrMnbZdduXOW+KjtsiMTZ4XZQNtnR0buEmML1Ja7xNg+N9btk0xsi0bebVWOEqfaPjvTae6RF5O2vO//z1DbYR/cWr9BsX1tZJo9y2oZ506jRsd8xpFEnG5pGmM1tiXDjDHriXArZWBqmI1pfGx25KUsMdd2zB8dWeKrtl8e6cxFiTEfox4yFRXGesIoIn5RS22vvDKQJBbaXvmkIymM8gTVyExQmEzq9sa9IDGdvGaL9LGZaTvllY5wEBD8aLE5vgR+3p6EQcRZk5gNd0ZXl6C/L9WLQ1ZOi88tQAuUTq3rClG/psCXCkSFSfuFStUEYkji8qthzEIlLIltiCGBWg0JYvmyrnCEsCNwWzeNmIp53cwFwIyAVAWETJC6mTDbCyF4QBvwupl7hJlD5DpuC2FKR6GhUL1C2KqbuUOY+YqpEg+p1GqMoTgHt0DOUOpm4DtEcy8FYucm7PNfAGb2MQuEbGuE1LuPsPOJMURBm29hD4w9Fba0+2Cqe8J5GzTztggEdRIIJ9+3GEs7wguUDr6BR1GWOYj6XaW2FJCphnUEr1E2h3VbkNxwR/gQlaMGVuq2hCiuXWklWEOd7FkEwkJUNLoG2RJ29B8AP97SoT6olK8xBw39fZizRJU5KBeB55DzYI1lYrOrEDtOIOVDyxxENn3KbbaIHkydOSiXuCE7J4VUbYssELEYKs1BQ/MeIGPTCdGptBBihlBnmZAaFHb4P8xTSdUKQ9Nelj17L+BppGpjS6u39x6F8HMwn9j69b3XnCwhisgN85srY3i+4TtGLSM4b1345aUUyvWH+J4Yljmog+8Ks/s1SDC+07Xj78wHwnfdt7PUVnRA6XtX6HwZGUzp+zPadL04B8b7CB71+EhAAHvCb9+PCQqimNbWFrUPJEE84ZYuigdMoen3LPeo+yNCL5kKfVyl8IQnAfzzgLwUK185CsoLuBPYeFIShuUAf/dHc8EYTYLco1SSeL8I96yg5UmuZfXHL+tqPiz7i0ngC/dmiVXRzL3SVHp8zhyod6ncrjKP4pISo8EcqPP4nouRMUusUhlFy6KRvsQq/UCdpz+K6/QlPqcv8QwWjTOYi8lkN2fwuWEClwJM4FLgrBeNZL6oZ5DAmQM1mVe4zBKDvVeBxhyoybyHZ5QY7lkVNKZATejZRoNE3M3A8MiBCnk1QgtRYmzv+9uRAjWplzfFUUwlq/mgJjGtIN1yGKipDWHjUGLAh+LCsdeUskzqbdhPpu/dU1W8/wbuW/LrXrs7TlcfIYQQQgghhBBCCCGEEEIIIYQQQoiZfwjjOjLK3UvHAAAAAElFTkSuQmCC" width="40px" height="40px" id="back"> 
    
    </a>
    
    <fieldset class = "field">
        <legend> <h2> <b>Instructors</b> </h2> </legend>
        <table class ="table">
            <tr>
                <th>Name - Surname</th>
                <th>Research Area</th>
                
            </tr>
            <?php
           $server = 'localhost';
           $database = 'secretary' ;
           $user =  'webuser';
           $password = '123456';
           
            $conn = mysqli_connect($server, $user, $password, $database);
       
            // check connection
            if(!$conn){
                die("connection failed" . mysqli_connect_error());
            }

           $sql = "SELECT DISTINCT courseinstructor, coursename FROM courses,accounts2 WHERE acc_type='Instructor' ";
    $result=mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {

                    echo "<tr>" .
                          
                            "<td>" . $row['courseinstructor'] . "</td>" . 
                            "<td>" . $row['coursename'] . "</td>" . 
                          
                         "<tr>";
                }
             
                echo "</table>";
               
            } else{
                echo "No results";
            }
            
            mysqli_close($conn);
        ?>

        
        </table>
    
    
    </fieldset>
    <br><br><br>
    
 <fieldset id="field">
   <table>
   <form action="joinaresearchgroup.php" method="post">

   Your First name:
<input type="text" name="firstname">

<br><br>

Your Last name:
<input type="text" name="lastname">
<br><br>

Student ID :
<input type="text" name="student_id">
<br><br>

GPA:
<input type="text" name = "gpa">
<br><br>

Upload your resume file: 
<input class id ="file" type="file" name="resume">
<br><br>

<div>
    Select an instructor:
    <select class ="select" name="courseinstructor" size="1"  required >
    
    <?php

$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';

$conn = mysqli_connect($server, $user, $password, $database);
    
    $sql = "SELECT fullname FROM accounts2 WHERE acc_type='Instructor' ";
    $result=mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<option>" . $row["fullname"]. "</option>" ;
        }
      } else {
        echo "No existing instructor!";
      }
    
    mysqli_close($conn);
?> 
    </select>
    <br><br>
    <textarea cols="45" rows="5" name="message">Send a message...</textarea>
<br><br>

<button  type="submit" name="sendd" class="but" >Send</button> 

</div>
    </table>
    </form>
</fieldset>
 
<br><br>


    
</body>
</html>