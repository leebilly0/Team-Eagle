
	<!-- Add php log out process After it press the logoff button-->
	<?php
		
		if(isset($_POST['log_out'])){
			require ("login_functions.inc");
			// This page lets the user logout.
			// If no session variable exists, redirect the user:
			if (!isset($_SESSION['user_name'])) {
				
				require_once ('login_functions.inc');
				$url = absolute_url('index.php');
				header("Location: $url");
				exit();
			} else { // Cancel the session.
				$_SESSION = array(); // Clear the variables.
				session_destroy(); // Destroy the session itself.
				setcookie ('PHPSESSID', '', time()-3600,'/', '', 0, 0); // Destroy the cookie.
			}	
			
			$url = absolute_url ('index.php'); // passing value of url as "loggedin.php"
			header("Location: $url");	
			
		}//End of if
	
	?>
	<!-- END OF LOG OUT PHP-->