<form action="edit_feed.php" method="post">
  <table class="table">
    <tr>
      <td>                                
        <label for="hid">Horse Id:</label>
        <input type="text" name="hid" size="30" value="<?php echo $row['hid']; ?>" />
				<label for="feed1">Feed:</label>
        <input type="text" name="feed1" size="30" value="<?php echo $row['feed1']; ?>" />
				<label for="feed2">Feed:</label>
        <input type="text" name="feed2" size="30" value="<?php echo $row['feed2']; ?>" />
				<label for="forage1">Forage:</label>
        <input type="text" name="forage1" size="30" value="<?php echo $row['forage1']; ?>" />
				<label for="forage2">Forage:</label>
        <input type="text" name="forage2" size="30" value="<?php echo $row['forage2']; ?>" />
      </td>
      <td>    
        <label for="supplement1">Supplement: </label>
				<input type="text" name="supplement1" value="<?php echo $row['supplement1']; ?>" size="30" />
				<label for="supplement2">Supplement: </label>
				<input type="text" name="supplement2" value="<?php echo $row['supplement2']; ?>" size="30" />
				<label for="supplement3">Supplement: </label>
				<input type="text" name="supplement3" value="<?php echo $row['supplement3']; ?>" size="30" />
        
        <label for="instructions">Special Instructions: </label><textarea name="instructions" /><?php echo $row['instructions'] ?></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="4">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit" />
        <input class="btn" type="reset" value="Reset Form" />
      </td>
    </tr>
  </table>
</form>