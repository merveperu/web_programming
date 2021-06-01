<?php

$server = 'localhost';
$database = 'secretary' ;
$user =  'webuser';
$password = '123456';

if(isset($_POST['create'])){  
    $coursecode = $_POST['coursecode'];
    $coursename = $_POST['coursename'];
    $coursetype = $_POST['coursetype'];
    $courseinstructor = $_POST['courseinstructor'];
    $coursetime = $_POST['coursetime'];
    $conn = mysqli_connect($server, $user, $password, $database);   // connect to the database

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }


    $query = "INSERT INTO courses(coursecode,coursename,coursetype,courseinstructor,coursetime) VALUES (?,?,?,?,?)";
    $result = mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($result,'issss',$coursecode,$coursename,$coursetype,$courseinstructor,$coursetime);

    mysqli_stmt_execute($result);
    print(mysqli_stmt_error($result) . "\n");

    echo "<br>";
    echo "New Course Created Successfully!";
    echo "<br>";
    echo " <b> Course Code: </b> ". $coursecode . "<br>";
    echo " <b> Course Name: </b>". $coursename . "<br>" ; 
    echo " <b> Course Type: </b> ". $coursetype . "<br>" ; 
    echo " <b> Course Instructor: </b> ". $courseinstructor . "<br>" ; 
    echo " <b> Course Time: </b> ". $coursetime . "<br>" ; 

    mysqli_stmt_close($result);
    mysqli_close($conn);


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Create Course</title>
    <link rel="stylesheet" href="./create_course.css">
</head>
<body>
    
    <fieldset>
        <legend> <b> CREATE A NEW COURSE </b> </legend>
        <form action="createcourse.php" method="post">
        <ul>
          <li><label>Course Code: <input type="text" placeholder="Enter Course Code" name="coursecode" required></label></li> <br>
          <li><label>Course Name: <input type="text" placeholder="Enter Course Name" name="coursename" required></label></li> <br>

         <li> Course Type: 
    <select name="coursetype"  required >
      <option value="Mandatory">Mandatory</option>
      <option value="Elective" id="inst">Elective</option>
    </select>
    </li>

<br>
          <li> Course Instructor: 
          <select name="courseinstructor" required>
         <optgroup label="Existing Instructors"> 

    
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
            echo "<option>" . $row["fullname"].  "</option>" ;
        }
      } else {
        echo "No existing instructor!";
      }
    
    mysqli_close($conn);
?> 
            </select>
        </li>
<br>
        
        <li> Course Time : 
            <input type="date" name="coursetime" required>   
        </li>
         <br>

         

        <button id="cr" type="submit" name="create" >Create</button> 
        <button id="res" type="reset" value="Reset" name="reset">Reset</button>

        </ul>
        </form>
    </fieldset> 
<br>



<br><br>

<a href="secretary.php">
    
<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAe1BMVEX///8AAADw8PBTU1MYGBj09PTLy8thYWGVlZXr6+uYmJjIyMjDw8PGxsbZ2dn4+PhBQUEjIyOlpaWenp4uLi5jY2N3d3c0NDQ5OTltbW3T09O2trbl5eWsrKwpKSmPj49KSkpxcXGCgoILCwsXFxdNTU2IiIhZWVkeHh6i/8NvAAAElUlEQVR4nO2di0IiMQxFmXER1scwA4K88YHC/3/hAuqKTFop9ja23PMBJpem07RJa6NBCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCfidFe9T6pD8avM7GRUfbK38UD5nEuny9SUNlT9T3Ttn9q+3fj+naBG5ZTeIeyfF3AjdUV01tN3/AxREKNyyiHcfiOIEbutqunsjV0Qqzcqzt7Ek8Hq9wE6ra3p7CkdPwnfsIl46+k8Isu9F22JmFo8Ksp+2xK9euCrMnbZdduXOW+KjtsiMTZ4XZQNtnR0buEmML1Ja7xNg+N9btk0xsi0bebVWOEqfaPjvTae6RF5O2vO//z1DbYR/cWr9BsX1tZJo9y2oZ506jRsd8xpFEnG5pGmM1tiXDjDHriXArZWBqmI1pfGx25KUsMdd2zB8dWeKrtl8e6cxFiTEfox4yFRXGesIoIn5RS22vvDKQJBbaXvmkIymM8gTVyExQmEzq9sa9IDGdvGaL9LGZaTvllY5wEBD8aLE5vgR+3p6EQcRZk5gNd0ZXl6C/L9WLQ1ZOi88tQAuUTq3rClG/psCXCkSFSfuFStUEYkji8qthzEIlLIltiCGBWg0JYvmyrnCEsCNwWzeNmIp53cwFwIyAVAWETJC6mTDbCyF4QBvwupl7hJlD5DpuC2FKR6GhUL1C2KqbuUOY+YqpEg+p1GqMoTgHt0DOUOpm4DtEcy8FYucm7PNfAGb2MQuEbGuE1LuPsPOJMURBm29hD4w9Fba0+2Cqe8J5GzTztggEdRIIJ9+3GEs7wguUDr6BR1GWOYj6XaW2FJCphnUEr1E2h3VbkNxwR/gQlaMGVuq2hCiuXWklWEOd7FkEwkJUNLoG2RJ29B8AP97SoT6olK8xBw39fZizRJU5KBeB55DzYI1lYrOrEDtOIOVDyxxENn3KbbaIHkydOSiXuCE7J4VUbYssELEYKs1BQ/MeIGPTCdGptBBihlBnmZAaFHb4P8xTSdUKQ9Nelj17L+BppGpjS6u39x6F8HMwn9j69b3XnCwhisgN85srY3i+4TtGLSM4b1345aUUyvWH+J4Yljmog+8Ks/s1SDC+07Xj78wHwnfdt7PUVnRA6XtX6HwZGUzp+zPadL04B8b7CB71+EhAAHvCb9+PCQqimNbWFrUPJEE84ZYuigdMoen3LPeo+yNCL5kKfVyl8IQnAfzzgLwUK185CsoLuBPYeFIShuUAf/dHc8EYTYLco1SSeL8I96yg5UmuZfXHL+tqPiz7i0ngC/dmiVXRzL3SVHp8zhyod6ncrjKP4pISo8EcqPP4nouRMUusUhlFy6KRvsQq/UCdpz+K6/QlPqcv8QwWjTOYi8lkN2fwuWEClwJM4FLgrBeNZL6oZ5DAmQM1mVe4zBKDvVeBxhyoybyHZ5QY7lkVNKZATejZRoNE3M3A8MiBCnk1QgtRYmzv+9uRAjWplzfFUUwlq/mgJjGtIN1yGKipDWHjUGLAh+LCsdeUskzqbdhPpu/dU1W8/wbuW/LrXrs7TlcfIYQQQgghhBBCCCGEEEIIIYQQQoiZfwjjOjLK3UvHAAAAAElFTkSuQmCC" width="40px" height="40px" id="back"> 

</a>


</body>
</html>