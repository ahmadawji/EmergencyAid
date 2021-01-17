

<?php 
session_start();
?>

<?php
//this api is used for getting the users that are available
require 'connection.php';

$city=$_GET['city'];
$hid =$_GET['hid'];
$query="Select username, fname, lname, username, whours,password ,sex, bdate,users.city,role, profileImag, users.hid from users where users.hid='$hid' and role=3 and city='$city'";
/* $query="Select username, fname, lname, username, whours,password ,sex, bdate,users.city,role, profileImag, users.hid from users where users.hid=-1 and role=3"; */
$result=mysqli_query($conn, $query);
$numrows= mysqli_affected_rows($conn);
if ($numrows>0){
        while( $row= mysqli_fetch_assoc($result)){
                $myArray[]=$row;
        }
    
    }else{
    echo mysqli_error($conn);
}


$info = json_encode($myArray);

echo $info;

?>