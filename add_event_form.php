<?php
include('includes/header.php');
?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Add An Event</h1>
				</div>
			</div><!-- /main headline-->
			<div class="row"><!-- Row for Features-->
				<div class="span12"  align="center"><!-- column one-->
<form action="add_event.php" method="post">
  <table class="table">
    <tr>
      <td>                                
        <label for="showname">Event Name:</label>
        <input type="text" name="showname" size="30" />
				<label for="date">Date:</label>
        <input type="text" name="date" placeholder="2013-06-05" size="30" />
				<label for="location">Location: (City, State)</label>
        <input type="text" name="location" size="30" />

        
      </td>
    </tr>
    <tr>
      <td colspan="4">
        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit" />
        <input class="btn" type="reset" value="Reset Form" />
      </td>
    </tr>
  </table>
</form>
</div>
