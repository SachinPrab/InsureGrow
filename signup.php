<?php
  $backgroundColor = '#ffffff'; 
  $borderColor = '#00ff00'; 
?>

<html>
    <style>
  body {
    background-color: #ffffff; 
    border: 2px solid #00ff00; 
     font-size: 20px;
    padding: 10px;
    margin: 20px;
  }
</style>
<body>
  <center>
  <p>Welcome To InsureGrow</p>
  </center>
</body>
</html>

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
		echo "Thank you for registering with our website, $name. Welcome to InsureGrow. Please click <a href='homepage.html'>here</a> to continue.";
	}
	else
	{
		echo "User details have not been added in database";
	}
}
?>
