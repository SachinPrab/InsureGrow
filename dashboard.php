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
?>
