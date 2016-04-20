<?php
require("../configurationDatabase.php");
global $DataBaseCon; //grabs connection to MYSQL database
$id = $_GET['id'];
//echo $id;
//echo $id;
 $Query = "DELETE FROM donors WHERE donor_id= $id";
 
if (mysqli_query($DataBaseCon, $Query)) {
    echo "<script>alert('Donor has been successfully deleted!');
         
    </script>";
header("Location: donorsAdmin.php"); 
 
}else{
   echo "Error: " . $Query . "<br>" . mysqli_error($DataBaseCon);
}

mysqli_close($DataBaseCon);


?>