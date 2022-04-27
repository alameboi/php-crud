<?php
include_once 'config.php';
include_once 'base.php';
include_once 'functions.php';

//Log in form submitted:
if (isset($_POST['login'])) {	
	$username = $_POST['username'];
	$password = $_POST['password'];

	//Validating input data
	if (emptyInputLogin($username, $password)) {
		header("Location: login.php?error=emptyinput");
		exit();
	}
	
	if (wrongUsername($conn, $username)) {
		header("Location: login.php?error=wrongusername");
		exit();
	} 
	
	if (wrongPassword($conn, $username, $password)) {
		header("Location: login.php?error=wrongpassword");
		exit();
	}

	//Authorizing admin
	session_start();
	$_SESSION['loggedin'] = true;
    header("Location: index.php");
	exit();
}

//Log in form:
?>

<html>
<head>
	<title>Log in</title>
</head>

<body>
	<form method="POST" action="login.php" name="add_form">
		<table>
			<tr> 
				<td>Login</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Log in"></td>
			</tr>
		</table>
	</form>
</body>
</html>