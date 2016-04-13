
	<!--***Add below-->
	<?php
	require ("adminHeader.php");
	
	?>
	<!--***Done add above-->
	
	<!--***Add Below for check loginID and password to make check with database-->
	<?php
	
	if(isset($_POST['submitted'])){
		session_start();
		$_SESSION['logAtPage'] = 'index.php';
		//Go to the login_functions.inc to check with database
		require ("login_functions.inc");
		
	}
	?>
	<!--***Done add above-->
	
    <!-- **Add below Start your coding below here -->
	<h1>View Book for "<?php $program_name = $_POST['program_name'];
          echo $program_name; ?> "</h1>
	<br />
	<!--Table of program to display-->
	<table class = "tdBookAdmin" style="width: 100%" >
		<tr>
			<th class = "tdBookAdmin">Title</th>
			<th class = "tdBookAdmin">Author</th>
			<th class = "tdBookAdmin">Genre</th>
			<th class = "tdBookAdmin">Year of Publication</th>
			<th class = "tdBookAdmin">ISBN</th>
			<th class = "tdBookAdmin">Language</th>
			
		</tr>
		
		<!--***Add below-->
			<?php
			//***Add Billy code***//
			// global $DataBaseCon; //grabs connection to MYSQL database
			 //***Done Add Billy code***//
			 
			 
			//****Called connecDatabase.php to do connection 
			require("../configurationDatabase.php");
			$program_id = $_POST['program_id'];
			$getDatabase = 'SELECT book_title, author_fname, author_lname, genre, year_ofpub,isbn, LANGUAGE FROM books WHERE program_id ="'.$program_id.'"';
			
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
				$title = $row["book_title"];
				$author_fname = $row["author_fname"];
				$author_lname = $row["author_lname"];
				$author = $author_fname.$author_lname;
				$genre = $row["genre"];
				$year_pub = $row["year_ofpub"];
				$ISBN = $row["isbn"];
				$language = $row["LANGUAGE"];
				
				echo "<tr>";
				echo "<td class = 'tdBookAdmin'>".$title."</td>";
				echo "<td class = 'tdBookAdmin'>".$author."</td>";
				echo "<td class = 'tdBookAdmin'>".$genre."</td>";
				echo "<td class = 'tdBookAdmin'>".$year_pub."</td>";
				echo "<td class = 'tdBookAdmin'>".$ISBN."</td>";
				echo "<td class = 'tdBookAdmin'>".$language."</td>";
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