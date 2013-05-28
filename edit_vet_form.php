<form action="edit_vet.php" method="post">
  <table class="table">
    <tr>
      <td>                                
        <label for="hid">Horse Id:</label>
        <input type="text" name="hid" size="30" value="<?php
echo $row['hid'];
?>" />
				<label for="lastvet">Last Vet Appointment :</label>
        <input type="text" name="lastvet" size="30" value="<?php
echo $row['lastvet'];
?>" />
				<label for="nextvet">Next Vet Appointment :</label>
        <input type="text" name="nextvet" size="30" value="<?php
echo $row['nextvet'];
?>" />
				<label for="cogginstest">Coggins Test? (Yes or No)</label>
        <input type="text" name="cogginstest" size="30" value="<?php
echo $row['cogginstest'];
?>" />
				<label for="cogginsdate">Date of Coggins:</label>
        <input type="text" name="cogginsdate" size="30" value="<?php
echo $row['cogginsdate'];
?>" />
				<label for="cogginsneg">Coggins Negative? (Yes or No)</label>
        <input type="text" name="cogginsneg" size="30" value="<?php
echo $row['cogginsneg'];
?>" />
				<label for="details">Details: </label><textarea name="details" /><?php
echo $row['details'];
?></textarea>

       
      </td>
      <td>    
        <label for="lastshoe">Last Farrier Appointment:</label>
        <input type="text" name="lastshoe" size="30" value="<?php
echo $row['lastshoe'];
?>" />
				<label for="nextshoe">Next Farrier Appointment:</label>
        <input type="text" name="nextshoe" size="30" value="<?php
echo $row['nextshoe'];
?>" />
				<label for="comments">Comments: </label><textarea name="comments" /><?php
echo $row['comments'];
?></textarea>
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