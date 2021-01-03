<?php
require 'connection.php';
$query='Select city from users group by city';
$result=mysqli_query($conn, $query);
$numrows= mysqli_affected_rows($conn);
if ($numrows>0){
        while( $row= mysqli_fetch_assoc($result)){
                $myArray[]=$row;
        }
    
    }else{
    echo mysqli_error($conn);
}


$myCities = json_encode($myArray);

echo $myCities;

?>