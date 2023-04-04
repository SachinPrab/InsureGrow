<?php 
$username = $_POST['username'];
$password = $_POST['password'];
$con = mysqli_connect("localhost","root","","login");
$sql="INSERT INTO studentdetails(username,password) values('$username','$password')";
$r = mysqli_query($con,$sql);
if($r)
{
    echo "User details stored successfully";
}
else
{
    echo "User details have not been added";
}
?>
