<?php
require 'connection.php';
$hn=$_POST['hn'];
$ct=$_POST['ct'];

$query="INSERT INTO `hosp` (`hname`, `city`) VALUES('$hn', '$ct')";
$result=mysqli_query($conn,$query);
if(mysqli_affected_rows($conn)>0){
echo "success!";
}
else{
echo mysqli_errno($conn);
}


?>