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
//require("../configurationDatabase.php");
global $DataBaseCon; //grabs connection to MYSQL database

//var_dump($DataBaseCon);

if(isset($_POST['submit']))
{
    $titleAdmin = $_POST['titleAdmin'];
    $title=urldecode($titleAdmin);//Used for UTF8
    $authorFNameAdmin = $_POST['authorFNameAdmin'];
    $authorFName=urldecode($authorFNameAdmin);
    $authorLNameAdmin = $_POST['authorLNameAdmin'];
    $authorLName=urldecode($authorLNameAdmin);
    $genreAdmin = $_POST['genreAdmin'];
    $yearOfPubAdmin = $_POST['yearOfPubAdmin'];
    $isbnAdmin = $_POST['isbnAdmin'];
    $languageAdmin = $_POST['languageAdmin'];
    $costAdmin = $_POST['costAdmin'];
    $programName = $_POST['programName'];
    $program=urldecode($programName);
    echo $program;
    $donorName = $_POST['donorName'];
    $arrayName = explode(" ", $donorName);
    $donorfName =  $arrayName[0];
    $donorlName = $arrayName[1];
    $donorFirst =urldecode($donorfName);
     $donorLast =urldecode($donorlName);
     
     //I have problem with this query, it worked fine when i execute in Mysql
    $query = "Select program_id, program, yr_start, mission from program where program = '$program' ";
    $programresults = mysqli_query($DataBaseCon, $query);
    if (mysqli_num_rows($programresults) > 0)
                  {
    while ($row = mysql_fetch_row($programresults)){
        $programid = $row["program_id"];
        echo $programid;
    }
                  }
    
    $query2 = "Select donor_id from donors where donor_fname='$donorFirst' and donor_lname='$donorLast'";
    $donorresults = mysqli_query($DataBaseCon, $query2);
     if (mysqli_num_rows($donorresults) > 0)
                  {
   while ($row = mysql_fetch_row($donorresults)){
        $donorid = $row["donor_id"];
        echo $donorid;
    }
                  }
    
    $getData = "INSERT INTO `books` SET `book_title`='".$title."', `author_fname`='".$authorFName."',"
            . " `author_lname`='".$authorLName."', `genre`=".$genreAdmin.", `year_ofpub`='".$yearOfPubAdmin."',"
            . " `isbn`=".$isbnAdmin.", `language`='".$languageAdmin."', `cost`=".$costAdmin.", `donor_id`='".$donorid."',"
            . " `program_id`=".$programid.""; 



    $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query

}
header("Location: booksAdmin.php"); /* Redirect browser */
?>