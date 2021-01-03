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
$query="INSERT INTO `users` (`username`, `password`, `fname`, `lname`, `sex`, `bdate`, `city`, `whours`, `role`, `hid`) VALUES('$un', '$pw', '$fn', '$ln', '$sex', '$bd', '$ct', NULL, $role, NULL)";
$result=mysqli_query($query, $conn);
$affected=mysqli_affected_rows($conn);
if(affected>0){
echo ("The insertion of admin '$fn' '$ln' is well done.");
}
else{
echo mysqli_error($conn);
}


?>