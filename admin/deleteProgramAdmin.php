 
	 <!--***Add below-->

	<?php
	if(isset($_POST['Delete_program'])){
			//****Called connecDatabase.php to do connection 
			require("../connectDatabase.php");	
			$program_id = $_POST['program_id'];
			$program_name = $_POST['program_name'];
			//Get name from database with each donor id
			$deleteData = 'DELETE FROM program WHERE program_id ='.$program_id.' AND program = "'.$program_name.'"';
			//$deleteProgram = mysqli_query($DataBaseCon, $deleteData);
			if(mysqli_query($DataBaseCon, $deleteData)){
				
			}else{
				
				echo "Not deleted successfully";
			}
			
	}	
	?>
	<!--***Done add above-->