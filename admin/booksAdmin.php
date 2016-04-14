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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

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
              <FONT COLOR="Black">Welcome Back<?php echo " {$_SESSION['user_name']}";?>&#33;</FONT>
            <button type="submit" class="btn btn-primary" name="log_out">Log off</button>
			
          </form>
        </div>
      </div>
    </nav>
    <!-- END OF NAVBAR -->
  <!-- Start your coding below here -->
     <?php
    /*There are two parts to connection to the database and querying results, THIS IS STEP 1
    SEE LINE 133 for further step*/
    global $DataBaseCon; //grabs connection to MYSQL database
    //My Query I will be Using
    $getData = "SELECT book_id ,book_title,author_fname,author_lname,genre,year_ofpub,isbn,language,cost FROM books ORDER BY book_title"; 
    $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
?>
  
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main row-padding">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4 class="sub-header text-center">Here is the list of available books in Vunnava Dot Com Library: </h4></div>
                <div class="panel-body">    <div class="table-responsive">
                        <table class="table table-striped">
    
           <!-- Table with Data -->
          
           
              <!--Headers for data table-->
              <thead>
                <tr>
                  <th>Book Title<</th>
                  <th>Author Name</th>
                  <th>Genre</th>
                  <th>Year of Publish</th>
                   <th>ISBN</th>
                  <th>Language</th>
                  <th>Cost</th>
                </tr>
              </thead>
              <!--Data for Table -->
              <tbody>
                <?php
                  /*THIS IS STEP 2 in QUERYING FROM DATABASE SEE LINE 79 FOR STEP 1*/
                 
                  //if data exist in table
                  if (mysqli_num_rows($results) > 0)
                  {
                    //output data of each row 
                    while ($row = mysqli_fetch_assoc($results))
                    {
                      /*while results has row of data. output first name, last name
                      date, total amount and a link*/
                      echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row["book_title"] . "</td>";
        echo "<td>" . $row["author_fname"] . " " . $row["author_lname"] . "</td>";
        echo "<td>" . $row["genre"] . "</td>";
        echo "<td>" . $row["year_ofpub"] . "</td>";
        echo "<td>" . $row["isbn"] . "</td>";
        echo "<td>" . $row["language"] . "</td>";
        echo "<td>" . $row["cost"] . "</td>";
         echo "<td><a href='.php'>Edit</a> &nbsp<a href='DeleteBookAdmin.php?id=".$row['book_id']."'>Delete</a></td>";
      
        echo "</tr>";
        
        echo "</tbody>";
                    }
                  }
                ?>  
              </tbody>
        

       
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
  </body>
</html>