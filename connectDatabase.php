			<?php
			//Make print of each rows of program
			
			/*Make database connection called DataBaseCon */
			//$DataBaseCon = mysqli_connect("localhost", "my_user", "my_password", "my_database_name");
			//$DataBaseCon = mysqli_connect("localhost", "ics499sp160106", "329969", "project");
			
			$DataBaseCon = mysqli_connect("localhost", "root", "", "project");
			
			//Check connection, if it unable to connect
			if(mysqli_connect_errno()){
				echo "Fail to connect to Database !";
				exit();
			}//End of check connection
			?>