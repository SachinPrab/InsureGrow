<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
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
	$con = mysqli_connect("localhost","root","","signupdb");
$sql="INSERT INTO signup(name,username,password,email,address,phone_number,date_of_birth,occupation,annual_income) values('$name','$username','$password','$email','$address','$phone_number','$date_of_birth','$occupation','$annual_income')";
$q = mysqli_query($con,$sql);
	if($q)
	{
		echo "Thank you for registering with our website,Welcome to InsureGrow";
	}
	else
	{
		echo "User details have not been added in database";
	}
}
?>
