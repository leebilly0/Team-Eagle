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
    <link href="../style.css" rel="stylesheet">
      <link href="../admin/StyleSheet/AdminStyleSheet.css" rel="stylesheet">

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
          <a class="navbar-brand" href="../index.php"><img class="header-logo" alt="Vunnava Dot Com Library Logo" src="../images/logo.png"></a>
          <ul class="nav navbar-nav">
                <li><a href="books.php">Books</a></li>
                <li><a href="donors.php">Donors</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="user/about.php">About</a></li>
            </ul>
        </div>
    </nav>	
<!--***Add below-->
	<?php
	require ("userHeader.php");
	?>
	<!--***Done add above-->
    <!-- END OF NAVBAR -->

    <!-- Start your coding below here -->
 <div class="container">

        <!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header heading">We are small team with big ideas!
                </h1>
                <p class="paragraph">We are a collaborative and passionate team of 4 creative students of Metropolitan State University. Our library is being run through the help of donations.It is 100% funded through donations from the community. We have books in three languages – English, Telugu and Hindi.People donate money to buy the books to the library or donate books directly to the library and 100% of donated money is used to buy books as gift to be given to students </p>
            </div>
        </div>

        <!-- Team Members Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Meet Our Team</h2>
            </div>
            <div class="col-lg-3 text-center">
                <img class="img-circle img-responsive img-center" src="../images/Billy.PNG" alt="">
                <h3>Billy Lee </h3>
                <h4> <small>Student</small></h4>
                <a href="https://www.linkedin.com/in/billylee1?authType=name&authToken=RnON&trk=prof-sb-browse_map-name">Contact Info</a>
            </div>
            <div class="col-lg-3 text-center">
                <img class="img-circle img-responsive img-center" src="../images/Linh.jpg"  alt="">
                <h3>Linh Huynh
                    <h4> <small>Student</small></h4>
                </h3>
                <a href="https://www.linkedin.com/in/linh-huynh-757139105">Contact Info</a>
            </div>
            <div class="col-lg-3 text-center">
                <img class="img-circle img-responsive img-center" src="../images/Poleap.jpg" alt="">
                <h3>Poleap Sar
                    <h4> <small>Student</small></h4>
                </h3>
               <a href="https://www.linkedin.com/in/poleap-sar-1b717750?trk=nav_responsive_tab_profile">Contact Info</a>
            </div>
            <div class="col-lg-3 text-center">
                <img class="img-circle img-responsive img-center" src="../images/Jean.PNG" width="304" height="236" alt="">
                <h3>Jean Vang
                    <h4> <small>Student</small></h4>
                </h3>
               <a href="https://www.linkedin.com/in/jean-vang-a133b23b">Contact Info</a>
            </div>
          
         
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Version 1 (April 2016) – Vunnava Dot Com Village Library Developed by Billy Lee, Linh Huynh, Jean Vang and Poleap Sar. Please contact Siva.Jasthi@metrostate.edu for any questions. @ Dr. Siva R Jasthi</p>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

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