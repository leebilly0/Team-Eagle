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

if (isset($_POST['editButton'])){
        $fName = filter_input(INPUT_POST, 'donorFNameAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $fNameInput=urldecode($fName);
        $lName = filter_input(INPUT_POST, 'donorLNameAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $lNameInput=urldecode($lName);
        $yearInput = filter_input(INPUT_POST, 'donorDate',FILTER_SANITIZE_SPECIAL_CHARS);
        $amountInput = filter_input(INPUT_POST, 'totalAmount');
        
        $editDonorId = $_SESSION["IdEdit"];
        //Check all fields are empty or not
        if (empty($fNameInput) && empty($lNameInput) && empty($yearInput) && empty($amountInput)) {
            //    if (empty($titleInput)&& empty($fNameInput)&& empty($lNameInput)&& empty($yearInput)&& empty($isbnInput)&& empty($languageInput)&& empty($cost)) {
            echo "<script>alert('At least one input field is filled to generate a report');
            window.location.href='searchadvanceAdmin.php';
                   </script>";
        }
        //query to execute
        $getData = "Update donors "
                . " set donor_fname='$fNameInput', "
                . "donor_lname = '$lNameInput' , "
                . "donate_dd = '$yearInput', "
                . "total_amt='$amountInput' where donor_id = '$editDonorId'" ;

        $results = mysqli_query($DataBaseCon, $getData);
}
header("Location: donorsAdmin.php"); /* Redirect browser */
?>