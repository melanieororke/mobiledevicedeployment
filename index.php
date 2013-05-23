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
					<?php 

					include('includes/functions.php');//Include the functions file  
					//Start session
					//session_start();

					//get sessionusername
					$username=$_SESSION['username'];
					?>

					<form class="form-signin" method="POST" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
					<h5 class="form-signin-heading pink">Returning Members? Sign in here!</h5>
					<input type="text" class="span3" placeholder="Username" name="username" 
					value="<?PHP echo $username; ?>">
					<input type="password" name="password" class="span3" placeholder="Password"/>
					<p class="reset pink" align="right">Not a Member? <a href="register.php">Sign up now!</a> <br/>
					<a href="password.php">Reset Password?</a></p>
					<button class="btn btn-primary" type="submit" name="login" value="Login">Sign In</button>
					</form>
				</div>
			</div><!--/row for intro-->
		<?php include('includes/footer.php');?>
		