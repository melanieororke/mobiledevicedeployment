<?php include('includes/header.php');?>
	<div class="row"><!--Row for Main Headline-->
		<div class="span12">
			<h1 class="pink" align="center">Stable Management at Your Fingertips</h1>
		</div>
	</div><!-- /main headline-->
		<div class="row"><!--Row for Form-->
			<div class="span12">
			<form action="add_horse.php" method="post">
			  <table class="table">
			    <tr>
			      <td class="span6">                                
			        <label for="horseName">Horse Name:</label>
			        <input type="text" name="horseName" id="horseName" size="30" />

			        <label for="yob">Birth Year: </label><select class="lists" name="yob" id="yob">
			        <?php
			          $currentYear = date("Y")+1;
			          echo "<option value= '$currentYear'>$currentYear</option>";
			          $i = 0;
			          $newYear = $currentYear - 1;
			          while ($i < 30) {

			            if(isset($yearTemp)) {
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
			
			      </td>
			      <td class="span6">    

							<label for="height">Height in Hands (numbers and decimals only): </label><input type="text" class="littleinput" name="height" value="" size="25" />
			        <label for="sire">Sire: </label><input type="text" name="sire" value="" size="30" />

			        <label for="dam">Dam: </label><input type="text" name="dam" value="" size="30" />
							<label for="competingIn">Competing In: </label><input type="text" name="competingIn" value="" size="30" />

			      </td>
			    </tr>
			    <tr>
			      <td colspan="2">
			        <input type="hidden" name="ownedBy" id="ownedBy" value="<?php echo $_SESSION['ownedBy']; ?>" />
			        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Add Horse" />
			      </td>
						<td colspan="2">
			        <input class="btn" type="reset" value="Reset Form" />
			      </td>
			    </tr>
			  </table>
			</form>
			</div>
		</div><!-- /row for Form -->
<?php include('includes/footer.php');?>