<?php 
$username = $_POST['username']
  $password = $_POST['password']
 if ($username == 'admin' && $password == 'password123') {
    header('Location: dashboard.php');
    exit;
  } else {
    echo "Invalid username or password.";
  }
?>
