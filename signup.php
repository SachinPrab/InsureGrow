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
$sql = "SELECT name, username, password,email, phone_number, date_of_birth, occupation, annual_income FROM signup";
$result = mysqli_query($con, $sql);

if ($result === false) {
    die("Query failed: " . mysqli_error($con));
}
// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["name"]. "<br>";
        echo "Username: " . $row["username"]. "<br>";
        echo "Password: " . $row["password"]. "<br>";
	echo "Email: " . $row["email"]. "<br>";
        echo "Address: " .$row["address"]. "<br>";
        echo "Phone Number: " . $row["phone_number"]. "<br>";
        echo "Date of Birth: " . $row["date_of_birth"]. "<br>";
        echo "Occupation: " . $row["occupation"]. "<br>";
        echo "Annual Income: " . $row["annual_income"]. "<br>";
        echo "<br>";
    }
} 
	else {
    echo "No results found";
}
?>
