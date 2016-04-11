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

  <div class="container center_div row-padding">

            <div class="panel panel-primary ">
                <div class="panel-heading"> <h4>Donor Search</h4></div>
                <div class="panel-body">
                    <p>Fill in at least on field. To define your search, fill in more fields</p>
                    <form action ="searchresults.php" method="POST" class="form-horizontal" >

                        <div class="form-group">
                            <label class="control-label col-sm-2" >Donor First Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="donorFirstName" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Donor Last Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="donorLastName" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Donate dd:</label>
                            <div class="col-sm-10"> 
                                <input type="number" name ="donateDD" class="form-control"  >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Total Amount:</label>
                            <div class="col-sm-10"> 
                                <input type="number" step="any" name ="totalAmount" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group "> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button name="reset" type="reset" class="btn btn-default ">Clear</button>
                                <button type="submit" name ="DonorAdvancedSearch" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form> </div>
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