

<?php 
session_start();
?>

<?php
require 'connection.php';
//this api will update the users so that they will be not assigned to any hospital

$username=$_POST['username'];

$query="UPDATE `users` SET `hid` = '-1' WHERE `users`.`username` = '$username'";
$result=mysqli_query($conn, $query);
$numrows= mysqli_affected_rows($conn);
if ($numrows>0){
$info = json_encode($myArray);
echo $info;
    }else{
    echo mysqli_error($conn);
}
 

?>