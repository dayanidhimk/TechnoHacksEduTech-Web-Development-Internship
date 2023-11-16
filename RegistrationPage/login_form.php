<?php

$conn = mysqli_connect('localhost','root','','webdevint5sem');



if(isset($_POST['submit'])){

   //$name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
   //$cpass = $_POST['cpassword'];

   $select = "SELECT * FROM user_form WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) == 1)
   {
      while($row = mysqli_fetch_assoc($result))
         if(password_verify($pass, $row['password']))
         {
            $_SESSION['login'] = true;
            session_start();
            $_SESSION['name'] = $row['name'];
            header('location:homePage.php'); 
         }
         else
            $error[] = 'Incorrect Password!';
   }
   else
      $error[] = 'Incorrect Email or Password!';

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body background="bg.jpg">
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register Now!</a></p>
   </form>

</div>

</body>
</html>