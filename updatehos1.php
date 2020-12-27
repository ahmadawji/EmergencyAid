<?php
session_start()
?>


<?php
require 'connection.php';
$error='';
$id = $_SESSION['hosid'];
if(ISSET($_POST['update'])){
$hname=$_POST['hospitalname'];
$city=$_POST['city'];
$query= "update hosp set hname='$hname', city='$city' where hid=$id";
$res= mysqli_query($conn, $query);
$row=mysqli_affected_rows($conn);
echo mysqli_error($conn);
if ($row!=1) {
  $error= "Error : ". mysqli_error($conn);
}else{
    
    header("Location:profileadmin.php");
}
}

  $query = "select * from hosp where hid ='$id'";
  $res = mysqli_query($conn,$query);
  $r= mysqli_fetch_array($res);
  $row=mysqli_affected_rows($conn);
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

<h2 style="font-size: 2em; float:left;">Update Hospital</h2>
    <form  action="" method="POST">
        <label for="hn" >Hospital Name</label>
        <input type="text" id="hn" name="hospitalname" placeholder="username" value="<?php echo $r['hname']?>">
        <label for="ct">City</label>
        <input type="text" id="ct" name="city" placeholder="password"  value="<?php echo $r['city']?>">
        <input type="submit" name="update" value="Update">
    </form>
    <div>
        <span><?php echo $error ?></span>
    </div>

 </div>
</body>
</html>