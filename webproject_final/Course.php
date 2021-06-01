<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Course.css">
    <title>My Courses</title>
</head>
 <br><br>
<body>
    <br><br>
    <br>
    <div id="mid">
        <h1>My Courses</h1>
    </div>
    
    <br>
    <fieldset class = "field">
        <table class ="my" align="center">
        
            <br> <br> <br>
            <tr id="yazı">
                <th >Code</td>
                <th>Name</td>
                <th>Type</th>
                <th> Time</th>
                <th> Instructor</th>
       
               

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

            $sql = "SELECT coursecode, coursename, coursetype, coursetime, courseinstructor FROM courses,login WHERE courses.courseinstructor = login.fullname";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_assoc($result)){

                    echo "<tr>" .
                            "<td>" . $row['coursecode'] . "</td>" . 
                            "<td>" . $row['coursename'] . "</td>" . 
                            "<td>" . $row['coursetype'] . "</td>" . 
                            "<td>" . $row['coursetime'] . "</td>" . 
                        //'<td >  <a href="delete.php?id='.$row['id'].'"onclick="return uyari(); ">Delete</a> </td>' .
                        "<td>" . $row['courseinstructor'] . "</td>" . 
                        
                    //    '<td> <input type="file" value="uplaod" name="file"></td>'.
                      //  '<td> <input type="button" value="Download"></td>'.
                   //     '<td> <input type="submit" value="Submit" name="submit"></td>'.
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
    
    <hr>

    <a href="instructor.php">
    
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAe1BMVEX///8AAADw8PBTU1MYGBj09PTLy8thYWGVlZXr6+uYmJjIyMjDw8PGxsbZ2dn4+PhBQUEjIyOlpaWenp4uLi5jY2N3d3c0NDQ5OTltbW3T09O2trbl5eWsrKwpKSmPj49KSkpxcXGCgoILCwsXFxdNTU2IiIhZWVkeHh6i/8NvAAAElUlEQVR4nO2di0IiMQxFmXER1scwA4K88YHC/3/hAuqKTFop9ja23PMBJpem07RJa6NBCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCfidFe9T6pD8avM7GRUfbK38UD5nEuny9SUNlT9T3Ttn9q+3fj+naBG5ZTeIeyfF3AjdUV01tN3/AxREKNyyiHcfiOIEbutqunsjV0Qqzcqzt7Ek8Hq9wE6ra3p7CkdPwnfsIl46+k8Isu9F22JmFo8Ksp+2xK9euCrMnbZdduXOW+KjtsiMTZ4XZQNtnR0buEmML1Ja7xNg+N9btk0xsi0bebVWOEqfaPjvTae6RF5O2vO//z1DbYR/cWr9BsX1tZJo9y2oZ506jRsd8xpFEnG5pGmM1tiXDjDHriXArZWBqmI1pfGx25KUsMdd2zB8dWeKrtl8e6cxFiTEfox4yFRXGesIoIn5RS22vvDKQJBbaXvmkIymM8gTVyExQmEzq9sa9IDGdvGaL9LGZaTvllY5wEBD8aLE5vgR+3p6EQcRZk5gNd0ZXl6C/L9WLQ1ZOi88tQAuUTq3rClG/psCXCkSFSfuFStUEYkji8qthzEIlLIltiCGBWg0JYvmyrnCEsCNwWzeNmIp53cwFwIyAVAWETJC6mTDbCyF4QBvwupl7hJlD5DpuC2FKR6GhUL1C2KqbuUOY+YqpEg+p1GqMoTgHt0DOUOpm4DtEcy8FYucm7PNfAGb2MQuEbGuE1LuPsPOJMURBm29hD4w9Fba0+2Cqe8J5GzTztggEdRIIJ9+3GEs7wguUDr6BR1GWOYj6XaW2FJCphnUEr1E2h3VbkNxwR/gQlaMGVuq2hCiuXWklWEOd7FkEwkJUNLoG2RJ29B8AP97SoT6olK8xBw39fZizRJU5KBeB55DzYI1lYrOrEDtOIOVDyxxENn3KbbaIHkydOSiXuCE7J4VUbYssELEYKs1BQ/MeIGPTCdGptBBihlBnmZAaFHb4P8xTSdUKQ9Nelj17L+BppGpjS6u39x6F8HMwn9j69b3XnCwhisgN85srY3i+4TtGLSM4b1345aUUyvWH+J4Yljmog+8Ks/s1SDC+07Xj78wHwnfdt7PUVnRA6XtX6HwZGUzp+zPadL04B8b7CB71+EhAAHvCb9+PCQqimNbWFrUPJEE84ZYuigdMoen3LPeo+yNCL5kKfVyl8IQnAfzzgLwUK185CsoLuBPYeFIShuUAf/dHc8EYTYLco1SSeL8I96yg5UmuZfXHL+tqPiz7i0ngC/dmiVXRzL3SVHp8zhyod6ncrjKP4pISo8EcqPP4nouRMUusUhlFy6KRvsQq/UCdpz+K6/QlPqcv8QwWjTOYi8lkN2fwuWEClwJM4FLgrBeNZL6oZ5DAmQM1mVe4zBKDvVeBxhyoybyHZ5QY7lkVNKZATejZRoNE3M3A8MiBCnk1QgtRYmzv+9uRAjWplzfFUUwlq/mgJjGtIN1yGKipDWHjUGLAh+LCsdeUskzqbdhPpu/dU1W8/wbuW/LrXrs7TlcfIYQQQgghhBBCCCGEEEIIIYQQQoiZfwjjOjLK3UvHAAAAAElFTkSuQmCC" width="40px" height="40px" id="back"> 
    
    </a>
</body>
</html>