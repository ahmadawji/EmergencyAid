<?php 
session_start();

?>

<?php
require 'connection.php';
if(isset($_POST['submit'])){
$file=$_FILES['uploadImag'];
print_r($file);
$fileName=$_FILES['uploadImag']['name'];
$fileTempName=$_FILES['uploadImag']['tmp_name'];
$fileSize=$_FILES['uploadImag']['size'];
$fileError=$_FILES['uploadImag']['error'];
$fileType=$_FILES['uploadImag']['type'];

 $fileExt=explode('.',$fileName);//explode will help us get the extension of the file by splitting the file name to an array when it checks a '.' its like split method in js 
$fileActualExt=strtolower(end($fileExt));//end will get the last part of the array which is the file extension

$allowed=array('jpg','jpeg', 'png');
if(in_array($fileActualExt,$allowed)){
    if($fileError===0){//if we had no errors uploading this file
        if($fileSize<500000){//500000 bytes
            $fileNameNew=$_SESSION['managUsername'].".".$fileActualExt;
            $fileDestination='ProfileImag/'.$fileNameNew;
            move_uploaded_file($fileTempName,$fileDestination);
            $query="Update `users` Set `profileImag` ='$fileDestination' where username= "."'".$_SESSION['managUsername']."'";
            $result=mysqli_query($conn,$query);
            if(mysqli_affected_rows($conn)>0){
            echo "success!";
                }
            else{
            echo mysqli_errno($conn);
                }
            header("Location: profileManager.php");

        }else{
            echo "Youre file is too big!";
        }
        

    }else{
        echo "There was an error uploading your file.";
    }
}else{
echo "You cant upload a file of this type.";
}

} 

?>