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
    <link rel="stylesheet" href="css/user.css">
    <script src="userData.js"></script>
    <title>Add Admin</title>
</head>
<body onload="loadData()" >
<div class="main">
    <div class="header">
    <h1 class="icon">EmergencyAid</h1>
    </div>
        <div>
                <form class="log"  >
                    <h2 style="font-size: 2em;">Add User</h2>
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


                    <div class="role">
                    <h3>Manger or Nurse?</h3>
                    <input type="radio" id="mang" name="role" checked value="2">
                    <label for="mang">Manager</label><br>
                    <input type="radio" id="nrs" name="role" value="3"> 
                    <label for="nrs">Nurse</label><br>
                    </div>

                    <br>

                    <div class="gender">
                    <h3>Gender:</h3>
                    <input type="radio" id="male" name="gender" checked value="M">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="F"> 
                    <label for="female">Female</label><br>
                    </div>
                    <br>

                    
                    <label for="hos">Assign hospital to the user:</lable><br>
                    <select id ="hos" class="hid" style="width:40%" size='5'>
                    </select>

                    <input type="button" onclick="insertUserData()" value="Insert data">
                    <p class="alert"></p>
                </form>
                    <br>
                    <br>

                <p id="success"></p>
                <p style="color: red;" id="error"></p>

        </div>


 </div>
 
</body>
</html>