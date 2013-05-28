<?php include('includes/header.php');?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Stable Management at Your Fingertips</h1>
				</div>
			</div><!-- /main headline-->
			<div class="row"><!--Row for HR-->
				<div class="span12"><hr></div>
			</div><!-- /row for HR -->
			<div class="row"><!-- Row for Features-->
				<div class="span3"  align="center"><!-- column one-->
						<div class="circle"><i class="icon-info whiteIcon iconPosit"></i></div>
						<h4 class="green">Horse Information</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. </p>
				</div><!-- / column one-->
				<div class="span3"  align="center"><!-- column two-->
						<div class="circle"><i class="icon-leaf whiteIcon iconPosit"></i></div>
						<h4 class="green">Feed Schedules</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. </p>
				</div><!-- / column two-->
				<div class="span3"  align="center"><!-- column three-->
						<div class="circle"><i class="icon-medkit whiteIcon iconPosit"></i></div>
						<h4 class="green">Health Records</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. </p>
				</div><!-- / column three-->
				<div class="span3"  align="center"><!-- column four-->
						<div class="circle"><i class="icon-calendar whiteIcon iconPosit"></i></div>
						<h4 class="green">Show Schedules</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. </p>
				</div><!-- / column four-->
			</div><!--/row for features-->
			<div class="row"><!--Row for HR-->
				<div class="span12"><hr></div>
			</div><!-- /row for HR -->
			<div class="row"><!--Row for intro-->
				<div class="span4">
					<h2 class="pink">Headline</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. Praesent tempor molestie libero in congue. Morbi nec justo ut libero ornare dignissim a ut erat. Vestibulum malesuada sollicitudin magna non vehicula. Nunc pharetra magna nec odio iaculis pharetra. Nam dignissim lorem lobortis sapien molestie molestie. Duis tempor venenatis dui a varius.</p>
				</div>
				<div class="span4">
					<h2 class="pink">Headline</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. Praesent tempor molestie libero in congue. Morbi nec justo ut libero ornare dignissim a ut erat. Vestibulum malesuada sollicitudin magna non vehicula. Nunc pharetra magna nec odio iaculis pharetra. Nam dignissim lorem lobortis sapien molestie molestie. Duis tempor venenatis dui a varius.</p>
				</div>
				<div class="span4">
					<!--Begin Login Form--><?php

							//If the user has submitted the form
							if($_POST['submit']){
								//protect the posted value then store them to variables
								$username = protect($_POST['username']);
								$password = protect($_POST['password']);

								//Check if the username or password boxes were not filled in
								if(!$username || !$password){
									//if not display an error message
									echo '<div class="alert alert-error span3">You need to fill in a username and a password!</div>';
								}else{
									//if the were continue checking

									//select all rows from the table where the username matches the one entered by the user
									$res = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."'");
									$num = mysql_num_rows($res);

									//check if there was not a match
									if($num == 0){
										//if not display an error message
										echo '<div class="alert alert-error span3">Sorry, that username does not exist.</div>';
									}else{
										//if there was a match continue checking

										//select all rows where the username and password match the ones submitted by the user
										$res = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'");
										$num = mysql_num_rows($res);

										//check if there was not a match
										if($num == 0){
											//if not display error message
											echo '<div class="alert alert-error span3">Sorry, that password is incorrect.</div>';
										}else{
											//if there was continue checking

											//split all fields fom the correct row into an associative array
											$row = mysql_fetch_assoc($res);

											//check to see if the user has not activated their account yet
											if($row['active'] != 1){
												//if not display error message
												echo '<div class="alert span3">Sorry, this account has not been activated.</div>';
											}else{
												//if they have log them in

												//set the login session storing there id - we use this to see if they are logged in or not
												$_SESSION['uid'] = $row['id'];
												//show message
												echo '<div class="alert alert-success span3">You have successfully logged in!</div>';

												//update the online field to 50 seconds into the future
												$time = date('U')+50;
												mysql_query("UPDATE `users` SET `online` = '".$time."' WHERE `id` = '".$_SESSION['uid']."'");

												//redirect them to the usersonline page
												header('Location: account.php?id='. $row['id'] .'');
											}
										}
									}
								}
							}

							?>
							<form action="index.php" method="post" class="form-signin span3">
									<h5 class="pink">Sign In Here</h5>
									<input type="text" name="username" class="span3" placeholder="Username">
									<input type="password" name="password" class="span3" placeholder="Password">
									<p class="reset pink" align="right"><a href="register.php">Sign Up For An Account</a><br/><a href="forgot.php">Forgot Password</a></p>
									<button class="btn btn-primary" type="submit" name="submit" value="Register" />Sign In</button>
					<?
					ob_end_flush();
					?>
					<!--End Login Form-->
				</div>
			</div><!--/row for intro-->
		<?php include('includes/footer.php');?>
		