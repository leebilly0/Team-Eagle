<!DOCTYPE html>
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
    <link href="style.css" rel="stylesheet">

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
          <a class="navbar-brand" href="index.php">Team Eagle</a>
          <ul class="nav navbar-nav">
                <li><a href="admin/booksAdmin.php">Books</a></li>
                <li><a href="admin/donorsAdmin.php">Donors</a></li>
                <li><a href="admin/programsAdmin.php">Programs</a></li>
                <li><a href="admin/searchAdmin.php">Search</a></li>
            </ul>
        </div>

        <!-- Start of username password form of right nav bar -->
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="index.php">
		   <div class="form-group">
              <FONT COLOR="Black">Welcome Back</FONT>
            <button type="submit" class="btn btn-primary">Log off</button>
          </form>
        </div>
      </div>
    </nav>
    <!-- END OF NAVBAR -->

    <!-- Main jumbotron for a primary marketing message -->
    <div class="jumbotron">
      <div class="container">
        <div class="mainpage">
          <h1>Village Library</h1>
          <p>Donated By The Community For The Community</p>
          <div class="mainpagetextlarge">
            <p>7,234</p>
            <div class="mainpagetextsmall">
              Books Donated
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End of jumbotron -->

    <!-- Begin Bottom of Page -->
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>What Is Village Library?</h2>
          <p>Founded in 2016, Village Library is a books donation website for the community.  
          Simply put, we exist to help those who need books, get books!</p>
        </div>
        <div class="col-md-4">
          <h2>How Can I Help?</h2>
          <p>Have used books you don't read anymore? Donte them here! We Accept books in English, Hindu and Tengu. 
            What if I don't have used books to donate, is there any other way I can help? We also accept 
            monetary donations as well. 100% of the donated proceeds will be used to purchase new and used books.</p>
          <p><a class="btn btn-primary" href="admin/booksAdmin.php" role="button">Check out our books &raquo;</a>
            <a class="btn btn-primary" href="admin/donorsAdmin.php" role="button">Check out our donors &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Even More Benefits!</h2>
          <p>Want to donate on behalf of a program, company, loved one or special occasion? You can do it here. Want to see 
            if a book has already donated? No problem. We are constantly working to not only improve Village 
            Library's functionality, but also its user experience.</p>
        </div>
      </div>
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
