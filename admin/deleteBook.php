<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of deleteBook
 *
 * @author LynHuynh
 */
global $DataBaseCon;
$bookISBN = $_GET['isbnAdmin'];
 $deleteQuery = "Delete from books where isbn = $bookISBN ";
if (mysqli_query($DataBaseCon, $deleteQuery)) {
    echo "Deleted successfully";
} else {
    echo "Error: " . $deleteQuery . "<br>" . mysqli_error($DataBaseCon);
}

mysqli_close($DataBaseCon);

?>
