
	<!--***Add below-->
	<?php
	require ("userHeader.php");
	?>
	<!--***Done add above-->

  <!-- Start your coding below here -->
     <?php
    /*There are two parts to connection to the database and querying results, THIS IS STEP 1
    SEE LINE 133 for further step*/
    global $DataBaseCon; //grabs connection to MYSQL database
    //My Query I will be Using
	
   // $getData = "SELECT book_id ,book_title,author_fname,author_lname,genre,year_ofpub,isbn,language,cost FROM books ORDER BY book_title"; 
    $getData = "SELECT * FROM books ORDER BY book_title"; 
    
	$results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
?>
  
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main row-padding">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4 class="sub-header text-center">Here is the list of available books in Vunnava Dot Com Library: </h4></div>
                <div class="panel-body">    <div class="table-responsive">
                        
		<table class="table table-striped">
           <!-- Table with Data -->
              <!--Headers for data table-->
              <thead>
                <tr>
                  <th>Book Title</th>
                  <th>Author Name</th>
                  <th>Genre</th>
                  <th>Year of Publish</th>
                   <th>ISBN</th>
                  <th>Language</th>
                  <th>Cost</th>
				  <th>Donor</th>
				  <th>Program</th>
                </tr>
              </thead>
              <!--Data for Table -->
              <tbody>
                <?php
                  /*THIS IS STEP 2 in QUERYING FROM DATABASE SEE LINE 79 FOR STEP 1*/
                  //if data exist in table
                  if (mysqli_num_rows($results) > 0)
                  {
                    //output data of each row 
                    while ($row = mysqli_fetch_assoc($results))
                    {
					
					//Get the donor name from donors table					
					$getDonor = "SELECT donor_fname, donor_lname FROM donors WHERE donor_id ='".$row['donor_id']."'";
					$resultDonor = mysqli_query($DataBaseCon, $getDonor);
					
					if(mysqli_num_rows($resultDonor) > 0){
						$rowDonor = mysqli_fetch_assoc($resultDonor);
						$donorName = $rowDonor['donor_fname'].$rowDonor['donor_lname'];
						
					}else{
						echo "No Donor found!";
					}
					
					//Get the program name from program table
					$getProgram = "SELECT program FROM program WHERE program_id = '".$row['program_id']."'";
					$resultProgram = mysqli_query($DataBaseCon, $getProgram);	
					
					if(mysqli_num_rows($resultProgram) > 0){
						$rowProgram = mysqli_fetch_assoc($resultProgram);
						$program = $rowProgram['program'];
						
					}else{
						
						echo "No Program Found!";
					}
					
                      /*while results has row of data. output first name, last name
                      date, total amount and a link*/
                      echo "<tbody>";
        echo "<tr>";
        echo "<td>" .$row["book_title"]. "</td>";
        echo "<td>" .$row["author_fname"]. " " . $row["author_lname"] . "</td>";
        echo "<td>" .$row["genre"]. "</td>";
        echo "<td>" .$row["year_ofpub"]. "</td>";
        echo "<td>" .$row["isbn"]. "</td>";
        echo "<td>" .$row['LANGUAGE']."</td>";
        echo "<td>" .$row["cost"]."</td>";
		
		echo "<td>" .$donorName."</td>";
		echo "<td>" .$program."</td>";
					
        echo "</tr>";    
        echo "</tbody>";
                    }
                  }
                ?>  
            
					</tbody>
                    </table>
                </div></div>
            </div>
        </div>

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