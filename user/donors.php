<?php
  require ("../configurationDatabase.php");
?>
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
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
          <h1>Donors</h1>
          <p>Here is the list of donors who have donated books and/or monetary value to Village Library over the years</p>

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

          <h2 class="sub-header">Village Library Contributors</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Donated Date</th>
                  <th>Total Amount Donated</th>
                  <th>Books Donated</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Billy</td>
                  <td>Lee</td>
                  <td>2016</td>
                  <td>$1</td>
                  <td><a href="user/books.php">View Books Donated</a></td>
                </tr>
                <tr>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                  <td><a href="user/books.php">View Books Donated</a></td>
                </tr>
                <tr>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                  <td><a href="user/books.php">View Books Donated</a></td>
                </tr>
                <tr>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                  <td><a href="user/books.php">View Books Donated</a></td>
                </tr>
                <tr>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                  <td><a href="user/books.php">View Books Donated</a></td>
                </tr>
                <tr>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                  <td><a href="user/books.php">View Books Donated</a></td>
                </tr>
                <tr>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                  <td><a href="user/books.php">View Books Donated</a></td>
                </tr>
                <tr>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                  <td><a href="user/books.php">View Books Donated</a></td>
                </tr>
                <tr>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                  <td><a href="user/books.php">View Books Donated</a></td>
                </tr>
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
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>