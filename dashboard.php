<?php
  $backgroundColor = '#ffffff'; 
  $borderColor = '#00ff00'; 
?>
<style>
  body {
    background-color: #ffffff; 
    border: 2px solid #00ff00; 
    padding: 10px;
    margin: 20px;
  }
</style>
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
    echo "User details stored successfully" . "<br>";
}
else
{
    echo "User details have not been added";
}
$sql = "SELECT username FROM login where username = '$u'";
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result === false) {
    die("Query failed: " . mysqli_error($con));
}

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the row as an associative array
    $row = mysqli_fetch_assoc($result);
    echo "Welcome " . $row['username'] . "<br>";
} else {
    echo "User not found";
}
mysqli_close($con);
?>
        
