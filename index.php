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
            $_SESSION['adminusername']=$r['username'];
            $_SESSION['role']=$r['role'];
            header("location:profileadmin.php?"); // Redirecting To Other Page
        }
        else if ($role==2){
            $_SESSION['fName']=$r['fname'];
            $_SESSION['lName']=$r['lname'];
            $_SESSION['managUsername']=$r['username'];
            $_SESSION['managerCity']=$r['city'];
            $_SESSION['hid']=$r['hid'];
            $_SESSION['role']=$r['role'];
            header("location:profileManager.php?");  
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
    <link rel="stylesheet" href="css/style1.css">
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

<div style="width:50%">
<h1>Project done by Ahmad Awji id:31730414 </h1>
    <h2>What is this project?</h2>
    <p style="font-weight:bold">Its a project that allows an admin to create, read, update, and delete all kind of users on the system.</p>
    <p style="font-weight:bold">It allows user with role '2' which is an HR at a hospital to look for nurses in the hospital's area and assign a nurse in the case of emergency if they are out of nurses and they need more nurses to help them.</p>
    <ul>
        <li>To login as an admin:<br> username:admin  password: admin</li>
        <li>To login as hospital HR :<br> username:aliawji  password: 123</li>
    </ul>
</div>
 </div>
</body>
</html>