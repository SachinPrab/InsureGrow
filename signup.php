<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the form data
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
  header("Location: success.php");
	exit();
}
?>
