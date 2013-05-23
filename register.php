<?php include('includes/header.php');?>
			<div class="row"><!--Row for Sign Up Form-->
				<div class="span6">
					<?php
					include('includes/functions.php')//include the functions file
					;?>
					<form method="POST" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
					<label>Username:</label>
					<input type="text" name="username" class="span5" 
					value="<?PHP echo $username; ?>">
					<label>Password:</label>
					<input type="text" name="password" class="span5"/><br/>
					<button class="btn btn-primary" type="submit" name="register" value="Register">Register</button>
					</form>
					<p><small>All fields are required.</small></p>
				</div>
				<div class="span6">
					<h2 class="pink">Why Sign Up?</h2>
					<h4 class="green">Horse Information</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. </p>
				<hr>
				<h4 class="green">Feed Schedules</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. </p>
				<hr>
				<h4 class="green">Health Records</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. </p>
			<hr>
			<h4 class="green">Show Schedules</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. </p>
				</div>
			</div><!--/row for sign up-->
		<?php include('includes/footer.php');?>
