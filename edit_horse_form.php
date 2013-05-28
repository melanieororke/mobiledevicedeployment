<form action="edit_horse.php" method="post">
  <table class="table">
    <tr>
      <td>                                
        <label for="horseName">Horse Name:</label>
        <input type="text" name="horseName" size="30" value="<?php
echo $row['horseName'];
?>" />

        <label for="yob">Birth Year: </label><select class="lists" name="yob" id="yob">
          <option value="<?php
echo $row['yob'];
?>"><?php
echo $row['yob'];
?></option>
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
          <option value="<?php
echo $row['gender'];
?>"><?php
echo $row['gender'];
?></option>
          <option value="Mare" width="20">Mare</option>
          <option value="Stallion" width="20">Stallion</option>
          <option value="Gelding" width="20">Gelding</option>
        </select> 
     
        <label for="color">Colour: </label><input type="text" class="littleinput" name="color" value="<?php
echo $row['color'];
?>" size="25" />
   
        <label for="breed">Breed: </label><input type="text" class="littleinput" name="breed" value="<?php
echo $row['breed'];
?>" size="25" />
      </td>
      <td>    
        <label for="sire">Sire: </label><input type="text" name="sire" value="<?php
echo $row['sire'];
?>" size="30" />
        
        <label for="dam">Dam: </label><input type="text" name="dam" value="<?php
echo $row['dam'];
?>" size="30" />
        
        <label for="damsire">Dam's Sire: </label><input type="text" name="damsire" value="<?php
echo $row['damsire'];
?>" size="30" />
        
				<label for="damsire">Competing In: </label><input type="text" name="competingIn" value="<?php
echo $row['competingIn'];
?>" size="30" />
                
        <label for="breeder">Breeder: </label><input type="text" name="breeder" value="<?php
echo $row['breeder'];
?>" size="30" />
                
        <label for="bred">Retired </label>
        <select name="retired" id="retired">
          <option value="<?php
echo $row['retired'];
?>">
            <?php
if ($row['retired'] == 0) {
    echo 'No';
} elseif ($row['retired'] == 1) {
    echo 'Yes';
}
?>
          </option>
          <option value="0" width="20">No</option>
          <option value="1" width="20">Yes</option>
        </select>
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