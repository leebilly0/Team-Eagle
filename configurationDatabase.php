<?php

$password = 'root';
$count = 0;
$loopFlag = true;

while ($loopFlag)
{
	//if connection is not made to mySQL server with root password
	//the @ symbol surpress warning for not connecting with my password
	if(!$DataBaseCon = @mysqli_connect("localhost","root", $password)){

		//try connecting with other passwords
		if ($count == 0)
			$password = '';	//use Poleaps password
		if ($count == 1)
			$password = '2031';	//use linhs password
		if ($count == 2)
			$password = 'Jvm1337!';	//use jeans password
		if ($count == 3)
		{
			//**If not connect message error
			echo "Error connecting to Data Base <br />";

			exit();//exit function will print the error message first, and exit the current script
			$loopFlag = false;	//breaks loop
		}
		$count++;
	}
	else
	{
		$loopFlag = false;	//breaks loop
	}
}	
		
		//**check if the command is not select the right database, give error message
		//**change the default path to specific data base table "userAndPassword"
if (!mysqli_select_db($DataBaseCon, "project"))   {
		
			//if the database is not select, it print messege error
			echo "Error selecting Data Base<br />";
			exit();
		}//end if select database