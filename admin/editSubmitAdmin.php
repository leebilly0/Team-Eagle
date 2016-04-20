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
 $title = filter_input(INPUT_POST, 'titleAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $titleInput=urldecode($title);
        $fName = filter_input(INPUT_POST, 'authorFNameAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $fNameInput=urldecode($fName);
        $lName = filter_input(INPUT_POST, 'authorLNameAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $lNameInput=urldecode($lName);
        $genreInput = filter_input(INPUT_POST, 'genreAdmin');
        $yearInput = filter_input(INPUT_POST, 'yearOfPubAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $isbnInput = filter_input(INPUT_POST, 'isbnAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $languageInput = filter_input(INPUT_POST, 'languageAdmin');
        $cost = filter_input(INPUT_POST, 'costAdmin');

        
        
        $editBookId = $_SESSION["IdEdit"];
        //Check all fields are empty or not
        if (empty($titleInput) && empty($fNameInput) && empty($lNameInput) && empty($genreInput) && empty($yearInput) && empty($isbnInput) && empty($languageInput) && empty($cost)) {
            //    if (empty($titleInput)&& empty($fNameInput)&& empty($lNameInput)&& empty($yearInput)&& empty($isbnInput)&& empty($languageInput)&& empty($cost)) {
            echo "<script>alert('At least one input field is filled to generate a report');
            window.location.href='searchadvanceAdmin.php';
                   </script>";
        }
        //query to execute
        $getData = "Update books "
                . " set book_title = '$titleInput',author_fname='$fNameInput', "
                . "author_lname = '$lNameInput' , genre='$genreInput' , "
                . "year_ofpub = '$yearInput', isbn='$isbnInput',"
                . "language = '$languageInput',cost='$cost' where book_id = '$editBookId'" ;

        $results = mysqli_query($DataBaseCon, $getData);

         $newpic= ($_FILES['photo']['tmp_name']);
         var_dump($newpic);


        if(isset($_FILES['photo'])){

           $target = "../imgbooks/".$editBookId.".jpg"; 
           $pic=($_FILES['photo']['tmp_name']);
           move_uploaded_file($pic, $target);
        // //  var_dump($target);
        //   var_dump($pic);
        }
        
}
header("Location: booksAdmin.php"); /* Redirect browser */
?>