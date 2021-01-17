

<?php 
session_start();
?>

<?php
require 'connection.php';
//this api will update the users so that they will be assigned to the same hospital as the manager
$hid=$_SESSION['hid'];
$username=$_POST['username'];
$city=$_SESSION['managerCity'];

$query="UPDATE `users` SET `hid` = '$hid' WHERE `users`.`username` = '$username'";
$result=mysqli_query($conn, $query);
$numrows= mysqli_affected_rows($conn);
if ($numrows>0){
    $query1="Select username, fname, lname, username, whours,password ,sex, bdate,users.city,role, profileImag, users.hid from users where users.hid='$hid' and role=3 and city='$city'";
    $result1=mysqli_query($conn, $query1);
    $numrows= mysqli_affected_rows($conn);
    if ($numrows>0){
        while( $row= mysqli_fetch_assoc($result1)){
                $myArray[]=$row;
        }
    
    }else{
    echo mysqli_error($conn);
}


$info = json_encode($myArray);

echo $info;
    }else{
    echo mysqli_error($conn);
}
 

?>