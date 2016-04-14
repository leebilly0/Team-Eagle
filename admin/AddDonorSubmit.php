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

//var_dump($DataBaseCon);

if(isset($_POST['submit']))
{
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $donateyear = $_POST['donateYear'];
    $totalamount = $_POST['totalAmountDonated'];

    $getData = "INSERT INTO `donors` SET `donor_fname`='".$fname."', `donor_lname`='".$lname."', `donate_dd`='".$donateyear."', `total_amt`=".$totalamount.""; 


   //$getData = "INSERT INTO donors (donor_fname, donor_lname, donate_dd, total_amt) VALUES('".$fname."', '".$lname."', '".$donateyear."', ".$totalamount.")"; 
    //INSERT INTO donors (donor_fname, donor_lname, donate_dd, total_amt) VALUES('Billy', 'Lee', '2000', 400.00);

    $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query

   // var_dump($results);
  //  mysql_close();
}
header("Location: donorsAdmin.php"); /* Redirect browser */
?>