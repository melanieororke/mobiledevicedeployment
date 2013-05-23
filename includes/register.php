<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();

include "dbConnect.php";
 
//include out functions file giving us access to the protect() function made earlier
include "functions.php";
 
?>	<?php
 
		//Check to see if the form has been submitted
		if(isset($_POST['submit'])){
 
			//protect and then add the posted data to variables
			$username = protect($_POST['username']);
			$password = protect($_POST['password']);
			$passconf = protect($_POST['passconf']);
			$email = protect($_POST['email']);
 
			//check to see if any of the boxes were not filled in
			if(!$username || !$password || !$passconf || !$email){
				//if any weren't display the error message
				echo "<div class='alert alert-error'>Please fill out all fields.</div>";
			}else{
				//if all were filled in continue checking
 
				//Check if the wanted username is more than 32 or less than 3 charcters long
				if(strlen($username) > 32 || strlen($username) < 3){
					//if it is display error message
					echo "<div class='alert alert-error'>Username must be between 3 and 32 characters.</div>";
				}else{
					//if not continue checking
 
					//select all the rows from out users table where the posted username matches the username stored
					$res = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."'");
					$num = mysql_num_rows($res);
 
					//check if theres a match
					if($num == 1){
						//if yes the username is taken so display error message
						echo  "<div class='alert alert-error'>The username you have selected is already in use.</div>";
					}else{
						//otherwise continue checking
 
						//check if the password is less than 5 or more than 32 characters long
						if(strlen($password) < 5 || strlen($password) > 32){
							//if it is display error message
							echo "<div class='alert alert-error'>Passwords must be between 5 and 32 characters.</div>";
						}else{
							//else continue checking
 
							//check if the password and confirm password match
							if($password != $passconf){
								//if not display error message
								echo "<div class='alert alert-error'>Passwords do not match.</div>";
							}else{
								//otherwise continue checking
 
								//Set the format we want to check out email address against
								$checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
 
								//check if the formats match
								if(!preg_match($checkemail, $email)){
									//if not display error message
									echo "<div class='alert alert-error'>Please enter a valid email address.</div>";
								}else{
									//if they do, continue checking
 
									//select all rows from our users table where the emails match
									$res1 = mysql_query("SELECT * FROM `users` WHERE `email` = '".$email."'");
									$num1 = mysql_num_rows($res1);
 
									//if the number of matchs is 1
									if($num1 == 1){
										//the email address supplied is taken so display error message
										echo "<div class='alert alert-error'>That email address is already registered.</div>";
									}else{
										//finally, otherwise register there account
 
										//time of register (unix)
										$registerTime = date('U');
 
										//make a code for our activation key
										$code = md5($username).$registerTime;
 
										//insert the row into the database
										$res2 = mysql_query("INSERT INTO `users` (`username`, `password`, `email`, `rtime`) VALUES('".$username."','".$password."','".$email."','".$registerTime."')");
 
										//send the email with an email containing the activation link to the supplied email address
										mail($email, $INFO['chatName'].' Please Activate Your Account', "Thank you for registering to us ".$username.",\n\nHere is your activation link. If the link doesn't work copy and paste it into your browser address bar.\n\nhttp://melanieororkedesign.com/easykeepr/activate.php?code=".$code, 'From: me@melanieororkedesign.com');
 
										//display the success message
										echo "<div class='alert alert-success'>Thank you! Please check your email to activate your account.</div>";
									}
								}
							}
						}
					}
				}
			}
		}
 
		?>
			<form action="register.php" method="post">
				<table cellpadding="2" cellspacing="0" border="0">
					<tr>
						<td>Username: </td>
						<td><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td>Confirm Password: </td>
						<td><input type="password" name="passconf" /></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input type="text" name="email" size="25"/></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><button class="btn btn-primary" type="submit" name="submit" value="Register" />Register</button></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><a href="/includes/login.php">Login</a> | <a href="forgot.php">Forgot Password</a></a></td>
					</tr>
				</table>
			</form>

