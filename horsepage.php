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
					echo '</small</p>';
				echo '</div>';
			echo '</div>';  // end main headline
		} ?>
			<div class="row"> <!--//row for HR-->
			<div class="span12"><hr></div>
			</div> <!--end HR--> 
			
		 <?php include('includes/footer.php'); ?>