

<?php 
session_start();
?>

<?php
//this api will get the history of users that operated in the hospital that manager operates in
require 'connection.php';
$hid=$_GET['hid'];

$query="select users.username, users.fname, users.lname, users.city from users INNER JOIN history on users.username= history.username WHERE history.hid='$hid'";

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