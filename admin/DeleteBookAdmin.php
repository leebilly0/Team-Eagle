<?php
require("../configurationDatabase.php");
global $DataBaseCon; //grabs connection to MYSQL database
$id = $_GET['id'];
//echo $id;
//echo $id;
 $Query = "DELETE FROM books WHERE book_id= $id";
 
if (mysqli_query($DataBaseCon, $Query)) {
    echo "<script>alert('Book has been successfully deleted!');
         
    </script>";
header("Location: booksAdmin.php"); 
 
}else{
   echo "Error: " . $Query . "<br>" . mysqli_error($DataBaseCon);
}

mysqli_close($DataBaseCon);


?>

