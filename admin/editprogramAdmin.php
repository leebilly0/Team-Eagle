
<!--Add Session to every Admin page-->

	
   <!-- Start your coding below here -->
  
   <!--***Add below-->
   
   <?php

if(isset($_POST['submittedEdit'])){
	
	$newProgram_name = $_POST['newProgram_name'];
	$year_start = $_POST['year_start'];
	$mission = $_POST['mission'];
	
	$oldProgram_name = $_POST['oldProgram_name'];
	$oldProgram_id = $_POST['oldProgram_id'];
	
	
	$program_id = $oldProgram_id;
	$program_name = $newProgram_name;
	//****Called connecDatabase.php to do connection 
	
			require("../connectDatabase.php");
			//Get name from database with each donor id
			$deleteData = "DELETE FROM program WHERE program_id ='".$oldProgram_id."' AND program =' ".$oldProgram_name."'";
			//$deleteProgram = mysqli_query($DataBaseCon, $deleteData);
			if(mysqli_query($DataBaseCon, $deleteData)){
				
			}else{
				
				echo "Error Delete!";
			}
			
	//Insert program edit to database
	$insertProgram = "INSERT INTO program VALUES(".$oldProgram_id.",".$newProgram_name.",".$year_start.",".$mission.")";		
	
	//Check if it return true or false
	if(mysqli_query($DataBaseCon, $insertProgram)){
		$GLOBALS['addEdit'] = "Edit Successfuly !";
		
	}else{
		
		$GLOBALS['addEdit'] = "Edit Error!";
	}
	
	
	
}//End of if edit



?>
<!--***Done add above--> 
<!--***Add below-->

<?php
/*
	//Add session to be start
	require ("adminHeader.php");
    
	$GLOBALS['program_name'] = $_POST['program_name'];
	
	*/
?>
	<!--***Done add above-->   

<h2>Edit Program</h2>
<form name="Edit_form" action="editprogramAdmin.php" method="POST">
Program Name:<br>
<input type = "text" name = "newProgram_name">
<br><br>

Year Start:<br>
<input type = "number" name = "year_start" min="1" max="3000">
<br><br>

Mission Statement: <br>
<input style= "width: 36%; height: 111px;" type = "text" name = "mission">

<br><br>
<input type = "hidden" name = "oldProgram_name" value="<?php $GLOBALS['program_name'] = $_POST['program_name']; echo $program_name; ?>">
<input type = "hidden" name = "oldProgram_id" value="<?php $GLOBALS['program_id'] = $_POST['program_id']; echo $program_id; ?>">

<!--***Add below-->
<input type="hidden" name="submittedEdit" value="TRUE" />
<!--***Done add above-->
<input type = "reset" name = "reset" value = "Cancel">
<input type = "submit" name = "edit_program" value = "Save">
<br><br>

</form>
<?php

//echo $GLOBALS['addEdit'];
?>


  </body>
<!-- end of body -->

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

  