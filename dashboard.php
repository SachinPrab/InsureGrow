<?php 
$Username = $_POST["username"];
$Password = $_POST["password"];

// Define keys before accessing them
if (!isset($_POST["username"]) || !isset($_POST["password"])) {
    // Handle missing fields
    echo "Please enter a username and password.";
} else if ($Username == 'admin' && $Password == 'password123') {
    header('Location: file:///C:/Users/Nagu/Documents/microinvestment%20githhub/microinvestment-14/microinv1.html');
    exit;
} else {
    echo "Invalid username or password.";
}
?>
