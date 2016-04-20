 
	 <!--***Add below-->

	<?php
	if(isset($_POST['Delete_Book'])){
			//****Called connecDatabase.php to do connection 
			require("../configurationDatabase.php");	
			$book_id = $_POST['book_id'];

			//Get name from database with each donor id
			$deleteBook = "DELETE FROM books WHERE book_id ='".$book_id."'";
			//$deleteProgram = mysqli_query($DataBaseCon, $deleteBook);
			if(mysqli_query($DataBaseCon, $deleteBook)){
				
			}else{
				
				echo "Not deleted Book successfully";
			}
			
	}	
	?>
	<!--***Done add above-->