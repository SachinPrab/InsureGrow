<?php
$u = '';
$p = '';
$u = $_POST['username'];
$p = $_POST['password'];
$con = mysqli_connect("localhost","root","","signupdb");
$sql="INSERT INTO login(username,password) values('$u','$p')";
$r = mysqli_query($con,$sql);
if($r)
{
    echo "User details stored successfully";
}
else
{
    echo "User details have not been added";
}
$sql = "SELECT username, password FROM login'";
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result === false) {
    die("Query failed: " . mysqli_error($conn));
}

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the row as an associative array
    $row = mysqli_fetch_assoc($result);
    echo "Username: " . $row['username'] . "<br>";
    echo "Password: " . $row['password'] . "<br>";
} else {
    echo "User not found";
}
mysqli_close($conn);
?>
