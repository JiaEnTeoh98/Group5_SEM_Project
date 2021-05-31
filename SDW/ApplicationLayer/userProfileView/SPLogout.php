<!DOCTYPE html>
<?php
	session_start();
	session_destroy();
?>
<html>
<head>
	<title>LOGOUT</title>
</head>
<body>
	<center>
		<h2>Successfully Logout</h2>
		<button type="button" class="btn btn-primary" onclick="location.href='SPLogin.php'" >Back</button>
	</center>
</body>
</html>