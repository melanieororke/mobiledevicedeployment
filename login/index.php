<?php 
/*Created by Barrett at RRPowered.com */
//This file name is index.php
 
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
<div class="content">The Best Registration and login Form By RRPowered.com</div>
</body>
</html>