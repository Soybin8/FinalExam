<?php

include 'config.php';
$name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
  if(mysqli_num_rows($select) > 0){
     $message[] = 'user already exist!';
  }else{
     mysqli_query($conn, "INSERT INTO `user_form`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
     $message[] = 'registered successfully!';
     header('location:login.php');
  }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="glenn.css">
    <link rel="stylesheet" href="<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,500;1,600&family=Poppins:wght@300&display=swap" rel="stylesheet">">

  </head>
  <body>

    <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

    <div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="name" required placeholder="enter username" class="box">
      <input type="email" name="email" required placeholder="enter email" class="box">
      <input type="password" name="password" required placeholder="enter password" class="box">
      <input type="password" name="cpassword" required placeholder="confirm password" class="box">
      <input type="submit" name="submit" class="btn" value="register now">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

  </body>
</html>
