<?php
session_start();
?>

<html>
<body>

<?php
	session_unset();
	print_r($_SESSION);
    header("location:main.php?");

?>
</body>
</html>