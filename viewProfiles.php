<?php
include('includes/header.php');
?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Viewing All Member Profiles</h1>
				</div>
			</div><!-- /main headline-->
			
			<div class="row"><!--Row for HR-->
				<div class="span12"><hr></div>
			</div><!-- /row for HR -->
			
			<div class="row"><!-- Row for Features-->
				<?php
include('includes/sidebar.php');
?>
		
				  </div><!-- / column one-->
				  <div class="span9"><!-- column two-->
						<?php
$owner = $_GET["id"];
$memberList = mysql_query("SELECT * FROM members ORDER BY lastname ASC") or die(mysql_error());
$num_rows = mysql_num_rows($memberList);
if ($num_rows <= 0) {
    echo '<h5 class="grey">Sorry, no members found.</h5>';
} else {
    echo '<table class="table table-striped table-bordered" width="100%">';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Location</th>';
    echo '<th>Works At</th>';
    echo '</tr>';
    while ($row = (mysql_fetch_assoc($memberList))) {
        echo '<tr>';
        echo '<td>';
        echo '<a href="profile.php?id=' . $row['id'] . '">' . ($row['firstname']) . ' ' . ($row['lastname']) . '</a>';
        echo '</td>';
        echo '<td>' . $row['city'] . ', ' . $row['country'] . '</td>';
        echo '<td>';
        echo $row['worksat'];
        echo '</td>';
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
