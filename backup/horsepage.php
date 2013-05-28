<?php include('includes/header.php');

				echo '<div class="row">'; //Row for Main Headline
				echo '<div class="span12">';
				
				$horse = $_GET["id"];
		    $result = mysql_query("SELECT * FROM horses WHERE id = '". $horse ."'") or die(mysql_error());
		    while ($row = (mysql_fetch_assoc($result))) {
					echo '<h1 class="pink" align="center">';
					echo $row['horseName'];
					echo '</h1>';
					echo '<p align="center">';
					echo $row['yob'] .' ';
					echo $row['color'] .' ';
					echo $row['breed'] .' ';
					echo $row['gender'];
					echo ', standing ';
					echo $row['height'];
					echo 'hh.';
					echo '</p>';
					echo '<p align="center"><small>';
					echo $row['sire'] .' ';
					echo ' x ';
					echo $row['dam'] .' ';
					echo '(';
					echo $row['damsire'] .' ';
					echo ')<br/> Bred by ';
					echo $row['breeder'];
					echo '</small</p>';
				echo '</div>';
			echo '</div>';  // end main headline
		} ?>
			<div class="row"> <!--//row for HR-->
			<div class="span12"><hr></div>
			</div> <!--end HR--> 
			<div class="row"><!-- Horse Info Row-->
					<?php include('includes/sidebar.php');?>

				</div>
				<div class="span9">
					<h2 class="green">Health Records</h2>
					<h4 class="grey">Veterinarian Records</h4>
					<?php
					$health = mysql_query("SELECT * FROM healthRecords,horses WHERE horses.id = $horse AND healthRecords.hid = $horse") or die(mysql_error());
			    $num_rows_health = mysql_num_rows($health);
			    if($num_rows_health <= 0) {
						echo '<h5 class="grey">Sorry, no veterinarian information found.</h5>';
					} else {
						echo '<table class="table table-striped table-bordered" width="100%">';
	            echo '<tr>';
	              echo '<th>Date of Appointment</th>';
	              echo '<th>Details</th>';
	              echo '<th>Coggins Info</th>';
	            echo '</tr>';
					while ($row = (mysql_fetch_assoc($health))) {
					  echo '<tr>';
              echo '<td>'. strftime('%A <strong>%B %e</strong>, %Y', strtotime($row['lastvet'])) .'</td>';
              echo '<td><p>'. $row['details'] .'</p></td>';
              echo '<td>'. strftime('%A <strong>%B %e</strong>, %Y', strtotime($row['cogginsdate'])) .'<br/><p>Negative: '. $row['cogginsneg'] .'</p></td>';
        echo '</tr>';
      } // end while
      echo '</table>';
					}
					?>
					<h4 class="grey">Farrier Records</h4>
					<?php
					$health = mysql_query("SELECT * FROM healthRecords,horses WHERE horses.id = $horse AND healthRecords.hid = $horse") or die(mysql_error());
			    $num_rows_health = mysql_num_rows($health);
			    if($num_rows_health <= 0) {
						echo '<h5 class="grey">Sorry, no farrier information found.</h5>';
					} else {
						echo '<table class="table table-striped table-bordered" width="100%">';
	            echo '<tr>';
	              echo '<th>Date of Appointment</th>';
	              echo '<th>Details</th>';
	            echo '</tr>';
					while ($row = (mysql_fetch_assoc($health))) {
					  echo '<tr>';
              echo '<td>'. strftime('%A <strong>%B %e</strong>, %Y', strtotime($row['lastshoe'])) .'</td>';
              echo '<td><p>'. $row['comments'] .'</p></td>';
        echo '</tr>';
      } // end while
      echo '</table>';
					}
					?>
					<hr>
					<h2 class="green">Feeding Instructions</h2>
					<?php
					$feed = mysql_query("SELECT * FROM feed,horses WHERE horses.id = $horse AND feed.hid = $horse") or die(mysql_error());
			    $num_rows_feed = mysql_num_rows($feed);
			    if($num_rows_feed <= 0) {
						echo '<h5 class="grey">Sorry, no feeding information found.</h5>';
					} else {
						echo '<table class="table table-striped table-bordered" width="100%">';
	            echo '<tr>';
	              echo '<th width="25%">Type of Feed (Quantity)</th>';
								echo '<th width="25%">Type of Forage (Quantity)</th>';
								echo '<th width="25%">Type of Supplement (Quantity)</th>';
	              echo '<th width="25%">Instructions</th>';
	            echo '</tr>';
					while ($row = (mysql_fetch_assoc($feed))) {
					  echo '<tr>';
            	echo '<td><p>'. $row['feed1'] .'<br/>'. $row['feed2'] .'</p></td>';
							echo '<td><p>'. $row['forage1'] .'<br/>'. $row['forage2'] .'</p></td>';
							echo '<td><p>'. $row['supplement1'] .'<br/>'. $row['supplement2'] .'<br/>'. $row['supplement3'] .'</p></td>';
              echo '<td><p>'. $row['instructions'] .'</p></td>';
        echo '</tr>';
      } // end while
      echo '</table>';
					}
					?>
					<hr>
					<h2 class="green">Upcoming Shows</h2>
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
              echo '<td>'. $row['showname'] .'</td>';
              echo '<td>'. strftime('%A <strong>%B %e</strong>, %Y', strtotime($row['date'])) .'</td>';
              echo '<td>'. $row['location'] .'</td>';
        echo '</tr>';
      } // end while
      echo '</table>';
					}
					?>
					
				</div>
			</div><!-- End Horse Info Row-->
			
		 <?php include('includes/footer.php'); ?>