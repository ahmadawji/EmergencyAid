<?php 
session_start();
?>

<?php

/* 
delete for deleting hospitals
delete1 for deleting managers 
delete2 for deleting nurses 

update for updating hospitals 
update1 for updating managers
update2 for updating nurses 
*/

if (!isset($_SESSION['role'])||$_SESSION['role']!=1){
  header('Location: main.php');
  exit;
}

if(ISSET($_POST['delete'])){

  $id = $_POST['delete'];
  require 'connection.php';
  $query = "delete from hosp where hid ='$id'";
  $res = mysqli_query($conn,$query);
  $row=mysqli_affected_rows($conn);

  if ($row!=1) {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}

if(ISSET($_POST['delete1'])){

  $username = $_POST['delete1'];
  require 'connection.php';
  $query = "delete from users where username ='$username'";
  $res = mysqli_query($conn,$query);
  $row=mysqli_affected_rows($conn);

  if ($row!=1) {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}
if(ISSET($_POST['delete2'])){

  $username = $_POST['delete2'];
  require 'connection.php';
  $query = "delete from users where hid ='$username'";
  $res = mysqli_query($conn,$query);
  $row=mysqli_affected_rows($conn);

  if ($row!=1) {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}
  

if(ISSET($_POST['update'])){
  $_SESSION["hosid"] = $_POST['update'];
  header("Location: updatehos1.php");

}

$_SESSION['username']=NULL;
if(ISSET($_POST['update1'])){
  $_SESSION["username"] = $_POST['update1'];
  header("Location: updateusers.php");

}

if(ISSET($_POST['update2'])){
  $_SESSION["username"] = $_POST['update2'];
  header("Location: updateusers.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin1.css">
    <script src="https://kit.fontawesome.com/63cdf32143.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="main">

    <div class="header"> 
        <h1 class="Uicon">Emergency Aid</h1>
          <div style="float:right">
            <?php echo 'Welcome '.$_SESSION['adminusername']?>
          </div>
    </div>

    <div class="navbar">
      <div class="dropdown">
         <button class="dropbtn">Add Member</button>
           <div class=" dropdown-content">
                <a href="addadmin.php">Add Admin</a>
                <a href="#">Add User</a>
                <a href="#">Add Hospital</a>
            </div>
      </div>
      <div class="navitem signout">
          <a href="signout.php">Sign Out</a>
      </div>
    </div>

    <div class="prev hosp">
    <h1>Hospitals info</h1>
    <table>
          <tr>
            <th>Edit</th>
            <th>Delete</th>
            <th>ID</th>
            <th>Hospital Name</th>            
            <th>City</th>
          </tr>
          <?php
          //Hospital's Info 
          require 'connection.php';


            $query = "SELECT * FROM hosp";

            $result = mysqli_query($conn,$query);

            while( $row = mysqli_fetch_array($result) ) {
              echo "<tr>";
              echo "<form method='POST' action=''>";
              echo "<td><button class='update' type='submit' name='update' value='".$row['hid']."'><i class='fas fa-user-edit'></i></button></a></td>";
              echo "<td> <button class='delete' type='submit' name='delete' value='".$row['hid']."'><i class='fas fa-trash-alt'></i></button></td>";
            	echo "<td>" . $row['hid'] . "</td>";
            	echo "<td>" . $row['hname'] . "</td>";
              echo "<td>" . $row['city'] . "</td>";
              echo "</form>";
            	echo "</tr>";
            }
            mysqli_close($conn);

            ?> 

    </table>
    </div>


    <div class="prev manager">
    <h1>Managers Info</h1>
    <table>
          <tr>
            <th>Edit</th>
            <th>Delete</th>
            <th>First name</>
            <th>Last name</th>
            <th>City</th>
            <th>Sex</th>
            <th>Hospital Name</th>
          </tr>

          <?php
          //Manager's info
          require 'connection.php';


            $query = "SELECT username,fname, lname, users.city, sex, hosp.hname from users inner join hosp on users.hid=hosp.hid and users.role=2";

            $result = mysqli_query($conn,$query);

            while( $row = mysqli_fetch_array($result) ) {
              echo "<tr>";
              echo "<form method='POST' action=''>";
              echo "<td><button class='update' type='submit' name='update1' value='".$row['username']."'><i class='fas fa-user-edit'></i></button></a></td>";
              echo "<td> <button class='delete' type='submit' name='delete1' value='".$row['username']."'><i class='fas fa-trash-alt'></i></button></td>";
            	echo "<td>" . $row['fname'] . "</td>";
            	echo "<td>" . $row['lname'] . "</td>";
              echo "<td>" . $row['city'] . "</td>";
              echo "<td>" . $row['sex'] . "</td>";
              echo "<td>" . $row['hname'] . "</td>";
              echo "</form>";
            	echo "</tr>";
            }
            mysqli_close($conn);

            ?> 

    </table>
    
    </div>

    <div class="prev emp">
      <h1>Nurses's Info</h1>
    <table>
          <tr>
            <th>Edit</th>
            <th>Delete</th>
            <th>First name</th>
            <th>Last name</th>
            <th>City</th>
            <th>Sex</th>
            <th>Working hours</th>
            <th>Hospital's name</th>
          </tr>

          <?php
          require 'connection.php';
            //Nurses Info

            $query = "SELECT username,fname,lname,users.city,sex,whours,hosp.hname from users left join hosp on users.hid=hosp.hid where users.role=3";


            $result = mysqli_query($conn,$query);
            

            while( $row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<form method='POST' action=''>";
              echo "<td><button class='update' type='submit' name='update2' value='".$row['username']."'><i class='fas fa-user-edit'></i></button></a></td>";
              echo "<td> <button class='delete' type='submit' name='delete2' value='".$row['username']."'><i class='fas fa-trash-alt'></i></button></td>";
            	echo "<td>" . $row['fname'] . "</td>";
            	echo "<td>" . $row['lname'] . "</td>";
              echo "<td>" . $row['city'] . "</td>";
              echo "<td>" . $row['sex'] . "</td>";
              echo "<td>" . $row['whours'] . "</td>";
              if(is_null($row['hname'])){ 
                $row['hname']="NA";
                }
              echo "<td>" .$row['hname']. "</td>";
              echo "</form>";
            	echo "</tr>";
            }
            mysqli_close($conn);

            ?> 

    </table>
    
    
    </div>

</div>

</body>
</html>
