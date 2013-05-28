<?php
include('includes/header.php');
?>
			<div class="row"><!--Row for Main Headline-->
				<div class="span12">
					<h1 class="pink" align="center">Add A Horse</h1>
				</div>
			</div><!-- /main headline-->
			<div class="row"><!-- Row for Features-->
				<div class="span12"  align="center"><!-- column one-->
<form action="add_horse.php" method="post">
  <table class="table">
    <tr>
      <td>                                
        <label for="horseName">Horse Name:</label>
        <input type="text" name="horseName" size="30" />

        <label for="yob">Birth Year: </label><select class="lists" name="yob" id="yob">
        <?php
$currentYear = date("Y") + 1;
echo "<option value= '$currentYear'>$currentYear</option>";
$i       = 0;
$newYear = $currentYear - 1;
while ($i < 30) {
    
    if (isset($yearTemp)) {
        echo "<option value= '$yearTemp'>$yearTemp</option>";
        $yearTemp = $yearTemp - 1;
        $i++;
    } else {
        echo "<option value= '$newYear'>$newYear</option>";
        $yearTemp = $newYear - 1;
        $i++;
    }
}
?>
        </select>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
          <option value="Mare" width="20">Mare</option>
          <option value="Stallion" width="20">Stallion</option>
          <option value="Gelding" width="20">Gelding</option>
        </select> 
     
        <label for="color">Color: </label><input type="text" class="littleinput" name="color" value="" size="25" />
   
        <label for="breed">Breed: </label><input type="text" class="littleinput" name="breed" value="" size="25" />
				<label for="breeder">Breeder: </label><input type="text" name="breeder" value="" size="30" />
      </td>
      <td>    
        <label for="sire">Sire: </label><input type="text" name="sire" value="" size="30" />
        
        <label for="dam">Dam: </label><input type="text" name="dam" value="" size="30" />
        
        <label for="damsire">Dam's Sire: </label><input type="text" name="damsire" value="" size="30" />
        
        <label for="competingIn">Competing In:</label>
        <input type="text" name="competingIn" value="" size="30" />
                
        
				<label for="ownedBy">Owned By (please use account ID number): </label><input type="text" name="ownedBy" value="" size="30" />
                
        <label for="bred">Retired </label>
        <select name="retired" id="retired">
          <option value="0" width="20">No</option>
          <option value="1" width="20">Yes</option>
        </select>
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