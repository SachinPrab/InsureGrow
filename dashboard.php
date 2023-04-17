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
$u = '';
$p = '';
$u = $_POST['username'];
$p = $_POST['password'];
$con = mysqli_connect("localhost","root","","signupdb");
$sql="INSERT INTO login(username,password) values('$u','$p')";
$r = mysqli_query($con,$sql);
if($r)
{
    echo "Thank you for registering with our website, $name. Welcome to InsureGrow. Please click <a href='homepage.html'>here</a> to continue.";
}
else
{
    echo "User details have not been added";
}
?>
        
