<?php

include 'config.php';

 if(isset($_POST['submit'])) {
   $name=$_POST['name'];
   $contact_no=$_POST['contact_no'];
   $gender=$_POST['gender'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $cpassword=$_POST['cpassword'];

   if($password == $cpassword){

   $sql="SELECT * FROM trainer_table WHERE email='$email'";
   $result=mysqli_query($conn,$sql);
   if(!$result->num_rows>0){

   $sql=" INSERT INTO `trainer_table`( `name`, `contact_no`, `gender`, `email`, `password`) VALUES ('$name','$contact_no','$gender','$email','$password')";
  $result=mysqli_query($conn,$sql);
 if($result){
    echo "<script>alert('Trainer registration successfull')</script>";
    $name="";
    $contact_no="";
    $gender="";
    $email="";
    $_POST['password']="";
    $_POST['cpassword']="";
 }else{
     echo"<script>alert('Registration not successfull')</script>";
 }
 }else{
    echo"<script>alert('Woops! email already exist.')</script>";
}
}else{
  echo"<script>alert('password not matched.')</script>";
}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="form-container">

    <form action="" method="post">
        <h3>register now</h3>
        <input type="text" name="name" required placeholder="enter your name">
        <input type="text" name="contact_no" required placeholder="enter your contact_no">
        <input type="text" name="gender" required placeholder="enter your gender">
        <input type="text" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="cpassword" required placeholder="confirm password">
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="trainer_login_form.php">login now</a></p>
    <form>
</body>
</html>