<?php

session_start();

$title = "Login Page";
require_once "./../db/database.php";
require_once "./../functions/functions.php";

if(isset($_POST['login-user'])) {
	echo "getting started";

	$email = $_POST['email'];
	$password = $_POST['password'];

	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;

	$email = format_email($email);
	$password = format_chars($email);

	$password = password_hash($password, PASSWORD_DEFAULT);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once "./../includes/head-content.php" ?>
</head>
<body>
	<header>
		<div class="wrapper">
			<h1>Login Page</h1>
			<form action="" method="post">
				<input class="input" type="email" name="email" placeholder="Enter email">
				<br />
				<input class="input" type="password" name="password" placeholder="Enter your password">
				<br />
				<input type="submit" class="btn" name="login-user" value="Log in">
			</form>
		</div>
	</header>
</body>
</html>
