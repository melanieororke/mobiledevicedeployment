<?php include('includes/header.php');?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Edit A Feed Chart</h1>
				</div>
			</div><!-- /main headline-->
			
			<div class="row"><!--Row for HR-->
				<div class="span12"><hr></div>
			</div><!-- /row for HR -->
			
			<div class="row"><!-- Row for Features-->
				<?php include('includes/sidebar.php');?>
				  </div><!-- / column one-->
				  <div class="span9"><!-- column two-->
					<h3 class="green">Click chart id to edit.</h3>
						<?php
						$owner = $_GET["id"];
						$feedList = mysql_query("SELECT * FROM feed ORDER BY id ASC") or die(mysql_error());
						$num_rows = mysql_num_rows($feedList);
				    if($num_rows <= 0) {
							echo '<h5 class="grey">Sorry, no feed charts found.</h5>';
						} else {
							echo '<table class="table table-striped table-bordered" width="100%">';
		            echo '<tr>';
		              echo '<th>ID</th>';
		              echo '<th>Horse ID</th>';
		              echo '<th>Feed</th>';
		              echo '<th>Forage</th>';
		              echo '<th>Supplement</th>';
									echo '<th>Instructions</th>';
		            echo '</tr>';
						while ($row = (mysql_fetch_assoc($feedList))) {
							echo '<tr>';
	              echo '<td>';
	                echo '<a href="edit_feed.php?id='. $row['id'] .'">'. stripslashes($row['id']) .'</a>';
	              echo '</td>';
	              echo '<td>'. $row['hid'] .'</td>';
	              echo '<td>'. $row['feed1'] .'<br/>'. $row['feed2'] .'</td>';
								echo '<td>'. $row['forage1'] .'<br/>'. $row['forage2'] .'</td>';
								echo '<td>'. $row['supplement1'] .'<br/>'. $row['supplement2'] .'<br/>'. $row['supplement3'] .'</td>';
	              echo '<td><p>';
	          				echo $row['instructions'];
	  	          echo '</p></td>';
	        echo '</tr>';
        } // end while
	      echo '</table>';
						}
						?>
				</div><!-- / column two-->
			</div><!--/row for features-->
			</div><!--/row for intro-->

