<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$username = '';
$fname = '';
$lname = '';
$error = '';

if(isset($_SESSION['username']) && !empty($_SESSION['username']))  {
   $username = $_SESSION['username'];
}

if(isset($_SESSION['fname']) && !empty($_SESSION['fname']))  {
   $fname = $_SESSION['fname'];
}

if(isset($_SESSION['lname']) && !empty($_SESSION['lname']))  {
   $lname = $_SESSION['lname'];
}

if(isset($_SESSION['error']) && !empty($_SESSION['error']))  {
   $error = $_SESSION['error'];
}

 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
 <!-- add error  -->
  <form method="post" action="adduser.php">
   	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="fname" value="<?php echo $fname; ?>">
  	</div>  	
      <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lname" value="<?php echo $lname; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="index.php">Sign in</a>
  	</p>
  </form>
</body>
</html>