<?php
session_start();
?>

<html>
<body>

<?php
	session_unset();
    header("location:index.php?");

?>
</body>
</html>