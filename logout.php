<?php
include('includes/header.php');
?>
			<div class="row"><!--Row for Sign Up Form-->
				<div class="span4">
					<!-- Begin Login Process-->
					<?php

//check if the login session does no exist
if (strcmp($_SESSION['uid'], ”) == 0) {
    //if it doesn't display an error message
    echo '<div class="alert alert-error span3">You have to be logged in to log out..</div>';
} else {
    //if it does continue checking
    
    //update to set this users online field to the current time
    mysql_query("UPDATE `users` SET `online` = '" . date('U') . "' WHERE `id` = '" . $_SESSION['uid'] . "'");
    
    //destroy all sessions canceling the login session
    session_destroy();
    
    //display success message
    echo '<div class="alert alert-success span3">You have been successfully Logged Out!</div>';
}

?>
					
					<!-- End Logout Process-->
				</div>
				<div class="span8">
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
		<?php
include('includes/footer.php');
?>
