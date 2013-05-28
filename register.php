<?php
include('includes/header.php');
?>
			<div class="row"><!--Row for Sign Up Form-->
				<div class="span4">
					<!-- Begin Register Form-->
					<?php

//Check to see if the form has been submitted
if (isset($_POST['submit'])) {
    
    //protect and then add the posted data to variables
    $username = protect($_POST['username']);
    $password = protect($_POST['password']);
    $passconf = protect($_POST['passconf']);
    $email    = protect($_POST['email']);
    
    //check to see if any of the boxes were not filled in
    if (!$username || !$password || !$passconf || !$email) {
        //if any weren't display the error message
        echo '<div class="alert alert-error span3">Sorry, all fields are required.</div>';
    } else {
        //if all were filled in continue checking
        
        //Check if the wanted username is more than 32 or less than 3 charcters long
        if (strlen($username) > 32 || strlen($username) < 3) {
            //if it is display error message
            echo '<div class="alert alert-error span3">Sorry, the username must be between 3 and 32 characters.</div>';
        } else {
            //if not continue checking
            
            //select all the rows from out users table where the posted username matches the username stored
            $res = mysql_query("SELECT * FROM `users` WHERE `username` = '" . $username . "'");
            $num = mysql_num_rows($res);
            
            //check if theres a match
            if ($num == 1) {
                //if yes the username is taken so display error message
                echo '<div class="alert alert-error span3">Sorry, this username is already taken.</div>';
            } else {
                //otherwise continue checking
                
                //check if the password is less than 5 or more than 32 characters long
                if (strlen($password) < 5 || strlen($password) > 32) {
                    //if it is display error message
                    echo '<div class="alert alert-error span3">Sorry, your password must be between 3 and 5 characters.</div>';
                } else {
                    //else continue checking
                    
                    //check if the password and confirm password match
                    if ($password != $passconf) {
                        //if not display error message
                        echo '<div class="alert alert-error span3">Sorry, passwords do not match.</div>';
                    } else {
                        //otherwise continue checking
                        
                        //Set the format we want to check out email address against
                        $checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
                        
                        //check if the formats match
                        if (!preg_match($checkemail, $email)) {
                            //if not display error message
                            echo '<div class="alert alert-error span3">Sorry, this email is not been valid.</div>';
                        } else {
                            //if they do, continue checking
                            
                            //select all rows from our users table where the emails match
                            $res1 = mysql_query("SELECT * FROM `users` WHERE `email` = '" . $email . "'");
                            $num1 = mysql_num_rows($res1);
                            
                            //if the number of matchs is 1
                            if ($num1 == 1) {
                                //the email address supplied is taken so display error message
                                echo '<div class="alert alert-error span3">Sorry, this email address is already registered.</div>';
                            } else {
                                //finally, otherwise register there account
                                
                                //time of register (unix)
                                $registerTime = date('U');
                                
                                //make a code for our activation key
                                $code = md5($username) . $registerTime;
                                
                                //insert the row into the database
                                $res2 = mysql_query("INSERT INTO `users` (`username`, `password`, `email`, `rtime`) VALUES('" . $username . "','" . $password . "','" . $email . "','" . $registerTime . "')");
                                
                                //send the email with an email containing the activation link to the supplied email address
                                mail($email, $INFO['chatName'] . ' Please Activate Your Account', "Thank you for registering to us " . $username . ",\n\nHere is your activation link. If the link doesn't work copy and paste it into your browser address bar.\n\nhttp://melanieororkedesign.com/easykeepr/activate.php?code=" . $code, 'From: melanie.ororke@gmail.com');
                                
                                //display the success message
                                echo '<div class="alert alert-success span3">Please check your email for account activation.</div>';
                            }
                        }
                    }
                }
            }
        }
    }
}

?>
								<form action="register.php" method="post" class="span3">
									<h4 class="pink">Register for Your Free Account</h3>
									<label>Enter a Username:</label>
									<input type="text" name="username" class="span3" placeholder="Username" />
									<label>Password:</label>
									<input type="password" name="password" class="span3" placeholder="Password" />
									<label>Confirm Password:</label>
									<input type="password" name="passconf" class="span3" placeholder="Confirm Password" />
									<label>Email Address:</label>
									<input type="text" name="email" class="span3" placeholder="me@somedomain.com"/>
									<p class="reset pink" align="right"><a href="register.php">Sign Up For An Account</a><br/><a href="forgot.php">Forgot Password</a></p>
									<button class="btn btn-primary" type="submit" name="submit" value="Register" />Register</button>
									
								</form>
					<!-- End Register Form-->
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
