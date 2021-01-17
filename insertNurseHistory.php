

<?php 
session_start();
?>

<?php
require 'connection.php';
//this api will update the users so that they will be not assigned to any hospital

$username=$_POST['username'];
$managerHid= $_SESSION['hid'];

$query="INSERT into history VALUES ('$username', '$managerHid')";
$result=mysqli_query($conn, $query);
$numrows= mysqli_affected_rows($conn);
if ($numrows>0){
echo "Success!";
    }else{
    echo mysqli_error($conn);
}
 

?>