<?php
session_start()
?>


<?php
if (!isset($_SESSION['role'])||$_SESSION['role']!=1){
  header('Location: index.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <script src="userData.js"></script>
    <title>Insert</title>
</head>
<body>
<div class="main">
<div class="header">
<h1 class="icon">EmergencyAid</h1>
</div>

<h2 style="font-size: 2em;">Add Hospital</h2>
    <form >
        <label for="hn" >Hospital Name</label>
        <input type="text" id="hn" >
        <label for="ct">City</label>
        <input type="text" id="ct" >
        <input type="button" onclick="insertHosp()" value="Insert Hospital">
    </form>
   <p style="color:red; font-size:1.5em; font-weight:900" id="alert"></p>
   <p style="color:green; font-size:1.5em; font-weight:900" id="success"></p>
 </div>
</body>
</html>
