<?php
include('includes/header.php');
?>
<div class="row"><!--Row for Main Headline-->
	<div class="span12">
		<h1 class="pink" align="center">Contact Us</h1>
	</div>
</div><!--End Row for Main Headline-->
<div class="row"><!--Row for HR-->
	<div class="span12"><hr></div>
</div><!--End Row for HR-->

<div class="row"><!--Row for Abuse Form-->
	<div class="span6">
		<h3 class="green">Contact Us</h3>
		
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. Praesent tempor molestie libero in congue. Morbi nec justo ut libero ornare dignissim a ut erat. Vestibulum malesuada sollicitudin magna non vehicula. Nunc pharetra magna nec odio iaculis pharetra. Nam dignissim lorem lobortis sapien molestie molestie. Duis tempor venenatis dui a varius.</p>
		
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu mi nec nisi semper adipiscing in eget lorem. Proin semper arcu vel sapien ultrices sed sagittis ante tempor. Curabitur ut feugiat lacus. Praesent tempor molestie libero in congue. Morbi nec justo ut libero ornare dignissim a ut erat. Vestibulum malesuada sollicitudin magna non vehicula. Nunc pharetra magna nec odio iaculis pharetra. Nam dignissim lorem lobortis sapien molestie molestie. Duis tempor venenatis dui a varius.</p>
			
		
	</div>
	
	<div class="span6">
		<h3 class="green">Contact Us</h3>
		<form action="sendAbuse.php" method"post">
			<label>Your Name:</label>
			<input type="text" name="name" placeholder="Your Name">
			<label>Your Email:</label>
			<input type="text" name="email" placeholder="me@yourdomain.com">
			<label>Message:</label>
			<textarea rows="4" name="message" id="message" class="span4"/></textarea><br/>
			<button class="btn btn-primary" type="submit" name="submit">Contact Us!</button>
		</form>
		
	</div>
</div><!--End Row for Abuse Form-->
<?php
include('includes/footer.php');
?>
