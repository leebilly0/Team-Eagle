<!DOCTYPE html>
<!--Add Session to every Admin page-->
<?php
	//Add session to be start
	require ("../session.php");
	//Add php log out process After it press the logoff button
	require ("../logoff.php");      

   //To have access to mysql database
  require ("../configurationDatabase.php");

?>

<?php

global $DataBaseCon; //grabs connection to MYSQL database

if(isset($_POST['submit']))
{
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $donateyear = $_POST['donateYear'];
    $totalamount = $_POST['totalAmountDonated'];

    return $fname;
   

    $getData = "INSERT INTO donors (donor_fname, donor_lname, donate_dd, total_amt) VALUES('".$fname."', '".$lname."', '".$donateyear."', ".$totalamount.")"; 
    $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
}

header("Location: donorsAdmin.php"); /* Redirect browser */
exit();
?>