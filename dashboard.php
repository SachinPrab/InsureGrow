<?php 
$Username = $_POST["username"];
  $Password = $_POST["password"];
 if ($Username == 'admin' && $Password == 'password123') {
    header('Location: dashboard.php');
    exit;
  } else {
    echo "Invalid username or password.";
  }
?>
