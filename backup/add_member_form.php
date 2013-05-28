<?php include('includes/header.php');?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Create Your Profile</h1>
				</div>
			</div><!-- /main headline-->
			<div class="row"><!-- Row for Features-->
				<div class="span12"  align="center"><!-- column one-->
<form action="add_member.php" method="post">
  <table class="table">
    <tr>
      <td>                                
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" size="30" />
				<label for="lastname">Last Name:</label>
        <input type="text" name="lastname" size="30" />

        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
          <option value="Male" width="20">Male</option>
          <option value="Female" width="20">Female</option>
        </select> 
     
        <label for="city">City: </label><input type="text" class="littleinput" name="city" value="" size="25" />
   
        <label for="country">Country: </label><input type="text" class="littleinput" name="country" value="" size="25" />
				<label for="phone">Phone Number: </label><input type="text" name="phone" placeholder="1236547896" value="" size="30" />
      </td>
      <td>    
        <label for="worksat">Where Do You Work: </label><input type="text" name="worksat" value="" size="30" />
        
        <label for="Interests">Interests: </label><textarea name="interests" /></textarea>
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