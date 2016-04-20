<!DOCTYPE html>
<?php
  require ("../configurationDatabase.php");
  require ("userHeader.php");
?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main row-padding">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4 class="sub-header text-center">Search Results: </h4></div>
                <div class="panel-body">    <div class="table-responsive">
                        <table class="table table-striped">
<?php
global $DataBaseCon; //grabs connection to MYSQL database

if (isset($_POST['search'])) {
    $keyword = filter_input(INPUT_POST, 'keywordToSearch',FILTER_SANITIZE_SPECIAL_CHARS);
    $keywordInput = urldecode($keyword);
    // check the input is empty or not. If not then pop up an alert message
    if (empty($keywordInput)) {
        echo "<script>alert('Please fill out the input field to generate a report');
            window.location.href='search.php';
                   </script>";
    }
    //query to execute
    $getData = "SELECT book_title,author_fname,author_lname,genre,year_ofpub,isbn,language,cost"
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
echo "</thead>";
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
        //echo "<td><a href='/Admin/deleteBook.php?isbnAdmin= . isbn . '>Delete</a></td>";
        echo "</tr>";
        
        echo "</tbody>";
    }
}
}
if (isset($_POST['advancedSearch'])){
            //store all the input text field of the form
        $title = filter_input(INPUT_POST, 'title',FILTER_SANITIZE_SPECIAL_CHARS);
        $titleInput = urldecode($title);
        $fName = filter_input(INPUT_POST, 'authorFName',FILTER_SANITIZE_SPECIAL_CHARS);
        $fNameInput = urldecode($fName);
        $lName= filter_input(INPUT_POST, 'authorLName',FILTER_SANITIZE_SPECIAL_CHARS);
        $lNameInput = urldecode($lName);
        $genreInput = filter_input(INPUT_POST, 'genre');
        $yearInput = filter_input(INPUT_POST, 'yearOfPub',FILTER_SANITIZE_SPECIAL_CHARS);
        $isbnInput = filter_input(INPUT_POST, 'isbn',FILTER_SANITIZE_SPECIAL_CHARS);
        $languageInput = filter_input(INPUT_POST, 'language');
        $cost = filter_input(INPUT_POST, 'cost',FILTER_SANITIZE_SPECIAL_CHARS);
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
        $getData = "SELECT book_title,author_fname,author_lname,genre,year_ofpub,isbn,language,cost"
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
        echo "</tr>";
        
        echo "</tbody>";
    }
}
}
 if (isset($_POST['DonorSearch'])){
     $keyword = filter_input(INPUT_POST, 'DonorKeywordToSearch',FILTER_SANITIZE_SPECIAL_CHARS);
     $keywordInput = urldecode($keyword);
    // check the input is empty or not. If not then pop up an alert message
    if (empty($keywordInput)) {
        echo "<script>alert('Please fill out the input field to generate a report');
            window.location.href='search.php';
                   </script>";
    }
    //query to execute
    $getData = "SELECT donor_fname,donor_lname,donate_dd,total_amt"
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
        echo "</tr>";
        echo "</tbody>";
    }
}
}
if (isset($_POST['DonorAdvancedSearch'])){
            //store all the input text field of the form
        $donorFname = filter_input(INPUT_POST, 'donorFirstName',FILTER_SANITIZE_SPECIAL_CHARS);
        $donorFnameInput = urldecode($donorFname);
        $donorLname = filter_input(INPUT_POST, 'donorLastName',FILTER_SANITIZE_SPECIAL_CHARS);
        $donorLnameInput = urldecode($donorLname);
        $donateDDInput = filter_input(INPUT_POST, 'donateDD',FILTER_SANITIZE_SPECIAL_CHARS);
        $totalAmountInput = filter_input(INPUT_POST, 'totalAmount',FILTER_SANITIZE_SPECIAL_CHARS);
        $amountInput = null;
        if (strpos($totalAmountInput, '$') !== false) {
            $amountInput = $totalAmountInput;
        } else {

            $amountInput = "$" . $totalAmountInput;
        }
        //Check all fields are empty or not
        if (empty($donorFnameInput) && empty($donorLnameInput) && empty($donateDDInput) && empty($amountInput)) {
            //    if (empty($titleInput)&& empty($fNameInput)&& empty($lNameInput)&& empty($yearInput)&& empty($isbnInput)&& empty($languageInput)&& empty($cost)) {
            echo "<script>alert('At least one input field is filled to generate a report');
            window.location.href='donarsearchadvance.php';
                   </script>";
        }
        //query to execute
        $getData = "SELECT donor_fname,donor_lname,donate_dd,total_amt"
                . " FROM donors WHERE (donor_fname = '$donorFnameInput' or donor_lname='$donorLnameInput' or "
                . "donate_dd = '$donateDDInput' or total_amt='$amountInput')";

        $results = mysqli_query($DataBaseCon, $getData);
    
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
        echo "</tr>";
        echo "</tbody>";
    }
}
}


 if (isset($_POST['ProgramSearch'])){
     $keyword = filter_input(INPUT_POST, 'ProgramKeywordToSearch',FILTER_SANITIZE_SPECIAL_CHARS);
     $keywordInput = urldecode($keyword);
    // check the input is empty or not. If not then pop up an alert message
    if (empty($keywordInput)) {
        echo "<script>alert('Please fill out the input field to generate a report');
            window.location.href='search.php';
                   </script>";
    }
    //query to execute
    $getData = "SELECT program,yr_start,mission"
            . " FROM program WHERE program LIKE CONCAT('%', '$keywordInput', '%') "
            . "OR yr_start LIKE CONCAT('%', '$keywordInput', '%')  OR mission LIKE CONCAT('%', '$keywordInput', '%')";
           
    $results = mysqli_query($DataBaseCon, $getData); //Grab results from database using connection and query
    
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
        echo "</tr>";
        echo "</tbody>";
    }
}
}
if (isset($_POST['ProgramAdvancedSearch'])){
            //store all the input text field of the form
        $program = filter_input(INPUT_POST, 'program',FILTER_SANITIZE_SPECIAL_CHARS);
        $programInput = urldecode($program);
        $startDateInput = filter_input(INPUT_POST, 'startDate',FILTER_SANITIZE_SPECIAL_CHARS);
        $mission = filter_input(INPUT_POST, 'mission',FILTER_SANITIZE_SPECIAL_CHARS);
        $missionInput = urldecode($mission);
       
        //Check all fields are empty or not
        if (empty($programInput) && empty($startDateInput) && empty($missionInput)) {
            //    if (empty($titleInput)&& empty($fNameInput)&& empty($lNameInput)&& empty($yearInput)&& empty($isbnInput)&& empty($languageInput)&& empty($cost)) {
            echo "<script>alert('At least one input field is filled to generate a report');
            window.location.href='programsearchadvance.php';
                   </script>";
        }
        //query to execute
        $getData = "SELECT program,yr_start,mission"
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
    </body>
    <!-- end of body -->

    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>