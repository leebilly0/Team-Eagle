
<!--***Add below-->
<?php
	//Add session to be start
	require ("adminHeader.php");
	//Add php log out process After it press the logoff button
	require ("../logoff.php");      
?>
<!--***Done add above-->  

   <!-- Start your coding below here -->  
   <!--***Add below--> 
   <?php
	if(isset($_POST['submitEdit'])){
	
	$newProgram = $_POST['newProgramName'];
	$year_start = $_POST['year_start'];
	$mission = $_POST['mission'];

	//****Called connecDatabase.php to do connection from adminHeader.php	
	//Insert program edit to database
	$insertProgram = "INSERT INTO program(program,yr_start, mission ) VALUES('".$newProgram."','".$year_start."','".$mission."')";			
	//Check if it return true or false
	if(mysqli_query($DataBaseCon, $insertProgram)){
		echo "Add Successfuly !";
	
	}else{
		
		echo "Add Error!";
	}

}//End of if edit
?>
 

<h2>Add Program</h2>
<form name="Edit_form" action="addprogramAdmin.php" method="POST">
Program Name:<br>
<input type = "text" name = "newProgramName">
<br><br>
Year Start:<br>
<input type = "number" name = "year_start" min="1" max="3000">
<br><br>
Mission Statement: <br>
<input style= "width: 36%; height: 111px;" type = "text" name = "mission">
<br><br>
<!--***Add below-->
<input type="hidden" name="submitEdit" value="TRUE">
<!--***Done add above-->
<input type = "reset" name = "reset" value = "Cancel">
<input type = "submit" name = "edit_program" value = "Save">
<br><br>
</form>

  </body>
<!-- end of body -->

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

  