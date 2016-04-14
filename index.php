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

    <title>Vunnava Dot Com Library</title>

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

		<!--Add check loginID and password to make check with database-->
	<?php

			//Go to the login_functions.php to check with database
			require ("login_functions.php");
			
	
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
          <a class="navbar-brand" href="index.php"><img class="header-logo" alt="Vunnava Dot Com Library Logo" src="images/logo.png"></a>
          <ul class="nav navbar-nav">
                <li><a href="user/books.php">Books</a></li>
                <li><a href="user/donors.php">Donors</a></li>
                <li><a href="user/programs.php">Programs</a></li>
                <li><a href="user/search.php">Search</a></li>
                <li><a href="user/about.php">About</a></li>
            </ul>
        </div>
    </nav>
    <!-- END OF NAVBAR -->
	
<?php
    /*There are two parts to connection to the database and querying results, THIS IS STEP 1
    SEE LINE 133 for further step*/
    global $DataBaseCon; //grabs connection to MYSQL database
?>
	
    <!-- Main jumbotron for a primary marketing message -->
    <div class="jumbotron">
      <div class="container">
        <div class="mainpage">
          <h1>Vunnava Dot Com Library</h1>
          <p>Donated By The Community For The Community</p>
          <!-- Starting text inside Banner -->
          <div class="mainpagetextlarge">
            <!-- Total Books DOnated -->
            <span class="mainPageBannerNumber">
              <?php
                //My Query I will be Using
                $getData = "SELECT count(book_id) AS totalBooks FROM books"; 
                $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
                
                //output total count of books in database
                $row = mysqli_fetch_assoc($results);
                echo $row['totalBooks'];
              ?>
            </span>
            <span class="mainPageBannerText">
              BOOKS DONATED<br/>
            </span>
            <!-- Worth of Books in Database -->
            <span class="mainPageBannerNumber">
              <?php
                //My Query I will be Using
                $getData = "SELECT FORMAT(sum(cost),2) AS totalBookCost FROM books"; 
                $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
                
                //output sum of book worth in database
                $row = mysqli_fetch_assoc($results);
                echo "&#36;" .$row['totalBookCost'];
              ?>
            </span>
            <span class="mainPageBannerText">
              WORTH OF BOOKS<br/>
            </span>
            <!-- Total Amount of money donated in Database -->
            <span class="mainPageBannerNumber">
              <?php
                //My Query I will be Using
                $getData = "SELECT FORMAT(sum(total_amt),0) AS totalDonated FROM donors"; 
                $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
                
                //output sum of donated money in database
                $row = mysqli_fetch_assoc($results);
                echo "&#36;" .$row['totalDonated'];
              ?>
            </span>
            <span class="mainPageBannerText">
              IN DONATION FOR BOOKS<br/>
            </span>
            <!-- Programs funded by donors -->
            <span class="mainPageBannerNumber">
              <?php
                //My Query I will be Using
                $getData = "SELECT count(program_id) AS totalPrograms FROM program";
                $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
                
                //output total count of books in database
                $row = mysqli_fetch_assoc($results);
                echo $row['totalPrograms'];
              ?>
            </span>
            <span class="mainPageBannerText">
              PROGRAMS FUNDED BY DONORS<br/>
            </span>
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
          <h2>What Is Vunnava Dot Com Library?</h2>
          <p>Founded in 2016, Vunnava Dot Com Library is a books donation website for the community.  
          Simply put, we exist to help those who need books, get books!</p>
        </div>
        <div class="col-md-4">
          <h2>How Can I Help?</h2>
          <p>Have used books you don't read anymore? Donte them here! We Accept books in English, Hindu and Tengu. 
            What if I don't have used books to donate, is there any other way I can help? We also accept 
            monetary donations as well. 100% of the donated proceeds will be used to purchase new and used books.</p>
          <p><a class="btn btn-primary" href="user/books.php" role="button">Check out our books &raquo;</a>
            <a class="btn btn-primary" href="user/donors.php" role="button">Check out our donors &raquo;</a></p>
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
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>