<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
 
//connect to the database so we can check, edit, or insert data to our users table
include('includes/header.php');
 
//include out functions file giving us access to the protect() function made earlier
include "includes/functions.php";
 
?>
		<?php
 
		echo md5('other');
		//get the code that is being checked and protect it before assigning it to a variable
		$code = protect($_GET['code']);
 
		//check if there was no code found
		if(!$code){
			//if not display error message
			echo "<div class='alert alert-error'>Sorry, we have encountered an error.</div>";
		}else{
			//other wise continue the check
 
			//select all the rows where the accounts are not active
			$res = mysql_query("SELECT * FROM `users` WHERE `active` = '0'");
 
			//loop through this script for each row found not active
			while($row = mysql_fetch_assoc($res)){
				//check if the code from the row in the database matches the one from the user
				if($code == md5($row['username']).$row['rtime']){
					//if it does then activate there account and display success message
					$res1 = mysql_query("UPDATE `users` SET `active` = '1' WHERE `id` = '".$row['id']."'");
					echo "<div class='alert alert-success'>Thank you! Your account is now activated!</div>";
				}
			}
		}
 
		?>
		</div>
	</body>
</html>
<?php ('includes/footer.php');?>