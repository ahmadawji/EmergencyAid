<?php
session_start()
?>


<?php

if (!isset($_SESSION['role'])||$_SESSION['role']!=1){
    header('Location: main.php');
    exit;
  }

require 'connection.php';
$error='';
$username = $_SESSION['username'];
if(ISSET($_POST['update'])){
$fname =$_POST['firstname'];
$lname =$_POST['lastname'];
$city= $_POST['city'];
$gender= $_POST['gender'];
$hid=$_POST['hid'];
$query= "update users set fname='$fname', lname='$lname', city='$city',sex='$gender',hid='$hid' where users.username='$username'";
$res= mysqli_query($conn, $query);
$row=mysqli_affected_rows($conn);
echo mysqli_error($conn);
if ($row!=1) {
  $error= "Error : ". mysqli_error($conn);
}else{
    header("Location:profileadmin.php");
}
}


  $query = "select * from users where username ='$username'";
  $res = mysqli_query($conn,$query);
  $r= mysqli_fetch_array($res);
  $row= mysqli_affected_rows($conn);
  if ($row!=1) {
    $error= "Error : ". mysqli_error($conn);
  }
  
  mysqli_close($conn); // Closing Connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Edit</title>
</head>
<body>
<div class="main">
<div class="header">
<h1 class="icon">EmergencyAid</h1>
</div>

<h2 style="font-size: 2em; float:left;">Update Users</h2>
    <form  action="" method="POST">
        <label for="fn" >First Name</label>
        <input type="text" id="fn" name="firstname"  value="<?php echo $r['fname']?>">
        <label for="ln">Last Name</label>
        <input type="text" id="ln" name="lastname" value="<?php echo $r['lname']?>">
        <label for="ct">City</label>
        <input type="text" id="ct" name="city" value="<?php echo $r['city']?>">

        <input type="radio" id="male" name="gender" value="M">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="F"> 
        <label for="female">Female</label><br>

        <label for="hp">Hospital's Name</label>
                <?php
                   require 'connection.php';
                   $result = mysqli_query($conn,"SELECT * FROM hosp");
                   echo "<select name='hid' size=5>";
                   while($r1= mysqli_fetch_array($result)) {
                       echo "<option value=".$r1['hid'] .">" .$r1['hname'] ." </option>";
                   }
                   echo "</select>";
                   mysqli_close($conn);
                ?>

        <input type="submit" name="update" value="Update">
    </form>
    <div>
        <span><?php echo $error ?></span>
    </div>

 </div>
</body>
</html>