<?php 
/*Created by Barrett at RRPowered.com */
//This file name is register.php
 
include('functions.php');//Include the functions file  
//Start session
session_start();
 
//Get session username
$username=$_SESSION['username'];
?>
<html> 
<head> 
<title>The Best Registration Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</link></head>
<body>
<div class="head"><?php log_reg($username); ?></div>
<div class="form">
<div class="title">Register Form</div>
<?php echo $error; ?>
 
<form method="POST" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
<div class="form_text">Username:</div>
<div class="form_field"><input type="text" name="username" class="fields" 
value="<?PHP echo $username; ?/>"></div>
<div class="clearer"></div>
 
<div class="form_text">Password:</div>
<div class="form_field"><input type="password" name="password" class="fields"/></div>
<div class="clearer"></div>
 
<div class="form_text"><input type="submit" name="register" value="Register" 
class="form_button"/></div>
<div class="form_field"></div>
<div class="clearer"></div>
</form>
 
 
</div>
</body>
</html>