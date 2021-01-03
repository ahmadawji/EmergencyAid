<?php 
session_start();
?>

<?php
if (!isset($_SESSION['role'])||$_SESSION['role']!=1){
    header('Location: main.php');
    exit;
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addadmin.css">
    <script src="data.js"></script>
    <title>Add Admin</title>
</head>
<body onload="loadData()">
<div class="main">
    <div class="header">
    <h1 class="icon">EmergencyAid</h1>
    </div>
        <div>
                <form class="log" action="" method="POST"  onsubmit="insertData()">
                    <h2 style="font-size: 2em;">Insert</h2>
                    <label for="fn" >First Name</label>
                    <input type="text"  placeholder="first name" name="fname"  id="fn">
                    <label for="ln" >Last Name</label>
                    <input type="text"  placeholder="last name" name="lname" id="ln">
                    <label for="un" >Username</label>
                    <input type="text"  placeholder="username" name="username" id="un">
                    <label for="pw">Password</label>
                    <input type="password"  placeholder="password" name="pass" id="pw">
                    <label for="rp">Retype Password</label>
                    <input type="password" placeholder="Retype password" name="repass" id="rp">
                    <label for="bd">Birthdate</label>
                    <input type="date" id="bd" name="birthday" >
                    <label for="ct">City</label>
                    <Select id="ct">
                        <option value="s">Select city</option>
                    </Select>
                    <div class="gender">
                    <input type="radio" id="male" name="gender" value="M">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="F"> 
                    <label for="female">Female</label><br>
                    <input type="submit"  value="Insert data">
                    </div>
                </form>
                    <br>
                    <br>

                <p id="success"></p>
                <p style="color: red;" id="error"></p>

        </div>


 </div>
 
</body>
</html>