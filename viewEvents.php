<?php
include('includes/header.php');
?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Viewing All Events</h1>
				</div>
			</div><!-- /main headline-->
			
			<div class="row"><!--Row for HR-->
				<div class="span12"><hr></div>
			</div><!-- /row for HR -->
			
			<div class="row"><!-- Row for Features-->
				<?php
include('includes/sidebar.php');
?>
						<?php

//if the login session does not exist therefore meaning the user is not logged in
if (strcmp($_SESSION['uid'], ”) == 0) {
    //display and error message
    echo "<div class='alert alert-error'>Sorry, you must login to view this page.</div>";
} else {
    //otherwise continue the page
    
    //this is out update script which should be used in each page to update the users online time
    $time   = date('U') + 50;
    $update = mysql_query("UPDATE users SET online = '" . $time . "' WHERE id = '" . $_SESSION['uid'] . "'");
?>
							<h5 class="grey">Who's Online?</h5>
							<?php
    
    //select all rows where there online time is more than the current time
    $res = mysql_query("SELECT * FROM users WHERE online > '" . date('U') . "'");
    
    //loop for each row
    while ($row = mysql_fetch_assoc($res)) {
        //echo  each username found to be online with a return to split them
        echo $row['username'] . " <br/> ";
    }
    
?>
							<p class="reset grey"><a href="logout.php">Logout</a></p>
							<?php
    
    //make sure you close the check if their online
}

?>
						
				  </div><!-- / column one-->
				  <div class="span9"><!-- column two-->
						<?php
$showList = mysql_query("SELECT * FROM shows WHERE id > 0 ORDER BY showName ASC") or die(mysql_error());
$num_rows_shows = mysql_num_rows($showList);
if ($num_rows_shows <= 0) {
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
        echo '<a href="show.php?id=' . $row['id'] . '">' . stripslashes($row['showname']) . '</a>';
        echo '</td>';
        echo '<td>' . strftime('%A <strong>%B %e</strong>, %Y', strtotime($row['date'])) . '</td>';
        echo '<td>' . $row['location'] . '</td>';
        echo '</tr>';
    } // end while
    echo '</table>';
}
?>
				</div><!-- / column two-->
			</div><!--/row for features-->
			</div><!--/row for intro-->
			<?php
include('includes/footer.php');
?>