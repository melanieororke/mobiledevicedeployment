<?php
include('includes/header.php');
?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Add Feeding Chart</h1>
				</div>
			</div><!-- /main headline-->
			<div class="row"><!-- Row for Features-->
				<div class="span12"  align="center"><!-- column one-->
<form action="add_feed.php" method="post">
  <table class="table">
    <tr>
      <td>                                
        <label for="hid">Horse Id:</label>
        <input type="text" name="hid" size="30" />
				<label for="feed1">Feed:</label>
        <input type="text" name="feed1" size="30" />
				<label for="feed2">Feed:</label>
        <input type="text" name="feed2" size="30" />
				<label for="forage1">Forage:</label>
        <input type="text" name="forage1" size="30" />
				<label for="forage2">Forage:</label>
        <input type="text" name="forage2" size="30" />
      </td>
      <td>    
        <label for="supplement1">Supplement: </label>
				<input type="text" name="supplement1" value="" size="30" />
				<label for="supplement2">Supplement: </label>
				<input type="text" name="supplement2" value="" size="30" />
				<label for="supplement3">Supplement: </label>
				<input type="text" name="supplement3" value="" size="30" />
        
        <label for="instructions">Special Instructions: </label><textarea name="instructions" /></textarea>
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