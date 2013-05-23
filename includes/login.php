<?php
//allow session to be passed to see if the user is logged in
session_start();
ob_start();
//include the functions file
include "includes/functions.php";

//if the form is submitted
if($_POST['submit']){
	//protect the posted value then store them as variables
	$username = protect($_POST['username']);
	$password = protect($_POST['password']);
	
	//make sure both boxes are filled in
	if(!$username || !$password){
		//if empty, display an error
		echo '<div class="alert">Please fill out the form</div';
	}else{
		//if fields are not empty, continue
		//check all rows where the username matches the one entered by the user
		$res = mysql_query("SELECT * FROM users WHERE username = '".$username"'");
		$num = mysql_num_rows($res);
		
		//check to see if there is a match
		if($num == 0){
			//if no match, display an error
			echo '<div class="alert alert-error">Sorry, the username does not exist</div';
		}else{
			//if there is a match, keep checking
			//check all rows where username and password matches the ones entered by the user
			$res = mysql_query("SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'");
			$num = mysql_num_rows($res);
			
			//check if there was no match
			if($num == 0){
				//if there is no match, display an error
				echo '<div class="alert alert-error">Sorry, the password you entered is not correct</div';
			}else{
				//if there was, continue checking
				//split all fields from the correct row in an associative array
				$row = mysql_fetch_assoc($res);
				
				//check to see if the account is activated
				if($row['active'] !=1){
					//if not, display an error
					echo '<div class="alert">Sorry, you have not activated your account.</div>';
				}else{
					//if they have activated the account, log them in
					//set the login session storing the id = we use this to see if they are logged in or not
					$_SESSION['uid'] = $row['id'];
					//Show Message
					echo '<div class="alert alert-success">You have successfully logged in!</div>';
					
					//update the online field to 50 seconds in the future
					$time = date('U')+50;
					mysql_query("UPDATE users SET online = '".$time."' WHERE id = '".$_SESSION['uid']."'");
					
					//redirect to usersonline page
					header('Location: usersOnline.php')
				}
			}
		}
	}
}
?>
<form class="form-signin" method="POST" action="login.php">
<h5 class="form-signin-heading pink">Returning Members? Sign in here!</h5>
<input type="text" class="span3" placeholder="Username" name="username" 
value="<?PHP echo $username; ?>">
<input type="password" name="password" class="span3" placeholder="Password"/>
<p class="reset pink"><a href="register.php">Register</a> | 
<a href="password.php">Forgot Password?</a></p>
<button class="btn btn-primary" type="submit" name="submit">Log In</button>
</form>
<?
	ob_end_flush();
?>