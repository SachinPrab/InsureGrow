<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the form data
	$name = $_POST["name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$phone_number = $_POST["phone_number"];
	$date_of_birth = $_POST["date_of_birth"];
	$occupation = $_POST["occupation"];
	$annual_income = $_POST["annual_income"];
    header("Location: success.php");
    exit();
}
}
?>
