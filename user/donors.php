<!DOCTYPE html>
<?php
  require ("../configurationDatabase.php");
  session_start();
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
    <link href="donorStyle.css" rel="stylesheet">

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


  <!--END OF THE LOG IN PROCESS-->

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
          <a class="navbar-brand" href="../index.php"><img class="header-logo" alt="Vunnava Dot Com Library Logo" src="../images/logo.png"></a>
          <ul class="nav navbar-nav">
                <li><a href="books.php">Books</a></li>
                <li><a href="donors.php">Donors</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
      </nav>


<?php
    /*There are two parts to connection to the database and querying results, THIS IS STEP 1
    SEE LINE 133 for further step*/
    global $DataBaseCon; //grabs connection to MYSQL database
    //My Query I will be Using
    $getData = "SELECT donor_fname, donor_lname, donate_dd, total_amt FROM donors ORDER BY donor_fname"; 
    $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
?>

    <!-- Start your coding below here -->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
          <h1>Donors</h1> 
          <p>Here is the list of donors who have donated books and/or monetary value to Vunnava Dot Com Library over the years</p>

           <!--HEADLINER of PIX of donors and little info about them -->
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/billy.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Billy Lee</h4>
              <span class="text-muted">Insert Text</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/notAvailable.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>John Doe</h4>
              <span class="text-muted">Insert Text</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/notAvailable.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Jane Doe</h4>
              <span class="text-muted">Insert Text</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/notAvailable.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Poleap Sar</h4>
              <span class="text-muted">Insert Text</span>
            </div>
          </div>
          <!--ENd of headliner for donors -->

           <!-- Table with Data -->
          <h2 class="sub-header">Vunnava Dot Com Library Contributors</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <!--Headers for data table-->
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Donated Date</th>
                  <th>Total Amount Donated</th>
                  <th>Books Donated</th>
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
                      echo "<tr>";
                      echo "<td>".$row["donor_fname"]." ".$row["donor_lname"]."</td>";
                      echo "<td>".$row["donate_dd"]."</td>";
                      echo "<td>".$row["total_amt"]."</td>";
                      echo "<td><a href='viewbooksdonor.php?first_name=".$row["donor_fname"]."&last_name=".$row["donor_lname"]."'>View Books Donated</a></td>";
                      echo "</tr>";
                    }
                  }
                ?>  
              </tbody>
            </table>
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