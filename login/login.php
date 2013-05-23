<?php 
/*Created by Barrett at RRPowered.com */
//This file name is login.php
 
include('functions.php');//Include the functions file  
//Start session
session_start();
 
//Get session username
$username=$_SESSION['username'];
?>

<div class="head"><?php log_reg($username); ?></div>
<div class="form">
<?php echo $error; ?>
 
<form method="POST" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
<div class="form_text">Username:</div>
<div class="form_field"><input type="text" name="username" class="fields" 
value="<?PHP echo $username; ?>"></div>
<div class="clearer"></div>
 
<div class="form_text">Password:</div>
<div class="form_field"><input type="password" name="password" class="fields"/></div>
<div class="clearer"></div>
 
<div class="form_text"><input type="submit" name="login" value="Login" 
class="form_button"/></div>
<div class="form_field"></div>
<div class="clearer"></div>
</form>
 
 
</div>