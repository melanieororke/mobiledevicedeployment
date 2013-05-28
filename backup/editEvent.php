<?php include('includes/header.php');?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Edit An Event</h1>
				</div>
			</div><!-- /main headline-->
			
			<div class="row"><!--Row for HR-->
				<div class="span12"><hr></div>
			</div><!-- /row for HR -->
			
			<div class="row"><!-- Row for Features-->
				<?php include('includes/sidebar.php');?>
						
				  </div><!-- / column one-->
				  <div class="span9"><!-- column two-->
					<h3 class="green">Click event name to edit.</h3>
						<?php
						$owner = $_GET["id"];
						$eventlist = mysql_query("SELECT * FROM shows ORDER BY showname ASC") or die(mysql_error());
						$num_rows = mysql_num_rows($eventlist);
				    if($num_rows <= 0) {
							echo '<h5 class="grey">Sorry, no events found.</h5>';
						} else {
							echo '<table class="table table-striped table-bordered" width="100%">';
		            echo '<tr>';
		              echo '<th>Event Name</th>';
		              echo '<th>Date</th>';
		              echo '<th>Location</th>';
		            echo '</tr>';
						while ($row = (mysql_fetch_assoc($eventlist))) {
							echo '<tr>';
	              echo '<td>';
	                echo '<a href="edit_event.php?id='. $row['id'] .'">'. ($row['showname']) .'</a>';
	              echo '</td>';
	              echo '<td>'. $row['date'] .'</td>';
	              echo '<td>'. $row['location'] .'</td>';
	        echo '</tr>';
        } // end while
	      echo '</table>';
						}
						?>
				</div><!-- / column two-->
			</div><!--/row for features-->
			</div><!--/row for intro-->

