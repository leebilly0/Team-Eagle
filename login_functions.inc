


<?php

function absolute_url ($page = 'logginIndex.php') {
 $url = 'http://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
 $url = rtrim($url, '/\\');
 $url .= '/' . $page; //comment $url value is = loggedIn.php
 return $url;
 
 //the whole code above will set the url to http://severnameanddirectory/url-value
}  

//**Call first when the loginIndex.php page is submitted
function check_login($loginID = '', $password = '') {


	$errors = array(); // Declare variable $errors  as an array
	
	//If user don't enter login id
	if (empty($loginID)) {
	$errors[] = 'Please enter login ID';
	} 
	// If user don't enter password
	if (empty($password)) {
	$errors[] = 'Please enter password';
	} 



	//**If the errors array is empty or mean no error or has user enter both in login id and password
	if (empty($errors)) {    

		//**1. Make connection to database /SQL
		//**variable $DataBaseCon is set equal to make connection to database from php 
	
		//**Below is check to see if it not able to connect with database, it will give an error message
		if(!$DataBaseCon = mysqli_connect("localhost","root","2031")){
		
			//**If not connect message error
			echo "Error connecting to Data Base <br />";
	
			exit();//exit function will print the error message first, and exit the current script
	
		}//end if $DataBaseCon
		
		
		//**check if the command is not select the right database, give error message
		//**change the default path to specific data base table "userAndPassword"
		if (!mysqli_select_db($DataBaseCon, "project"))   {
		
			//if the database is not select, it print messege error
			echo "Error selecting Data Base<br />";
			exit();
		}//end if select database


		//**Need to change for difference name to macth your database table's name
		//**command below is to INSERT DATA into DATABASE TABLE
		$getDatabase = "SELECT NAME FROM logins WHERE username = '$loginID' AND PASSWORD = '$password' ";
		
		
		//***mysqli_query is command
		//**perform the queries and if it connect and run command fine, it returns true
		//**if true
		if($checkResult = mysqli_query($DataBaseCon, $getDatabase)){
			
			//*Return the number of the row as integer
			$resultRowCount = mysqli_num_rows($checkResult);
			
			//**If resultRowCount > 0 mean it found match password and login id in database
			if ($resultRowCount >0){
				
				//**Make $returnUsertype variable to collect data information as return result into an array
				$returnUserName = mysqli_fetch_assoc($checkResult);
				
					//**set the $returnName = 'name' for pass back to logginIndex.php
					$returnName = $returnUserName['NAME'];
  
					//this we return the value back as loginID = true and $returnName = 'name'
					return array(true, $returnName, $errors);	
			
			}//end if $resultRownCount > 0
			
			//**If there no result match or 0 row return
			if ($resultRowCount <= 0){
			
				$errors[] = 'Login ID and Password is incorrect!';
			
			}
	
		}//**End if $checkResult

	} //**End of empty($errors) IF.
	
	// Return false and the errors:
	return array(false, $errors);
 
 
	  
} // End of check_login() function.
?>


