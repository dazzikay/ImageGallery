<?php

session_start();

//check if there is a username and password entered
if (isset($_REQUEST['uname']) && isset($_REQUEST['psw']))
{ 

$uname = $_REQUEST['uname'];
$upass = $_REQUEST['psw'];

//connecting with database
$conn = new mysqli("localhost", "root", "", "image_users");

//error message if connection fails
if ($conn->connect_error) {
    echo "error";
    die("Connection failed: " . $conn->connect_error);
  }

$sql = "SELECT * FROM users WHERE username = '$uname' and password='$upass'";
//if username and password matches from database
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['uname'] = $uname;
    header("Location: index.php");
}
else
{
     echo '<script language = "javascript">; alert("User does not exists or password does not match!") ; location.href = "http://localhost/imageGallery/login.php"; </script>';
  
}
} 

 
?>