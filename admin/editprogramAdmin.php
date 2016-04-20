

<!--Add Session to every Admin page-->
<?php
	//Add session to be start
	require ("adminHeader.php");
?>

	
   <!-- Start your coding below here --> 
 
 <!--***Add below--> 
   <?php

if(isset($_POST['submittedEdit'])){	

	$newProgram_name = $_POST['newProgram_name'];
	$year_start = $_POST['year_start'];
	$mission = $_POST['mission'];
	
	$oldProgram_name = $_POST['oldProgram_name'];
	$oldProgram_id = $_POST['oldProgram_id'];

	//update the program
	//UPDATE program SET program = "Read Test Book", yr_start ="2016", mission = "read edit test 1" WHERE program_id = "1"; 
	$updateData = "UPDATE program SET program = '".$newProgram_name."',yr_start ='".$year_start."', mission ='".$mission."' WHERE program_id ='".$oldProgram_id."'";
	//Check if it return true or false
	if(mysqli_query($DataBaseCon, $updateData)){
		$GLOBALS['addEdit'] = "Edit Successfuly !";
		
		
	}else{
		
		$GLOBALS['addEdit'] = "Edit Error!";
	
	}
	
	
	
}//End of if edit



?>
<!--***Done add above--> 

<!--Add form edit code-->
<h2>Edit Program</h2>
<form name="Edit_form" action="editprogramAdmin.php" method="POST">
Program Name:<br>
<input type = "text" name = "newProgram_name">
<br><br>
Year Start:<br>
<input type = "number" name = "year_start">
<br><br>
Mission Statement: <br>
<input style= "width: 36%; height: 111px;" type = "text" name = "mission">
<br><br>
<input type = "hidden" name = "oldProgram_name" value="<?php $GLOBALS['program_name'] = $_POST['program_name']; echo $program_name; ?>">
<input type = "hidden" name = "oldProgram_id" value="<?php $GLOBALS['program_id'] = $_POST['program_id']; echo $program_id; ?>">

<!--***Add below-->
<input type="hidden" name="submittedEdit" value="TRUE">
<!--***Done add above-->
<input type = "reset" name = "reset" value = "Cancel">
<input type = "submit" name = "edit_program" value = "Save">
<br><br>

</form>
<!--Done add form above-->


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

  