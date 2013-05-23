<?php
/*Created by Barrett at RRPowered.com */
//This file name is functions.php
 
//include connection to database
include('includes/dbConnect.php');
 
//Login and register function
function log_reg($username){
//Check if the user session id is still set
if(session_is_registered('id')){
echo'<div class="log_link">Welcome '.$username.' | <a href="index.php">
Home</a> | <a href="logout.php">Logout</a>';//Display if user session exists
//header('Location: index.php');//Redirect to home page
}else{
session_destroy();//Destroy session
//Display if user session does not exists
echo'<div class="log_link"><a href="index.php">Home</a> | <a href="login.php">
Login</a> | <a href="register.php">Register</a></div>';
}//If statement end
 
}//Function end
 
//Get form values
$username = $_POST['username'];
$password = $_POST['password'];
 
//Strip slashes
$username = stripslashes($username);
$password = stripslashes($password);
 
//Strip tags 
$username = strip_tags($username);
$password = strip_tags($password);
 
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
 
//Check if login form was submitted
if(isset($_POST['login'])){
$pass=md5($password);//MD5 hash password
$login_check=mysql_query("SELECT * FROM users WHERE password='$pass' 
AND username='$username'")or die(mysql_error());
$log_check=mysql_num_rows($login_check);/*Check if username and 
password exist in database*/
 
if(!$username){//If username field is empty
$error='<div class="error">Please enter a username.</div>';//Show error
}else if(!$password){//If password field is empty
$error='<div class="error">Please enter a password.</div>';//Show error
}else if($log_check == 1){//If user exists in database
$get_user=mysql_query("SELECT * FROM users WHERE password='$pass' 
AND username='$username'") or die(mysql_error());
while($row=mysql_fetch_assoc($get_user)){
$id_reg=$row['id'];//Get id from database
$username_reg=$row['username'];//Get username from database
 
//Register session id
session_register('id'); 
$_SESSION['id'] = $id_reg;
 
//Register session username
session_register('username'); 
$_SESSION['username'] = $username_reg;
}
 
header('Location: index.php');//Redirect to home page
}else{
$error='<div class="error">Your username or password is incorrect.</div>';//Show error
}
}
 
//Check if register form was submitted
if(isset($_POST['register'])){
$register_check=mysql_query("SELECT * FROM users WHERE username='$username'")
or die(mysql_error());
$reg_check=mysql_num_rows($register_check);//Check if username exist in database
if(!$username){//If username field is empty
$error='<div class="error">Please enter a username.</div>';//Show error
}else if(!$password){//If password field is empty
$error='<div class="error">Please enter a password.</div>';//Show error
}else if($reg_check == 1){//If username exist in database show error
$error='<div class="error">Username already exists.</div>';//Show error
}else if($reg_check == 0){/*If username does not exist insert the id, 
username and password into database*/
$pass=md5($password);//MD5 hash password
$id = mysql_insert_id();//Insert id
 
//Insert into database
$insert_user=mysql_query("INSERT INTO users (id, username, password) 
VALUES ('$id','$username','$pass')") or die(mysql_error());
if($insert_user){//If data inserted 
 
//Register id session
session_register('id'); 
$_SESSION['id'] = $id;
 
//Register username session
session_register('username'); 
$_SESSION['username'] = $username;
 
header('Location: index.php');//Redirect to home page
}
}
}
?>