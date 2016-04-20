<!--***Add Session to every Admin page-->
	<!--***Add below-->
	<?php
	require ("adminHeader.php");
	  //Add database to page
	require ("../configurationDatabase.php");
	?>
	<!--***Done add above-->
    <!-- END OF NAVBAR -->

    <!-- Start your coding below here -->
	
	<?php
		
		if(isset($_POST['submit_book_file'])){
			//$fileUpload = basename($_FILES['fileToUpload']['name']);
			
			$target_directory = "uploads/";
			$target_file = $target_directory.basename($_FILES["fileToUpload"]["name"]);
			
			$uploadOK = 1;
			$bookFileType = pathinfo($target_file, PATHINFO_EXTENSION);
			
			
			
		include 'simplexlsx.class.php';
			$xlsx = @(new SimpleXLSX($target_file));
			$data = $xlsx->rows();
			//print_r($data);
			
			echo "<br>";
			$row = 1;
			foreach($data as $x => $x_value){
				
				for($column = 0 ; $column < 10; $column++ ){
					
					//Print example 
					//echo "Row is: ".$row.", column: ".$column." has:".$data[$row][$column]."<br>";
					
					//$book_id = $data[$row][0];
					//$clssification = $data[$row][1];
					//$clssification_number = $data[$row][2];

					$language = $data[$row][3];
					$book_title = $data[$row][4];				
					$author = $data[$row][5];
				//	$publisher = $data[$row][6];
					$year_ofpub = intval($data[$row][7]);					
					//$numberOfPage = $data[$row][8];
					$cost = floatval($data[$row][9]);
					//$image_file_name = $data[$row][10];			
				}
	
			//Command to insert into the databasse
			$getData = "INSERT INTO books (book_title, author_fname, year_ofpub, LANGUAGE, cost) VALUES ('".$book_title."', '".$author."', '".$year_ofpub."', '".$language."', '".$cost."')"; 
			$results = mysqli_query($DataBaseCon, $getData);
				
				
				
				$row++;
				
				
			}
			
		
			
		
		header("Location: booksAdmin.php");
		
		}//End of sumbit button
	 /* Redirect browser */
	
	?>
	
	
	
	<!--Create Form for upload-->
	  <br>
        <div class="container center_div row-padding">

            <div class="panel panel-primary ">
                <div class="panel-heading"> <h4>Edit Book</h4></div>
                <div class="panel-body">
                    <p>Edit the book's info below</p>
	<form action ="uploadAdmin.php" method="POST" enctype="multipart/form-data">
		 <div class="form-group">
         	<label class="control-label col-sm-2" >Book file To Upload::</label>
          	<div class="col-sm-10">  
				<input type = "file" name="fileToUpload" id= "fileToUpload"><br><br>
				<button type="submit" name="submit_book_file" value ="Upload File" class="btn btn-primary">Upload File</button>
				</div>
                        </div>
	
	</form>

	 </div>
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