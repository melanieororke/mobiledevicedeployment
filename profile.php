<?php
include('includes/header.php');

echo '<div class="row">'; //Row for Main Headline
echo '<div class="span12">';

$member = $_GET["id"];
$result = mysql_query("SELECT * FROM members WHERE id = '" . $member . "'") or die(mysql_error());
while ($row = (mysql_fetch_assoc($result))) {
    echo '<h1 class="pink" align="center">';
    echo $row['firstname'];
    echo ' ';
    echo $row['lastname'];
    echo '</h1>';
    echo '</div>';
    echo '</div>'; // end main headline
}
?>
			<div class="row"> <!--//row for HR-->
			<div class="span12"><hr></div>
			</div> <!--end HR--> 
			<div class="row"><!-- Member Info Row-->
					<?php
include('includes/sidebar.php');
?>

				</div>
				<div class="span9">
					<?php
$member = $_GET["id"];
$result = mysql_query("SELECT * FROM members WHERE id = '" . $member . "'") or die(mysql_error());
while ($row = (mysql_fetch_assoc($result))) {
    echo '<p><strong>Located: </strong>';
    echo $row['city'];
    echo ', ';
    echo $row['country'];
    echo '</p> ';
    echo '<p><strong>Phone Number: </strong>';
    echo $row['phone'];
    echo '</p> ';
    echo '<p><strong>Works At: </strong>';
    echo $row['worksat'];
    echo '</p> ';
    echo '<p><strong>Interests: </strong>';
    echo $row['interests'];
    echo '</p> ';
}
?>
					
					
				</div>
			</div><!-- End Member Info Row-->
			
		 <?php
include('includes/footer.php');
?>