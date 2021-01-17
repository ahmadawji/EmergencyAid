<?php
require 'connection.php';
$query='Select hid, hname from hosp';
$result=mysqli_query($conn, $query);
$numrows= mysqli_affected_rows($conn);
if ($numrows>0){
        while( $row= mysqli_fetch_assoc($result)){
                $myArray[]=$row;
        }
    
    }else{
    echo mysqli_error($conn);
}


$myHosp = json_encode($myArray);

echo $myHosp;

?>