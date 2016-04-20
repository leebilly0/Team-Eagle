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
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Vunnava Dot Com Library</title>

        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../style.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../s/ie-emulation-modes-warning.js"></script>
       <!--   <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>



    <!-- THIS IS THE NAVBAR AT THE TOP OF EVERYPAGE -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Start of Links on left nav bar -->
                <a class="navbar-brand" href="../indexAdmin.php"><img class="header-logo" alt="Vunnava Dot Com Library Logo" src="../images/logo.png"></a>
                <ul class="nav navbar-nav">
                    <li><a href="booksAdmin.php">Books</a></li>
                    <li><a href="donorsAdmin.php">Donors</a></li>
                    <li><a href="programsAdmin.php">Programs</a></li>
                    <li><a href="searchAdmin.php">Search</a></li>
                    <li><a href="aboutAdmin.php">About</a></li>
                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Tools<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="addbookAdmin.php">Add Book</a></li>
                <li><a href="adddonorAdmin.php">Add Donor</a></li>
                <li><a href="addprogramAdmin.php">Add Program</a></li>
                <li><a href="addAdmin.php">Add Admin</a></li>
                <li><a href="uploadAdmin.php">Upload Spreadsheet</a></li>
              </ul>
            </li>
                </ul>
            </div>

            <!-- Start of username password form of right nav bar -->
            <div id="navbar" class="navbar-collapse collapse">
                <form class="navbar-form navbar-right" action="../logoff.php" method="POST">
                    <div class="form-group">
                        <FONT COLOR="Black">Welcome Back<?php echo " {$_SESSION['user_name']}"; ?>&#33;</FONT>
                        <button type="submit" class="btn btn-primary" name="log_out">Log off</button>

                </form>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

  
   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main row-padding">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4 class="sub-header text-center">Search Results: </h4></div>
                <div class="panel-body">    <div class="table-responsive">
                        <table class="table table-striped">
<?php
global $DataBaseCon; //grabs connection to MYSQL database

if (isset($_POST['searchAdmin'])) {
    $keyword = filter_input(INPUT_POST, 'keywordToSearchAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
    $keywordInput=urldecode($keyword);
    $_SESSION["bookKeyword"] = $keywordInput;
    // check the input is empty or not. If not then pop up an alert message
    if (empty($keywordInput)) {
        echo "<script>alert('Please fill out the input field to generate a report');
            window.location.href='searchAdmin.php';
                   </script>";
    }
    //query to execute
    $getData = "SELECT book_id,book_title,author_fname,author_lname,genre,year_ofpub,isbn,language,cost"
            . " FROM books WHERE book_title LIKE CONCAT('%', '$keywordInput', '%') "
            . "OR author_fname LIKE CONCAT('%', '$keywordInput', '%')  OR author_lname LIKE CONCAT('%', '$keywordInput', '%') OR genre LIKE CONCAT('%', '$keywordInput', '%')"
            . "OR year_ofpub LIKE CONCAT('%', '$keywordInput', '%') OR isbn LIKE CONCAT('%', '$keywordInput', '%') OR language LIKE CONCAT('%', '$keywordInput', '%') OR cost LIKE CONCAT('%', '$keywordInput', '%')";
    $results = mysqli_query($DataBaseCon, $getData); //Grab results from database using connection and query
    echo "<thead>";
echo "<tr>";
echo "<th>Book Title</th>";
echo "<th>Author Name</th>";
echo "<th>Genre</th>";
echo "<th>Year of Publish</th>";
echo "<th>ISBN</th>";
echo "<th>Language</th>";
echo "<th>Cost</th>";
echo "</tr>";
echo "/<thead>";
//if data exist in table
if (mysqli_num_rows($results) > 0) {
    //output data of each row 
    while ($row = mysqli_fetch_assoc($results)) {
        /* while results has row of data. output first name, last name
          date, total amount and a link */

        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row["book_title"] . "</td>";
        echo "<td>" . $row["author_fname"] . " " . $row["author_lname"] . "</td>";
        echo "<td>" . $row["genre"] . "</td>";
        echo "<td>" . $row["year_ofpub"] . "</td>";
        echo "<td>" . $row["isbn"] . "</td>";
        echo "<td>" . $row["language"] . "</td>";
        echo "<td>" . $row["cost"] . "</td>";
      echo "<td><a href='editbookAdmin.php?editId=".$row['book_id']."'>Edit</a> &nbsp<a href='deleteKeywordSearchBook.php?id=".$row['book_id']."'>Delete</a></td>";
      
        echo "</tr>";
        
        echo "</tbody>";
    }
}
}
if (isset($_POST['advancedSearchAdmin'])){
            //store all the input text field of the form
        $title = filter_input(INPUT_POST, 'titleAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $titleInput=urldecode($title);
        $_SESSION["bookTitle"] = $titleInput;
        $fName = filter_input(INPUT_POST, 'authorFNameAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $fNameInput=urldecode($fName);
        $_SESSION["authorFName"] = $fNameInput;
        $lName = filter_input(INPUT_POST, 'authorLNameAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $lNameInput=urldecode($lName);
        $_SESSION["authorLName"] = $lNameInput;
        $genreInput = filter_input(INPUT_POST, 'genreAdmin');
        $_SESSION["bookGenre"] = $genreInput;
        $yearInput = filter_input(INPUT_POST, 'yearOfPubAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $_SESSION["year"] = $yearInput;
        $isbnInput = filter_input(INPUT_POST, 'isbnAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $_SESSION["isbn"] = $isbnInput;
        $languageInput = filter_input(INPUT_POST, 'languageAdmin');
        $_SESSION["language"] = $languageInput;
        $cost = filter_input(INPUT_POST, 'costAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $costInput = null;
        if (strpos($cost, '$') !== false) {
            $costInput = $cost;
        } else {

            $costInput = "$" . $cost;
        }
        $_SESSION["cost"] = $costInput;
        //Check all fields are empty or not
        if (empty($titleInput) && empty($fNameInput) && empty($lNameInput) && empty($genreInput) && empty($yearInput) && empty($isbnInput) && empty($languageInput) && empty($cost)) {
            //    if (empty($titleInput)&& empty($fNameInput)&& empty($lNameInput)&& empty($yearInput)&& empty($isbnInput)&& empty($languageInput)&& empty($cost)) {
            echo "<script>alert('At least one input field is filled to generate a report');
            window.location.href='searchadvanceAdmin.php';
                   </script>";
        }
        //query to execute
        $getData = "SELECT book_id,book_title,author_fname,author_lname,genre,year_ofpub,isbn,language,cost"
                . " FROM books WHERE (book_title = '$titleInput' or author_fname='$fNameInput' or "
                . "author_lname = '$lNameInput' or genre='$genreInput' or "
                . "year_ofpub = '$yearInput' or isbn='$isbnInput' or "
                . "language = '$languageInput' or cost='$costInput')";

        $results = mysqli_query($DataBaseCon, $getData);
        echo "<thead>";
echo "<tr>";
echo "<th>Book Title</th>";
echo "<th>Author Name</th>";
echo "<th>Genre</th>";
echo "<th>Year of Publish</th>";
echo "<th>ISBN</th>";
echo "<th>Language</th>";
echo "<th>Cost</th>";
echo "</tr>";
echo "/<thead>";
//if data exist in table
if (mysqli_num_rows($results) > 0) {
    //output data of each row 
    while ($row = mysqli_fetch_assoc($results)) {
        /* while results has row of data. output first name, last name
          date, total amount and a link */

        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row["book_title"] . "</td>";
        echo "<td>" . $row["author_fname"] . " " . $row["author_lname"] . "</td>";
        echo "<td>" . $row["genre"] . "</td>";
        echo "<td>" . $row["year_ofpub"] . "</td>";
        echo "<td>" . $row["isbn"] . "</td>";
        echo "<td>" . $row["language"] . "</td>";
        echo "<td>" . $row["cost"] . "</td>";
        echo "<td><a href='editbookAdmin.php?editId=".$row['book_id']."'>Edit</a> &nbsp<a href='deleteAdvanceSearchBook.php?id=".$row['book_id']."'>Delete</a></td>";
        echo "</tr>";
        echo "</tbody>";
    }
}
}
 if (isset($_POST['DonorSearchAdmin'])){
     $keyword = filter_input(INPUT_POST, 'DonorKeywordToSearchAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
     $keywordInput=urldecode($keyword);
     $_SESSION["donor"] = $keywordInput;
    // check the input is empty or not. If not then pop up an alert message
    if (empty($keywordInput)) {
        echo "<script>alert('Please fill out the input field to generate a report');
            window.location.href='searchAdmin.php';
                   </script>";
    }
    //query to execute
    $getData = "SELECT donor_id,donor_fname,donor_lname,donate_dd,total_amt"
            . " FROM donors WHERE donor_fname LIKE CONCAT('%', '$keywordInput', '%') "
            . "OR donor_lname LIKE CONCAT('%', '$keywordInput', '%')  OR donate_dd LIKE CONCAT('%', '$keywordInput', '%') OR total_amt LIKE CONCAT('%', '$keywordInput', '%')";
           
    $results = mysqli_query($DataBaseCon, $getData); //Grab results from database using connection and query
    
    echo "<thead>";
echo "<tr>";
echo "<th>Donor Name </th>";
echo "<th>Donate dd </th>";
echo "<th>Total amount</th>";
echo "</tr>";
echo "/<thead>";
//if data exist in table
if (mysqli_num_rows($results) > 0) {
    //output data of each row 
    while ($row = mysqli_fetch_assoc($results)) {
        /* while results has row of data. output first name, last name
          date, total amount and a link */

        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row["donor_fname"] . " " . $row["donor_lname"] . "</td>";
        echo "<td>" . $row["donate_dd"] . "</td>";
        echo "<td>" . $row["total_amt"] . "</td>";
        echo "<td><a href='editdonorAdmin.php?editId=".$row['donor_id']."'>Edit</a> &nbsp<a href='deleteKeywordSearchDonor.php?donorId=".$row['donor_id']."'>Delete</a></td>";
        echo "</tr>";
        echo "</tbody>";
    }
}
}
if (isset($_POST['DonorAdvancedSearchAdmin'])){
            //store all the input text field of the form
        $donorFname = filter_input(INPUT_POST, 'donorFirstNameAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
         $donorFnameInput=urldecode($donorFname);
          $_SESSION["donorFname"] = $donorFnameInput;
        $donorLname = filter_input(INPUT_POST, 'donorLastNameAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
         $donorLnameInput=urldecode($donorLname);
          $_SESSION["donorLname"] = $donorLnameInput;
        $donateDDInput = filter_input(INPUT_POST, 'donateDDAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
         $_SESSION["donorDate"] = $donateDDInput;
        $totalAmountInput = filter_input(INPUT_POST, 'totalAmountAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $amountInput = null;
        if (strpos($totalAmountInput, '$') !== false) {
            $amountInput = $totalAmountInput;
        } else {

            $amountInput = "$" . $totalAmountInput;
        }
         $_SESSION["donorAmount"] = $amountInput;
        //Check all fields are empty or not
        if (empty($donorFnameInput) && empty($donorLnameInput) && empty($donateDDInput) && empty($amountInput)) {
            //    if (empty($titleInput)&& empty($fNameInput)&& empty($lNameInput)&& empty($yearInput)&& empty($isbnInput)&& empty($languageInput)&& empty($cost)) {
            echo "<script>alert('At least one input field is filled to generate a report');
            window.location.href='donarsearchadvanceAdmin.php';
                   </script>";
        }
        //query to execute
        $getData = "SELECT donor_id,donor_fname,donor_lname,donate_dd,total_amt"
                . " FROM donors WHERE (donor_fname = '$donorFnameInput' or donor_lname='$donorLnameInput' or "
                . "donate_dd = '$donateDDInput' or total_amt='$amountInput')";

        $results = mysqli_query($DataBaseCon, $getData);
    
    echo "<thead>";
echo "<tr>";
echo "<th>Donor Name </th>";
echo "<th>Start Year </th>";
echo "<th>Total amount</th>";
echo "</tr>";
echo "/<thead>";
//if data exist in table
if (mysqli_num_rows($results) > 0) {
    //output data of each row 
    while ($row = mysqli_fetch_assoc($results)) {
        /* while results has row of data. output first name, last name
          date, total amount and a link */

        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row["donor_fname"] . " " . $row["donor_lname"] . "</td>";
        echo "<td>" . $row["donate_dd"] . "</td>";
        echo "<td>" . $row["total_amt"] . "</td>";
        echo "<td><a href='editdonorAdmin.php?editId=".$row['donor_id']."'>Edit</a> &nbsp<a href='deleteAdvanceSearchDonor.php?donorId=".$row['donor_id']."'>Delete</a></td>";
        echo "</tr>";
        echo "</tbody>";
    }
}
}


 if (isset($_POST['ProgramSearchAdmin'])){
     $keyword = filter_input(INPUT_POST, 'ProgramKeywordToSearchAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
      $keywordInput=urldecode($keyword);
      $_SESSION["program"] = $keywordInput;
    // check the input is empty or not. If not then pop up an alert message
    if (empty($keywordInput)) {
        echo "<script>alert('Please fill out the input field to generate a report');
            window.location.href='searchAdmin.php';
                   </script>";
    }
    //query to execute
    $getData = "SELECT program_id,program,yr_start,mission"
            . " FROM program WHERE program LIKE CONCAT('%', '$keywordInput', '%') "
            . "OR yr_start LIKE CONCAT('%', '$keywordInput', '%')  OR mission LIKE CONCAT('%', '$keywordInput', '%')";
           
    $results = mysqli_query($DataBaseCon, $getData); //Grab results from database using connection and query
    
    echo "<thead>";
echo "<tr>";
echo "<th>Program </th>";
echo "<th>Start Year </th>";
echo "<th>Mission</th>";
echo "</tr>";
echo "/<thead>";
//if data exist in table
if (mysqli_num_rows($results) > 0) {
    //output data of each row 
    while ($row = mysqli_fetch_assoc($results)) {
        /* while results has row of data. output first name, last name
          date, total amount and a link */

        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row["program"] . "</td>";
        echo "<td>" . $row["yr_start"] . "</td>";
        echo "<td>" . $row["mission"] . "</td>";
        echo "<td><a href='editprogramAdmin.php?editId=".$row['program_id']."'>Edit</a> &nbsp<a href='deleteKeywordSearchProgram.php?programId=".$row['program_id']."'>Delete</a></td>";
        echo "</tr>";
        echo "</tbody>";
    }
}
}
if (isset($_POST['ProgramAdvancedSearchAdmin'])){
            //store all the input text field of the form
        $program = filter_input(INPUT_POST, 'programAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $programInput=urldecode($program);
         $_SESSION["programName"] = $programInput;
        $startDateInput = filter_input(INPUT_POST, 'startDateAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
         $_SESSION["programDate"] = $startDateInput;
        $mission = filter_input(INPUT_POST, 'missionAdmin',FILTER_SANITIZE_SPECIAL_CHARS);
        $missionInput=urldecode($mission);
         $_SESSION["programMission"] = $missionInput;
       
        //Check all fields are empty or not
        if (empty($programInput) && empty($startDateInput) && empty($missionInput)) {
            //    if (empty($titleInput)&& empty($fNameInput)&& empty($lNameInput)&& empty($yearInput)&& empty($isbnInput)&& empty($languageInput)&& empty($cost)) {
            echo "<script>alert('At least one input field is filled to generate a report');
            window.location.href='programsearchadvanceAdmin.php';
                   </script>";
        }
        //query to execute
        $getData = "SELECT program_id,program,yr_start,mission"
                . " FROM program WHERE (program = '$programInput' or yr_start='$startDateInput' or "
                . "mission = '$missionInput')";

        $results = mysqli_query($DataBaseCon, $getData);
    
    echo "<thead>";
echo "<tr>";
echo "<th>Program </th>";
echo "<th>Start Date </th>";
echo "<th>Mission</th>";
echo "</tr>";
echo "/<thead>";
//if data exist in table
if (mysqli_num_rows($results) > 0) {
    //output data of each row 
    while ($row = mysqli_fetch_assoc($results)) {
        /* while results has row of data. output first name, last name
          date, total amount and a link */

        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row["program"] . "</td>";
        echo "<td>" . $row["yr_start"] . "</td>";
        echo "<td>" . $row["mission"] . "</td>";
        echo "<td><a href='editprogramAdmin.php?editId=".$row['program_id']."'>Edit</a> &nbsp<a href='deleteAdvanceSearchProgram.php?programId=".$row['program_id']."'>Delete</a></td>";
        echo "</tr>";
        echo "</tbody>";
    }
}
}

?>
                            
                            
                            
                        </table>
                    </div></div>
            </div>
        </div>


    <!-- end of body -->

    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</html>