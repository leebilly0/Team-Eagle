
<!--***Add Session to every Admin page-->
	<!--***Add below-->
	<?php
	require ("adminHeader.php");
	require("deleteProgramAdmin.php");
	?>
	<!--***Done add above-->
 <!-- Start your coding below here -->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
    <!-- Start your coding below here -->
	<h1>Programs</h1>
	<p>Here is all the programs that donors have donated for</p>

	<h4><a href = "addprogramAdmin.php" >Add New Program</a></h4>
	<!--Table of program to display-->
	
<div class="table-responsive">
            <table class="table table-striped">
              <!--Headers for data table-->
              <thead>
                <tr>
                  <th>Program ID</th>
                  <th>Program Name</th>
                  <th>Year Started</th>
                  <th>Mission Statement/Reason For Program</th>
                </tr>
              </thead>
              <!--Data for Table -->
              <tbody>
              <!--Headers for data table-->
              <thead>
		
			<!--***Add below-->
			<?php
			
			//****Called connecDatabase.php to do connection 
			require("../configurationDatabase.php");
		//	global $DataBaseCon; //grabs connection to MYSQL database
			$getDatabase = "SELECT program_id,program,yr_start,mission FROM program LIMIT 1, 18446744073709551615";
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
				echo "<td><a href='viewbooksprogramAdmin.php?program_id=".$row["program_id"]."&program_name=".$row["program"]."'>View Books </a> &nbsp &nbsp 
					<a href='viewdonorsprogramAdmin.php?program_id=".$row["program_id"]."&program_name=".$row["program"].
                        "'>View Donors</a> &nbsp &nbsp 
                        <a href='editprogramAdmin.php?editId=".$row['program_id'].
                    "'>Edit</a> &nbsp&nbsp<a href='deleteProgramAdmin.php?id=".$row['program_id']."'>Delete</a></td>";

				
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
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>