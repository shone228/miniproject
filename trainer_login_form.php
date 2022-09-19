<?php

include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM trainer_table WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
     $row=mysqli_fetch_assoc($result);
     $_SESSION['username']=$row['username'];
     header("location: home_page.php");
    }else{
    echo"<script>alert('Woops! email or password is wrong.')</script>";
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="form-container">

    <form action="" method="post">
        <h3>login now</h3>
        <input type="text" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="trainer_register_form.php">register now</a></p>
    <form>
</body>
</html>