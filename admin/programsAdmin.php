
<!--***Add Session to every Admin page-->
	<!--***Add below-->
	<?php
	require ("adminHeader.php");
	require("deleteProgramAdmin.php");
	?>
	<!--***Done add above-->

    <!-- Start your coding below here -->
	<h1>Programs</h1>
	<br>
	<h3><a href = "addNewProgram.php" >Add New Program</a></h3>
	<!--Table of program to display-->
	<table class = "tdProgramsAdmin" style="width: 100%" >
		<tr>
			<th class = "tdProgramsAdmin">Program ID</th>
			<th class = "tdProgramsAdmin">Program Name</th>
			<th class = "tdProgramsAdmin">Year Started</th>
			<th class = "tdProgramsAdmin">Mission Statement/Reason For Program</th>
			<th class = "tdProgramsAdmin" colspan= "4">Edit</th>
		</tr>
		
			<!--***Add below-->
			<?php
			
			//****Called connecDatabase.php to do connection 
			require("../connectDatabase.php");
		//	global $DataBaseCon; //grabs connection to MYSQL database
			$getDatabase = "SELECT program_id,program,yr_start,mission FROM program ";
			//Run query
			if(!$result = mysqli_query($DataBaseCon, $getDatabase)){
				echo "Could not successfully run query";
				exit();
			}
			//If there no match result found
			if(mysqli_num_rows($result) == 0){
				echo "No rows found !";
				exit();
			}
		
			while($row = mysqli_fetch_assoc($result)){
				$number = $row["program_id"];
				$program_name = $row["program"];
				$year = $row["yr_start"];
				$mission = $row["mission"];
				
				//Convert integer to string as program id session name
				//$progID = '"'.$number.'"';
				//$_SESSION[$progID] = $number;
				
				
				echo "<tr>";
				echo "<td class = 'tdProgramsAdmin'>".$number."</td>";
				echo "<td class = 'tdProgramsAdmin'>". $program_name."</td>";
				echo "<td class = 'tdProgramsAdmin'>".$year."</td>";
				echo "<td class = 'tdProgramsAdmin'>". $mission."</td>";
				
				echo "<td class = 'tdProgramsAdmin'>
						<form name='submit_program_ID' action='viewbooksprogramAdmin.php' method='POST'>
						<input type= 'hidden' name ='program_id' value ='".$number."'>
						<input type ='submit' name='submitProgramID' value = 'View Book' >
						</form>
					</td>";
				
				//echo "<td class = 'tdProgramsAdmin'><a href='viewbooksprogramAdmin.php'>View Books</a></td>";
				//echo "<td class = 'tdProgramsAdmin'><a href='viewdonorsprogramAdmin.php'>View Donors</a></td>";
				echo "<td class = 'tdProgramsAdmin'>
						<form name='submit_program_ID' action='viewdonorsprogramAdmin.php' method='POST'>
						<input type= 'hidden' name ='program_id' value ='".$number."'>
						<input type= 'hidden' name ='program_name' value ='".$program_name."'>
						<input type ='submit' name='submitProgramID' value = 'View Donor' >
						</form>
					</td>";
				
				echo "<td class = 'tdProgramsAdmin'>
						<form name='submit_program_ID' action='editprogramAdmin.php' method='POST'>
						<input type= 'hidden' name ='program_id' value ='".$number."'>
						<input type= 'hidden' name ='program_name' value ='".$program_name."'>
						<input type ='submit' name='edit_program' value = 'Edit' >
						</form>
					</td>";	
				
				echo "<td class = 'tdProgramsAdmin'>
						<form name='submit_program_ID' action='programsAdmin.php' method='POST'>
						<input type= 'hidden' name ='program_id' value ='".$number."'>
						<input type= 'hidden' name ='program_name' value ='".$program_name."'>
						<input type ='submit' name='Delete_program' value = 'Delete Program' >
						</form>
					</td>";
				
				echo "</tr>";

			}//End of while loop

			?>
	</table>
	<!--***Done add above-->




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