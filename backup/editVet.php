<?php include('includes/header.php');?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Edit An Appointment</h1>
				</div>
			</div><!-- /main headline-->
			
			<div class="row"><!--Row for HR-->
				<div class="span12"><hr></div>
			</div><!-- /row for HR -->
			
			<div class="row"><!-- Row for Features-->
				<?php include('includes/sidebar.php');?>
				  </div><!-- / column one-->
				  <div class="span9"><!-- column two-->
					<h3 class="green">Click appointment id to edit.</h3>
						<?php
						$vetList = mysql_query("SELECT * FROM healthRecords ORDER BY id ASC") or die(mysql_error());
						$num_rows = mysql_num_rows($vetList);
				    if($num_rows <= 0) {
							echo '<h5 class="grey">Sorry, no appointments found.</h5>';
						} else {
							echo '<table class="table table-striped table-bordered" width="100%">';
		            echo '<tr>';
		              echo '<th>ID</th>';
		              echo '<th>Horse ID</th>';
		              echo '<th>Next Vet Appointment</th>';
		              echo '<th>Next Farrier Appointment</th>';
		            echo '</tr>';
						while ($row = (mysql_fetch_assoc($vetList))) {
							echo '<tr>';
	              echo '<td>';
	                echo '<a href="edit_vet.php?id='. $row['id'] .'">'. stripslashes($row['id']) .'</a>';
	              echo '</td>';
	              echo '<td>'. $row['hid'] .'</td>';
	              echo '<td>'. strftime('%A <strong>%B %e</strong>, %Y', strtotime($row['nextvet'])) .'</td>';
								echo '<td>'. strftime('%A <strong>%B %e</strong>, %Y', strtotime($row['nextshoe'])) .'</td>';
	        echo '</tr>';
        } // end while
	      echo '</table>';
						}
						?>
				</div><!-- / column two-->
			</div><!--/row for features-->
			</div><!--/row for intro-->

