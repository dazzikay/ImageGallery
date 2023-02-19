<?php session_start(); ?>


<?php
//connect with image_user sql
$conn = new mysqli("localhost", "root", "", "image_users");

//if connection fails, give error message to user
if ($conn->connect_error) {
    echo "error";
    die("Connection failed: " . $conn->connect_error);
  }

  if (isset($_REQUEST['uname']) && isset($_REQUEST['npsw'])){
    $uname = $_REQUEST['uname'];
    $upass = $_REQUEST['npsw'];

  }

$sql = "SELECT * FROM users WHERE username = '$uname'";

//check if user name exists
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    echo '<script language = "javascript">; alert("Username exists!") ; location.href = "http://localhost/imageGallery/login.php"; </script>';
}

//make new user name and password, save to database and go to main page 
else
{
  $_SESSION['uname'] = $uname;
  echo '<script language = "javascript">; alert("All signed up!") ; location.href = "http://localhost/imageGallery"; </script>';
  $query = $conn->prepare("INSERT INTO `users` (`username`, `password`) VALUES (?, ?);");
  $query->bind_param("ss", $uname, $upass);
  $query->execute();
  $result = $query->get_result();
     
}

?>
