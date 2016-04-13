<!DOCTYPE html>
<?php
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="loginStyle.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

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
    require ("login_functions.php");
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
        $url = absolute_url ('indexAdmin.php'); // passing value of url as "loggedin.php"
        header("Location: $url");
   
        exit();
      } 
  
      else { // Unsuccessful!
        $errors = $returnName; //here set the errors = data = password
        //called the absolute_url function from login_function.php
        $url = absolute_url ('index.php'); // passing value of url as "loggedin.php"
        header("Location: $url");
      }
    } // End of the main submit conditional.
  ?>

  <!--END OF THE LOG IN PROCESS-->
  
	
          <center> <form class="navbar-form" action="indexAdmin.php" method="POST">
       <div class="form-group">
              <img src="images/logo.png" alt="Vunnava Dot Com Library">;<br>
              <FONT COLOR="Black" size="5">Admin Login</FONT><br><br>
              <input type="text" placeholder="Username" class="form-control" name="loginID"><br><br>
              <input type="password" placeholder="Password" class="form-control" name="password"><br><br>
              <input type="hidden" name="submitted" value="TRUE" />
              <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
        </form>
      <!-- End Bottom of Page -->
      
      <hr>

      <footer>
        <p>&copy; 2016 Billy Lee, Jean Vang, Linh Huynh &amp; Porleap Sar</p>
      </footer>
    </div> <!-- /container -->


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