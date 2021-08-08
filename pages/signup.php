<?php
session_start();
require_once "./../db/database.php";
require_once "./../functions/functions.php";
$title = "Sign up";

$error_array = array("error_1" => "", "error_2" => "", "error_3" => "", "error_4" => "", "error_5" => "");

if(isset($_POST['submit-user-details'])) {
  $first_name = $_POST['first-name'];
  $second_name = $_POST['second-name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmed_password = $_POST['confirmed-password'];

  echo "inside main method";
	// creating session variables
	$_SESSION['first-name'] = $first_name;
	$_SESSION['second-name'] = $second_name;
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	$_SESSION['confirmed-password'] = $confirmed_password;

  if(strlen($first_name) < 3) {
    $error_array["error_1"] = "First name is too short";
  } elseif (strlen($first_name) > 20) {
    $error_array["error_1"] = "First name is too long";
  } elseif (strlen($second_name) < 3) {
    $error_array["error_2"] = "Second name is too short";
  } elseif (strlen($second_name) > 20) {
    $error_array["error_2"] = "Second name is too long";
  } elseif (strlen($password) < 8) {
    $error_array["error_4"] = "Password is too short";
  } elseif (strlen($password) > 20) {
    $error_array["error_4"] = "Password is too long";
  } else {
		confirm_passwords_match($password, $confirmed_password);

		$user_name =  format_chars($first_name) . "_" . format_chars($second_name);
		$password = format_chars($password);
		$email = format_email($email);

		$password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "insert into users ( name, email, password ) values ( '$user_name', '$email', '$password' )";
		if (mysqli_query($conn, $sql)) {
		 header('Location: index.php');
		} else {
			echo "We could not sign you in";
		}
	}
} else {
  echo "why is this happening to me";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("./../includes/head-content.php") ?>
</head>
<body>
	<header>
		<div class="wrapper">
				<h1>Sign up Page</h1>
				<form action="" method="post">
					<input class="input" type="text" placeholder="First name" name="first-name" required>
					<span class="text-danger dis-block"><?php echo $error_array["error_1"] ?></span>
					<br />
					<input class="input" type="text" placeholder="Second name" name="second-name" required>
					<span class="text-danger dis-block"><?php echo $error_array["error_2"] ?></span>
					<br />
					<input class="input" type="email" placeholder="Email address" name="email" required>
					<span class="text-danger dis-block"><?php echo $error_array["error_3"] ?></span>
					<br />
					<input class="input" type="password" placeholder="Password" name="password" required>
					<span class="text-danger dis-block"><?php echo $error_array["error_4"] ?></span>
					<br />
					<input class="input" type="password" placeholder="Password" name="confirmed-password" required>
					<span class="text-danger dis-block"><?php echo $error_array["error_5"] ?></span>
					<br />
					<input class="btn" type="submit" value="Sign up" name="submit-user-details" required>
				</form>
		</div>
	</header>
</body>
</html>
