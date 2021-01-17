
<?php 
session_start();

?>

<?php


if (!isset($_SESSION['role'])||$_SESSION['role']!=2){
  header('Location: index.php');
  exit;
}

?>

<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/ProfileMana.css">

</head>

<div class="header">
<div style=" height:30%;">
<h1 class="Uicon">Emergency Aid</h1>
</div>
  <h1><?php echo 'Welcome '.$_SESSION['fName']." ".$_SESSION['lName']?></h1>
</div>

<body>
<div class="main">
<!-- This line is for getting this global variable accessible in js  -->
<input style="display:none;" type="text" id="managerHid" value="<?php echo $_SESSION['hid'] ?>">
<input style="display:none;" type="text" id="managerCity" value="<?php echo $_SESSION['managerCity'] ?>">

  <div class="card">
    <div class="container">
                <h2>Edit Profile:</h2>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                <div class="headContainer">
                  <img id="proImag" src="" alt="John"  style="width:50%; height:100%; margin-right:10px"><BR></BR>
                </div>
                  <input type="file" name="uploadImag" onchange="getUploadImageUrl(this)"></input>
                  <button name="submit" type="submit">Upload Image</button>
                  <button id="signout"><a href="signout.php">Sign Out</a></button>
                </form>
                    <label for="fn" >First Name</label>
                    <input type="text"  name="fname"  id="fn">
                    <label for="ln" >Last Name</label>
                    <input type="text"  placeholder="last name" name="lname" id="ln">
                    <label for="un" >Username</label>
                    <input type="text"  placeholder="username" name="username" id="un">
                    <label for="pw">New Password</label>
                    <input type="password"  placeholder="password" name="pass" id="pw">
                    <label for="rp">Retype Password</label>
                    <input type="password" placeholder="Retype password" name="repass" id="rp">
                    
                    <label for="bd">Birthdate</label>
                    <input type="date" id="bd" name="birthday" >
                    <label for="ct">City</label>
                    <Select id="ct">
                       <option on id="userCity" value="" selected></option>
                    </Select>

                    <br>

                    <div class="gender">
                    <h3>Gender:</h3>
                    <input type="radio" id="male" name="gender" value="M">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="F"> 
                    <label for="female">Female</label><br>
                    </div>
                    <br>

                    
                    <label for="hos" value="dfdf">Assign hospital to the user:</lable><br>
                    <select id ="hos" class="hid"  >
                    <option id="userHosp" selected></option>
                    </select>
                   
                



<!--                         <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea> -->

                    

                      <button onclick="">Update</button>
                    </div>
    
  </div>

      <div class="ManNurInfo" style="width:65%; height:100%;">
                <div class="prev">
                    <h2>Search for nurses with respect to chosen city: </h2>
                    <label for="ct1">City</label>
                    <Select onchange="loadNursesCity()" id="ct1" style="width:50%">
                    <option id="userCity1" value="<?php $_SESSION['managerCity']?>" selected></option>
                    </Select>
                      <h1>Nurses available in: <h1 id="NursesCity"></h1></h1>
                        <table >
                          <thead>
                            <tr>
                              <th>User Name</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Working Hours</th>
                              <th>Availability</th>
                              <th>Assign for emergency:</th>
                            </tr>
                            </thead>
                            <tbody id="nursedata">
                            <tr >
                            
                            </tr>
                            </tbody>
                        </table>
                </div>

                <div class="prev">
                      <h1>Nurses opearating</h1>
                        <table>
                          <thead>
                            <tr>
                              <th>User Name</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Working Hours</th>
                              <th>Dismiss</th>
                            </tr>
                            </thead>

                            <tbody id="nursedata1">
                            <tr >
                            
                            </tr>
                            </tbody>
                        </table>
                </div>

                <div class="prev">
                      <h1>History of nurses worked: </h1>
                        <table>
                            <tr>
                              <th>User Name</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>City</th>
                        
                            </tr>

                            <tbody id="nurseHistory">
                            <tr>
                            
                            </tr>
                            </tbody>
                        </table>
                </div>
      </div>

</div> 
<script src="userData.js"></script>
</body>

</html>