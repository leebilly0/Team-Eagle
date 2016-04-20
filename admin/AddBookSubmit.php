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
error_reporting(E_ALL);
ini_set('display_errors', '1');
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
    $yearOfPubAdmin = intval($_POST['yearOfPubAdmin']);
    $isbnAdmin = NULL;
    $languageAdmin = $_POST['languageAdmin'];
    $costAdmin = floatval($_POST['costAdmin']);
    $programName = $_POST['programName'];
    $arrayName2 = explode(" ", $programName);
    $programid =  intval($arrayName2[0]);
    $donorName = $_POST['donorName'];
    $arrayName = explode(" ", $donorName);
    $donorid=  intval($arrayName[0]);

    

    //var_dump($donorid);

    
    $getData = "INSERT INTO books (book_title, author_fname, author_lname, genre, year_ofpub, language, cost, donor_id, program_id) "
            . "VALUES ('".$title."', '".$authorFName."', '".$authorLName."', '".$genreAdmin."', ".$yearOfPubAdmin.", '".$languageAdmin."', ".$costAdmin.",  '".$donorid."', '".$programid."')";
            
            

    // $getData = "INSERT INTO `books` SET `book_title`='".$title."', `author_fname`='".$authorFName."',"
    //         . " `author_lname`='".$authorLName."', `genre`=".$genreAdmin.", `year_ofpub`='".$yearOfPubAdmin."',"
    //         . " `isbn`=".$isbnAdmin.", `language`='".$languageAdmin."', `cost`=".$costAdmin.", `donor_id`='".$donorid."',"
    //         . " `program_id`=".$programid.""; 

//var_dump($getData); 

    if (!$results = mysqli_query($DataBaseCon, $getData))
    {
      echo "Error: " .  mysqli_error($DataBaseCon);
    } //Grab results from database using connection and query

    $last_id = (string)mysqli_insert_id($DataBaseCon);
  //  var_dump($last_id);

   $target = "../imgbooks/"; 
    //$targetName = $target .basename($_FILES['userfile']['name'];
   $pic=($_FILES['photo']['tmp_name']);
   move_uploaded_file($pic, "../imgbooks/".$last_id.".jpg");

  // var_dump($targetName);
//   var_dump($pic);

 ///   var_dump($results);
 
header("Location: booksAdmin.php"); /* Redirect browser */
}
?>