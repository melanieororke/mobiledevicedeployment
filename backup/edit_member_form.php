<form action="edit_member.php" method="post">
  <table class="table">
    <tr>
      <td>                                
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" size="30" value="<?php echo $row['firstname']; ?>" />
				<label for="lastname">Last Name:</label>
        <input type="text" name="lastname" size="30" value="<?php echo $row['lastname']; ?>" />

        <label for="gender">Gender:</label>
        <input type="text" name="gender" size="30" value="<?php echo $row['gender']; ?>" />
     
        <label for="city">City: </label><input type="text" class="littleinput" name="city" value="<?php echo $row['city']; ?>" size="25" />
   
        <label for="country">Country: </label><input type="text" class="littleinput" name="country" value="<?php echo $row['country']; ?>" size="25" />
				<label for="phone">Phone Number: </label><input type="text" name="phone" placeholder="1236547896" value="<?php echo $row['phone']; ?>" size="30" />
      </td>
      <td>    
        <label for="worksat">Where Do You Work: </label><input type="text" name="worksat" value="<?php echo $row['worksat']; ?>" size="30" />
        
        <label for="interests">Interests: </label><textarea name="interests" value="" /><?php echo $row['interests']; ?></textarea>
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