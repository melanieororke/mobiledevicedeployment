<?php include('includes/header.php');?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Welcome to Your Quick Look Index</h1>
				</div>
			</div><!-- /main headline-->
			
			<div class="row"><!--Row for HR-->
				<div class="span12"><hr></div>
			</div><!-- /row for HR -->
			
			<div class="row"><!-- Row for Features-->
				<?php include('includes/sidebar.php');?>
				  </div><!-- / column one-->
				  <div class="span9"><!-- column two-->
					<div class="row"><!--Dashboard Updates-->
						<div class="span4"><!--Newest Horses-->
							<h4 class="green">Newest Horses</h4>
									<?php
									$topHorse = mysql_query("SELECT * FROM horses ORDER BY id DESC LIMIT 5") or die(mysql_error());
									$num_rows = mysql_num_rows($topHorse);
							    if($num_rows <= 0) {
										echo '<h5 class="grey">Sorry, no horses found.</h5>';
									} else {
										echo '<table class="table table-striped table-bordered" width="100%">';
					            echo '<tr>';
					              echo '<th>Name</th>';
					            echo '</tr>';
									while ($row = (mysql_fetch_assoc($topHorse))) {
										echo '<tr>';
				              echo '<td>';
				                echo '<a href="horsepage.php?id='. $row['id'] .'">'. stripslashes($row['horseName']) .'</a>';
											echo '</td>';
				        echo '</tr>';
			        } // end while
				      echo '</table>';
									}
									?>
							</div><!--/Newest Horses-->
						<div class="span5"><!--Newest Events-->
							<h4 class="green">Newest Events</h4>
							<?php
							$topHorse = mysql_query("SELECT * FROM shows ORDER BY id DESC LIMIT 5") or die(mysql_error());
							$num_rows = mysql_num_rows($topHorse);
					    if($num_rows <= 0) {
								echo '<h5 class="grey">Sorry, no horses found.</h5>';
							} else {
								echo '<table class="table table-striped table-bordered" width="100%">';
			            echo '<tr>';
			              echo '<th>Name</th>';
			            echo '</tr>';
							while ($row = (mysql_fetch_assoc($topHorse))) {
								echo '<tr>';
		              echo '<td>';
		                echo $row['showname'];
									echo '</td>';
		        echo '</tr>';
	        } // end while
		      echo '</table>';
							}
							?>
						</div><!--/Newest Events-->
					</div><!--/Dashboard Updates-->
						<h4 class="green">Your Horses</h4>
						<?php
						$owner = $_GET["id"];
						$horseList = mysql_query("SELECT * FROM users,horses WHERE users.id = $owner AND horses.ownedBy = $owner ORDER BY horses.horseName ASC") or die(mysql_error());
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
	                echo '<a href="horsepage.php?id='. $row['id'] .'">'. stripslashes($row['horseName']) .'</a>';
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
						<hr>
						<h4 class="green">Upcoming Health Appointments</h4>
						<?php
						$health = mysql_query("SELECT * FROM healthRecords,horses,users WHERE users.id = $owner AND horses.ownedBy = $owner AND healthRecords.hid = $owner") or die(mysql_error());
				    $num_rows_health = mysql_num_rows($health);
				    if($num_rows_health <= 0) {
							echo '<h5 class="grey">Sorry, no health information found.</h5>';
						} else {
							echo '<table class="table table-striped table-bordered" width="100%">';
		            echo '<tr>';
		              echo '<th>Name</th>';
		              echo '<th>Vet Appointment</th>';
		              echo '<th>Farrier Appointment</th>';
		            echo '</tr>';
						while ($row = (mysql_fetch_assoc($health))) {
						  echo '<tr>';
	              echo '<td>';
	                echo '<a href="horsepage.php?id='. $row['id'] .'">'. stripslashes($row['horseName']) .'</a>';
	              echo '</td>';
	              echo '<td>'. strftime('%A <strong>%B %e</strong>, %Y', strtotime($row['nextvet'])) .'</td>';
	              echo '<td>'. strftime('%A <strong>%B %e</strong>, %Y', strtotime($row['nextshoe'])) .'</td>';
	        echo '</tr>';
        } // end while
	      echo '</table>';
						}
						?>
						<hr>
						<h4 class="green">Upcoming Shows</h4>
						<?php
						$showList = mysql_query("SELECT * FROM shows WHERE id > 0 ORDER BY date ASC") or die(mysql_error());
				    $num_rows_shows = mysql_num_rows($showList);
				    if($num_rows_shows <= 0) {
							echo '<h5 class="grey">Sorry, no shows found.</h5>';
						} else {
							echo '<table class="table table-striped table-bordered" width="100%">';
		            echo '<tr>';
		              echo '<th>Name</th>';
		              echo '<th>Date</th>';
		              echo '<th>Location</th>';
		            echo '</tr>';
						while ($row = (mysql_fetch_assoc($showList))) {
							echo '<tr>';
	              echo '<td>';
	                echo $row['showname'];
	              echo '</td>';
	              echo '<td>'. strftime('%A <strong>%B %e</strong>, %Y', strtotime($row['date'])) .'</td>';
	              echo '<td>'. $row['location'] .'</td>';
	        echo '</tr>';
        } // end while
	      echo '</table>';
						}
						?>
				</div><!-- / column two-->
			</div><!--/row for features-->
			</div><!--/row for intro-->

