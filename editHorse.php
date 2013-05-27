<?php include('includes/header.php');?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Edit A Horse</h1>
				</div>
			</div><!-- /main headline-->
			
			<div class="row"><!--Row for HR-->
				<div class="span12"><hr></div>
			</div><!-- /row for HR -->
			
			<div class="row"><!-- Row for Features-->
				<?php include('includes/sidebar.php');?>
						<?php

						//if the login session does not exist therefore meaning the user is not logged in
						if(strcmp($_SESSION['uid'],”) == 0){
							//display and error message
							echo "<div class='alert alert-error'>Sorry, you must login to view this page.</div>";
						}else{
							//otherwise continue the page

							//this is out update script which should be used in each page to update the users online time
							$time = date('U')+50;
							$update = mysql_query("UPDATE users SET online = '". $time ."' WHERE id = '". $_SESSION['uid'] ."'");
							?>
							<h5 class="grey">Who's Online?</h5>
							<?php

							//select all rows where there online time is more than the current time
							$res = mysql_query("SELECT * FROM users WHERE online > '". date('U') ."'");

							//loop for each row
							while($row = mysql_fetch_assoc($res)){
								//echo  each username found to be online with a return to split them
								echo $row['username']." <br/> ";
							}

							?>
							<p class="reset grey"><a href="logout.php">Logout</a></p>
							<?php

						//make sure you close the check if their online
						}

						?>
						
				  </div><!-- / column one-->
				  <div class="span9"><!-- column two-->
					<h3 class="green">Click horse name to edit.</h3>
						<?php
						$owner = $_GET["id"];
						$horseList = mysql_query("SELECT * FROM horses ORDER BY horseName ASC") or die(mysql_error());
						$num_rows = mysql_num_rows($horseList);
				    if($num_rows <= 0) {
							echo '<h5 class="grey">Sorry, no horses found.</h5>';
						} else {
							echo '<table class="table table-striped table-bordered" width="100%">';
		            echo '<tr>';
		              echo '<th>Name</th>';
		              echo '<th>YOB</th>';
		              echo '<th>Colour</th>';
		              echo '<th>Breed</th>';
		              echo '<th>Gender</th>';
		            echo '</tr>';
						while ($row = (mysql_fetch_assoc($horseList))) {
							echo '<tr>';
	              echo '<td>';
	                echo '<a href="edit_horse.php?id='. $row['id'] .'">'. stripslashes($row['horseName']) .'</a>';
	              echo '</td>';
	              echo '<td>'. $row['yob'] .'</td>';
	              echo '<td>'. $row['color'] .' '. $row['pattern'] .'</td>';
	              echo '<td>';
	          				echo $row['breed'];
	  	          echo '</td>';
	              echo '<td>'. $row['gender'] .'</td>';
	        echo '</tr>';
        } // end while
	      echo '</table>';
						}
						?>
				</div><!-- / column two-->
			</div><!--/row for features-->
			</div><!--/row for intro-->

