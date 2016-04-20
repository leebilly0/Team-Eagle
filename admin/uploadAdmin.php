<!--***Add Session to every Admin page-->
	<!--***Add below-->
	<?php
	require ("adminHeader.php");
	?>
	<!--***Done add above-->
    <!-- END OF NAVBAR -->

    <!-- Start your coding below here -->
	
	<?php
	/*
	$directory = dir(getcwd());
	
	echo "Handle: ".$directory->handle."<br>";
	echo "Path: ". $directory->path."<br>";
	
	while(($file = $directory->read()) !== false){
		
		echo "file name: ".$file."<br>";
		
	}
	$directory->close();
	*/
	?>
	<?php
		
		if(isset($_POST['submit_book_file'])){
			//$fileUpload = basename($_FILES['fileToUpload']['name']);
			
			$target_directory = "uploads/";
			$target_file = $target_directory.basename($_FILES["fileToUpload"]["name"]);
			
			$uploadOK = 1;
			$bookFileType = pathinfo($target_file, PATHINFO_EXTENSION);
			
			//Check if book file i a action file or fake
			$checkFileSize = filesize($_FILES["fileToUpload"]["tmp_name"]);
			if($checkFileSize !== false){
					echo "Book file is ". $checkFileSize['mimie']."!";
					$uploadOK =1;
			}else {
				
				echo "File is not a fake one!";
				$uploadOk = 0;
			}
			
			
			//Function of upload the file
			if($uploadOK == 0){
				//if file is empty or fake
				echo "Sorry, your file was not uploaded!";
				
			}else{
				if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
					echo "Upload completted.\n";
					echo "The file ".basename($_FILES["fileToUpload"]["name"])." has been uploaded!";
					
					
				}else{
					echo "Sorry, there was an error uploading your file.";
					
				}
				
			}
			
			//echo "File upload is: ". $fileUpload; 
			
			/* work for recula txt
			$file = fopen($target_file, "r");
			 //output a line of the file until the end is reached
			 while(! feof($file)){
				 echo fgets($file);
			 }//End of while loop
			 //Close the file
			 fclose($file);
			 
			//echo readfile($target_file);
			*/
			
			
		/*	
		$objReader = PHPExcel_IOFactory::createReader("Excel2007");
		//$objPHPExcel = $objReader->load("05featuredemo.xlsx");
		
		$fileName = $target_file;
		try{
			$objPHPExcel = PHPExcel_IOFactory::load($fileName);
		}catch(Exception $e){
			die("Erro loading file: ".$e->getMessage()."<br>");
				
		}
			*/
			
		include 'simplexlsx.class.php';
			$xlsx = @(new SimpleXLSX($target_file));
			$data = $xlsx->rows();
			print_r($data);
			echo "<br>";
			
		
		
		
		}//End of sumbit button
	
	
	?>
	
	
	
	<!--Create Form for upload-->
	
	<form action ="uploadAdmin.php" method="POST" enctype="multipart/form-data">
		Select Book file to upload: 
		<input type = "file" name="fileToUpload" id= "fileToUpload"><br><br>
		<input type = "submit" value="Upload File" name="submit_book_file">
	
	</form>
	
	
	<!--Done create form for upload-->

	




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