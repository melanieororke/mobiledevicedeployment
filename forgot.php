<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
 
//connect to the database so we can check, edit, or insert data to our users table
include('includes/header.php');
 
//include out functions file giving us access to the protect() function made earlier
include "includes/functions.php";
 
?>

		<?php
 
		//Check to see if the forms submitted
		if($_POST['submit']){
			//if it is continue checks
 
			//store the posted email to variable after protection
			$email = protect($_POST['email']);
 
			//check if the email box was not filled in
			if(!$email){
				//if it wasn't display error message
				echo "<div class='alert alert-error'>Please enter your e-mail address.</div>";
			}else{
				//else continue checking
 
				//set the format to check the email against
				$checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
 
				//check if the email doesnt match the required format
				if(!preg_match($checkemail, $email)){
					//if not then display error message
					echo "<div class='alert alert-error'>Sorry, the email address is not valid.</div>";
				}else{
					//otherwise continue checking
 
					//select all rows from the database where the emails match
					$res = mysql_query("SELECT * FROM `users` WHERE `email` = '".$email."'");
					$num = mysql_num_rows($res);
 
					//check if the number of row matched is equal to 0
					if($num == 0){
						//if it is display error message
						echo "<div class='alert alert-error'>Sorry, this e-mail address is not registered.</div>";
					}else{
						//otherwise complete forgot pass function
 
						//split the row into an associative array
						$row = mysql_fetch_assoc($res);
 
						//send email containing their password to their email address
						mail($email, 'Forgotten Password', "Here is your password: ".$row['password']."\n\nPlease save this message for future reference!", 'From: me@melanieororkedesign.com');
 
						//display success message
						echo "<div class='alert alert-success'>Thank you! An email has been sent to this address.</div>";
					}
				}
			}
		}
 
		?>
			<form action="forgot.php" method="post">
				<table cellpadding="2" cellspacing="0" border="0">
					<tr>
						<td>Email: </td>
						<td><input type="text" name="email" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><button class="btn btn-primary" type="submit" name="submit" value="Send" />Send</button></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><a href="register.php">Register</a> | <a href="login.php">Login</a></a></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
