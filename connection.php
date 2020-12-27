<?php
$conn=mysqli_connect('localhost','root','','emergency_aid');
mysqli_query($conn, 'SET NAMES "utf8" COLLATE "utf8_general_ci"' );
if (mysqli_connect_errno()) {
    die("Connection failed: " . $conn->connect_error);
  }
?>