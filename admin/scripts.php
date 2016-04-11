<?php

/**
 * 
 *
 * @author LynHuynh
 */
global $DataBaseCon;
function addBook(){
   if (isset($_POST['addBookAdmin'])){
            //store all the input text field of the form
        $titleInput = filter_input(INPUT_POST, 'title');
        $fNameInput = filter_input(INPUT_POST, 'authorFName');
        $lNameInput = filter_input(INPUT_POST, 'authorLName');
        $genreInput = filter_input(INPUT_POST, 'genre');
        $yearInput = filter_input(INPUT_POST, 'yearOfPub');
        $isbnInput = filter_input(INPUT_POST, 'isbn');
        $languageInput = filter_input(INPUT_POST, 'language');
        $cost = filter_input(INPUT_POST, 'cost');
        $costInput = null;
        if (strpos($cost, '$') !== false) {
            $costInput = $cost;
        } else {

            $costInput = "$" . $cost;
        }
        //Check all fields are empty or not
        if (empty($titleInput) && empty($fNameInput) && empty($lNameInput) && empty($genreInput) && empty($yearInput) && empty($isbnInput) && empty($languageInput) && empty($cost)) {
            //    if (empty($titleInput)&& empty($fNameInput)&& empty($lNameInput)&& empty($yearInput)&& empty($isbnInput)&& empty($languageInput)&& empty($cost)) {
            echo "<script>alert('At least one input field is filled to generate a report');
            window.location.href='searchadvance.php';
                   </script>";
        }
        //query to execute
        $insertQuery = "Insert into books (book_title,author_fname,author_lname,genre,year_ofpub,isbn,language,cost)"
       . " values ($titleInput,$fNameInput,$lNameInput,$genreInput,$yearInput,$isbnInput,$languageInput,$costInput) ";
if (mysqli_query($DataBaseCon, $insertQuery)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insertQuery . "<br>" . mysqli_error($DataBaseCon);
}

mysqli_close($DataBaseCon);
     
   }
}

function deleteBook(){
   if (isset($_POST['addBookAdmin'])){
       
        $deleteQuery = "Delete from books  ";
if (mysqli_query($DataBaseCon, $deleteQuery)) {
    echo "Deleted successfully";
} else {
    echo "Error: " . $deleteQuery . "<br>" . mysqli_error($DataBaseCon);
}

mysqli_close($DataBaseCon);
     
   }
}



?>