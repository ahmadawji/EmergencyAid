<?php
require 'connection.php';
$fn=$_POST['fn'];
$ln=$_POST['ln'];
$un=$_POST['un'];
$pw=$_POST['pw'];
$sex=$_POST['sex'];
$bd=$_POST['bd'];
$city=$_POST['ct'];
$role=$_POST['role'];
$hid=$_POST['hid'];
$query="INSERT INTO `users` (`username`, `password`, `fname`, `lname`, `sex`, `bdate`, `city`, `profileImag`, `whours`, `role`, `hid`) VALUES('$un', '$pw', '$fn', '$ln', '$sex', '$bd', '$city','ProfileImag/profileImag.png', NULL, $role, '$hid')";
$result=mysqli_query($conn,$query);
if(mysqli_affected_rows($conn)>0){
echo "success!";
}
else{
echo mysqli_errno($conn);
}


?>