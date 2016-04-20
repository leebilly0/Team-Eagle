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
 $mission = filter_input(INPUT_POST, 'mission',FILTER_SANITIZE_SPECIAL_CHARS);
        $missionInput=urldecode($mission);
        $program = filter_input(INPUT_POST, 'programName',FILTER_SANITIZE_SPECIAL_CHARS);
        $programInput=urldecode($program);
        $yearInput = filter_input(INPUT_POST, 'year',FILTER_SANITIZE_SPECIAL_CHARS);
        $editProgramId = $_SESSION["IdEdit"];
        //Check all fields are empty or not
        if (empty($missionInput) && empty($programInput) && empty($yearInput) && empty($editProgramId)) {
            //    if (empty($titleInput)&& empty($fNameInput)&& empty($lNameInput)&& empty($yearInput)&& empty($isbnInput)&& empty($languageInput)&& empty($cost)) {
            echo "<script>alert('At least one input field is filled to generate a report');
            window.location.href='searchadvanceAdmin.php';
                   </script>";
        }
        //query to execute
        $getData = "Update program "
                . " set program = '$program', yr_start='$yearInput', "
                . "mission = '$missionInput' where program_id = '$editProgramId'" ;

        $results = mysqli_query($DataBaseCon, $getData);
}
header("Location: programsAdmin.php"); /* Redirect browser */
?>