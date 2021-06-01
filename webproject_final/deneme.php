<?php

$name = $email = $website = $textarea = $gender = '' ;
$errors = array( 'name'=>'', 'email'=> '' ,'website' => '', 'textarea' => '', 'gender' => '');

    if(isset($_POST['submit'])){
        if(empty($_POST['email'])){
          $errors['email'] = 'E-mail is required';
        }
        else{
          $email = $_POST['email'];
          if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] =  'Email must be a valid';
          }
        }
        echo "<br>";

        if(empty($_POST['name'])){
            $errors['name']= 'Name is required';
        }
        else{
            $name=$_POST['name'];
        }
echo "<br>";
        if(empty($_POST['gender'])){
            $errors['gender']= 'Gender is required';
        }
        else{
            $gender = ($_POST["gender"]);

        }


        if (empty($_POST["website"])) {
            $errors['website']= 'web is required';

          } else {
            $website=$_POST['website'];            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $errors['website'] = 'Not a valid website';
            }
          }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>PHP Form Validation Example</h2>

<form action="deneme.php" method="post">

Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
<span class="error">* <?php echo  $errors['name']?></span>
 <br><br>



E-mail: <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
<span class="error" color = red >* <?php echo  $errors['email']?></span>
 <br><br>



Website: <input type="text" name="website" value="<?php echo htmlspecialchars($website); ?>"> <br><br>


Comment: <textarea name="textarea" rows="5" cols="40" value="<?php echo htmlspecialchars($textarea); ?>"></textarea> <br><br>



Gender:
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">>Female
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">>Male
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
<span class="error">* <?php echo  $errors['gender']?></span>

<br><br>



<input type="submit" name="submit">
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $textarea;
echo "<br>";
echo $gender;
?>
</body>
</html>