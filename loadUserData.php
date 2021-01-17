

<?php 
session_start();
?>

<?php
require 'connection.php';
/*SELECT username, fname, lname, username, password ,sex, bdate, profileImag, users.hid, hname from users INNER JOIN hosp on users.hid=hosp.hid where users.username='aliawji'*/
 $query="Select username, fname, lname, username, password ,sex, bdate,users.city, profileImag, users.hid, hname from users INNER JOIN hosp on users.hid=hosp.hid
where username= "."'".$_SESSION['managUsername']."' "; 

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