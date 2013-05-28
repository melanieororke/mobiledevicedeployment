<?php include('includes/header.php');?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Add A Horse</h1>
				</div>
			</div><!-- /main headline-->
			<div class="row"><!-- Row for Features-->
				<div class="span12"  align="center"><!-- column one-->
<form action="add_vet.php" method="post">
  <table class="table">
    <tr>
      <td>                                
        <label for="hid">Horse Id:</label>
        <input type="text" name="hid" size="30" />
				<label for="nextvet">Next Vet Appointment :</label>
        <input type="text" name="nextvet" size="30" placeholder="2013-05-01" />
				<label for="cogginstest">Coggins Test? (Yes or No)</label>
        <input type="text" name="cogginstest" size="30" />

       
      </td>
      <td>    
        <label for="cogginsdate">Coggins Date:</label>
        <input type="text" name="cogginsdate" size="30" placeholder="2013-05-01" />
				<label for="nextshoe">Farrier Appointment:</label>
        <input type="text" name="nextshoe" size="30" placeholder="2013-05-01" />
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