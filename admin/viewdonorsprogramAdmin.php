

    <!-- Start your coding below here -->
	<!--***Add below-->
	<?php
	require ("adminHeader.php");
	
	?>
	<!--***Done add above-->

    <!-- Start your coding below here -->

 <!-- Start your coding below here -->
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
          <br/>
          <br/>
 
 <!--***Add below-->
	<h2>View Donors for <?php $program_name = $_GET['program_name'];
          echo $program_name; ?> </h2>
	<br />
	<!--Table of program to display-->
	<div class="table-responsive">
            <table class="table table-striped">
              <!--Headers for data table-->
              <thead>
                <tr>
			<th class = "tdBookAdmin">ID</th>
			<th class = "tdBookAdmin">First Name</th>
			<th class = "tdBookAdmin">Last Name</th>
			<th class = "tdBookAdmin">Total Amount</th>
</tr>
              </thead>
              <!--Data for Table -->
              <tbody>
		<!--***Add below-->
			<?php
			//****Called connecDatabase.php to do connection 
			require("../configurationDatabase.php");
			
			$program_id = $_GET['program_id'];
			
			//Get all donor id that donate to that program 1,2
			//Get list of all donor donate to program 1
			$getDornorID = $getDatabase = 'SELECT donor_id from books WHERE program_id="'.$program_id.'"';
			if(!$result1 = mysqli_query($DataBaseCon, $getDornorID)){
				echo "Could not successfully run query";
				exit();
			}
			//If there no match result found
			if(mysqli_num_rows($result1) == 0){
				echo "No result found !";
				exit();
			}
			
			while($rowDonorID = mysqli_fetch_assoc($result1)){
				$donor_id = $rowDonorID['donor_id'];

			//Get name from database with each donor id
			$getDatabase = 'SELECT donor_id, donor_fname, donor_lname, total_amt FROM donors WHERE donor_id ="'.$donor_id.'"';
			//Run query
			if(!$result = mysqli_query($DataBaseCon, $getDatabase)){
				echo "Could not successfully run query";
				exit();
			}
			//If there no match result found
			if(mysqli_num_rows($result) == 0){
				echo "No result found !";
				exit();
			}
		
			while($row = mysqli_fetch_assoc($result)){
				$donor_id = $row["donor_id"];
				$donor_fname = $row["donor_fname"];
				$donor_lname = $row["donor_lname"];
				$GLOBALS['total_amt'] = $row["total_amt"];
				
				
				echo "<tr>";
				echo "<td class = 'tdBookAdmin'>".$donor_id."</td>";
				echo "<td class = 'tdBookAdmin'>".$donor_fname."</td>";
				echo "<td class = 'tdBookAdmin'>".$donor_lname."</td>";
				echo "<td class = 'tdBookAdmin'>".$total_amt."</td>";
				echo "</tr>";

			}//End of while loop
			
			}//End of get donor id  loop

			?>
</tbody>
            </table>
            <br/>
             <!-- Back Button -->
            <center><a class="btn btn-primary" href="programsAdmin.php" role="button">Back To Programs</a></center>
          </div>
        </div>




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