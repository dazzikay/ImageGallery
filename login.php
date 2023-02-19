<?php
session_start();
?>


<head>
<link rel="stylesheet" href="style.css" >
<link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Noto+Serif+JP&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">


</head>

<body id="login-page">

<!--these are the fireflies floating around the page -->
<ul class="fireflies">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
   
    </ul>


<main>
<!--log in section-->
<div id = login_box>


<form action="login_action.php" method="post">
  <div id="login_container">

  <h1>  Image Gallery </h1>

<h2>Login </h2>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
  </div>

</form>

<!--sign up section -->
<form action="register_action.php" method="post">
<div id="login_container2">

<h3>Sign Up</h3>
<label for="uname"><b>Username</b></label>
  <input type="text" placeholder="Enter Username" name="uname" required>

  <label for="npsw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="npsw" required>


  <button type="submit" class="signupbtn">Sign Up</button>
</div>
</form>


</div>

</main>
</body>
