
<?php




if (isset($_GET['submit']))
{
 
   
   include("functions.php");
  $mysqli= dbconnect();
   $sql = "INSERT INTO student_info (name, student_id, email,password,gender)
VALUES ('".$_GET['name']."','".$_GET['student_id']."','".$_GET['email']."','".$_GET['psw']."','".$_GET['gender']."')"; //concat

if ($mysqli->query($sql) === TRUE) {
  echo "You've succesfully registered";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        
        <form action=""register.php" method=":get">
        
            <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for ="name" ><b> Full Name: </b></label><!-- comment -->
    <input type="text" id="name" name="name"><br><br>
 <b>Gender: <b> <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label><br><br>
  <label for ="student_id" >Student ID:</label><!-- comment -->
    <input type="text" id="student_id" name="student_id"><br><br>

  <label for="email"><b>Email</b></label>
  <input type="text" placeholder="Enter Email" name="email" id="email" required><br><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required><br><br>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>

    
    <button type="submit" class="registerbtn" name="submit" >Register</button>
  </div>

            
            
            
            
            
            
        
            
        </form>
        
       
    </body>
</html>
