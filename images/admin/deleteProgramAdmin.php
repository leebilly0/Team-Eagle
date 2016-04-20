<?php
require("../configurationDatabase.php");
global $DataBaseCon; //grabs connection to MYSQL database

$id = (isset($_GET['id']) ? $_GET['id'] : null);
//echo $id;
//echo $id;
 $Query = "DELETE FROM program WHERE program_id= $id";
 
if (mysqli_query($DataBaseCon, $Query)) {
    echo "<script>alert('Program has been successfully deleted!');
         
    </script>";
header("Location: programsAdmin.php"); 
 
}

mysqli_close($DataBaseCon);


?>