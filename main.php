<?php
session_start();
?>


<?php
$error=""; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
    $error="Username or Password are empty";
}else{
    require 'connection.php';
    $username=$_POST['username'];
    $password=$_POST['password'];			
    
    $q="select * from users where username='".$username."'  
    AND password='".$password."'";
    $result=mysqli_query($conn,$q);
    $rows=mysqli_num_rows($result);
    if ($rows == 1) { 
        $r=mysqli_fetch_array($result);
        $role=$r['role'];
        if($role ==1 ){
            $_SESSION['username']=$r['username'];
            header("location:profileadmin.php?"); // Redirecting To Other Page
        }
        else if($role ==2){
            include 'hr.php';
        }
        else {//matching is not correct
            include 'employee.php';
        }
    
    } 
    else{
        $error = "Username or Password is invalid";
    }
    mysqli_close($conn); // Closing Connection
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>LogIn</title>
</head>
<body>
<div class="main">
<div class="header">
<h1 class="icon">EmergencyAid</h1>
</div>

<div>
    <form class="log" action="" method="POST">
        <h2 style="font-size: 2em;">Log In</h2>
        <label for="un" >Username</label>
        <input type="text" name="username" placeholder="username">
        <label for="pw">Password</label>
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="submit" value="submit">
    </form>


    <div>
        <span><?php echo $error ?></span>
    </div>
</div>


 </div>
</body>
</html>