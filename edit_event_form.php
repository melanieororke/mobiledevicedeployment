<form action="edit_event.php" method="post">
  <table class="table">
    <tr>
      <td>                                
        <label for="showname">Event Name:</label>
        <input type="text" name="showname" size="30" value="<?php
echo $row['showname'];
?>"/>
				<label for="date">Date:</label>
        <input type="text" name="date" value="<?php
echo $row['date'];
?>" size="30" />
				<label for="location">Location: (City, State)</label>
        <input type="text" name="location" value="<?php
echo $row['location'];
?>" size="30" />
      </td>
      </td>
    </tr>
    <tr>
      <td colspan="4">
        <input type="hidden" name="id" value="<?php
echo $id;
?>" />
        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit" />
        <input class="btn" type="reset" value="Reset Form" />
      </td>
    </tr>
  </table>
</form>