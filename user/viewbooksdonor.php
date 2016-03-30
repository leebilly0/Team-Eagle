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

    <title>Village Library</title>

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

    <!--Add check loginID and password to make check with database-->
  <?php
    //Go to the login_functions.php to check with database
    require ("../login_functions.php");
    //isset() fucntion is to check the variable is set or not set.
    if (isset($_POST['submitted'])) {
   
      //$loginID = trim($_POST['loginID'], "{[/\"'()]}");
      //$password = trim($_POST['password'], "{[/\"'()]}");
   
      //**Set check = loginID and data = password
      //call check_login() function from login_fucntion.php to check for true/false
      list ($check, $returnName) = check_login($_POST['loginID'], $_POST['password']);
      //list ($check, $returnName) = check_login($loginID, $password);

      if ($check) { // OK!
       
        //set the session of cookie by put user_id = loginID  
        $_SESSION['user_name'] = $returnName;
        $_SESSION['user_type'] = "admin";
   
        //called the absolute_url function from login_function.php
        $url = absolute_url ('../indexAdmin.php'); // passing value of url as "loggedin.php"
        header("Location: $url");
   
        exit();
      } 
  
      else { // Unsuccessful!
        $errors = $returnName; //here set the errors = data = password
        //called the absolute_url function from login_function.php
        $url = absolute_url ('../index.php'); // passing value of url as "loggedin.php"
        header("Location: $url");
      }
    } // End of the main submit conditional.
  ?>

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
          <a class="navbar-brand" href="../index.php">Team Eagle</a>
          <ul class="nav navbar-nav">
                <li><a href="books.php">Books</a></li>
                <li><a href="donors.php">Donors</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a href="search.php">Search</a></li>
            </ul>
        </div>

        <!-- Start of username password form of right nav bar -->
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
       <div class="form-group">
              <FONT COLOR="Black">Admin Login</FONT>
            </div>
            <div class="form-group">
              <input type="text" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </form>
        </div>
      </div>
    </nav>
    <!-- END OF NAVBAR -->

    <!-- Start your coding below here -->
    <?php
    $first = $_GET['first_name'];
    $last = $_GET['last_name'];

    global $DataBaseCon; //grabs connection to MYSQL database
    //My Query I will be Using
    $getData = "SELECT book_title, author_fname, author_lname, genre, year_ofpub, language, cost FROM books NATURAL JOIN donors WHERE donor_fname='".$first."' AND donor_lname='".$last."'"; 
    $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
    ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
          <br/>
          <br/>

           <!-- Table with Data -->
          <h2 class="sub-header">Books Donated By <?php 
          echo $first ;
          echo " ";
          echo $last; ?></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <!--Headers for data table-->
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Genre</th>
                  <th>Year of Publication</th>
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
                      echo "<tr>";
                      echo "<td>".$row["book_title"]."</td>";
                      echo "<td>".$row["author_fname"]." ".$row["author_lname"]."</td>";
                      echo "<td>".$row["genre"]."</td>";
                      echo "<td>".$row["year_ofpub"]."</td>";
                      echo "<td>".$row["language"]."</td>";
                      echo "<td>".$row["cost"]."</td>";
                      echo "</tr>";
                    }
                  }
                ?>  
              </tbody>
            </table>
            <br/>
             <!-- Back Button -->
            <center><a class="btn btn-primary" href="donors.php" role="button">Back To Donors</a></center>
          </div>
        </div>



  </body>
<!-- end of body -->

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>