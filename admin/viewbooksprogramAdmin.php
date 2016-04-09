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
          <a class="navbar-brand" href="../indexAdmin.php">Team Eagle</a>
          <ul class="nav navbar-nav">
                <li><a href="booksAdmin.php">Books</a></li>
                <li><a href="donorsAdmin.php">Donors</a></li>
                <li><a href="programsAdmin.php">Programs</a></li>
                <li><a href="searchAdmin.php">Search</a></li>
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
      //Make print of each rows of program
      $program_name = $_GET['program_name'];
      /*Make database connection called DataBaseCon */
      //$DataBaseCon = mysqli_connect("localhost", "my_user", "my_password", "my_database_name");
      global $DataBaseCon; //grabs connection to MYSQL database
      
      $getDatabase = "SELECT book_title, author_fname, author_lname, genre, year_ofpub,book_id, LANGUAGE FROM books natural join program where program='".$program_name."';";
      //Run query
      if(!$result = mysqli_query($DataBaseCon, $getDatabase)){
        echo "Could not successfully run query";
        exit();
      }
      //If there no match result found
      

      ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">

      <h1>Books for <?php 
          echo $program_name; ?>
      </h1> 
      <p>Here is the list of books donors have donated to <?php 
          echo $program_name; ?></p>

          <div class="table-responsive">
            <table class="table table-striped">
              <!--Headers for data table-->
              <thead>
                <tr>
                  <th class = "tdBookAdmin">Title</th>
          <th class = "tdBookAdmin">Author</th>
          <th class = "tdBookAdmin">Genre</th>
          <th class = "tdBookAdmin">Year of Publication</th>
          <th class = "tdBookAdmin">ISBN</th>
          <th class = "tdBookAdmin">Language</th>
                </tr>
              </thead>
              <!--Data for Table -->
              <tbody>
    
    
      <?php 

      if(mysqli_num_rows($result) == 0){
        echo "<i>";
        echo "There are no Books donated to this program yet";
        echo "</i>";
      }

      while($row = mysqli_fetch_assoc($result)){
        $title = $row["book_title"];
        $author_fname = $row["author_fname"];
        $author_lname = $row["author_lname"];
        $author = $author_fname. " ". $author_lname;
        $genre = $row["genre"];
        $year_pub = $row["year_ofpub"];
        $ISBN = $row["book_id"];
        $language = $row["LANGUAGE"];
        
        echo "<tr>";
        echo "<td class = 'tdBookAdmin'>".$title."</td>";
        echo "<td class = 'tdBookAdmin'>".$author."</td>";
        echo "<td class = 'tdBookAdmin'>".$genre."</td>";
        echo "<td class = 'tdBookAdmin'>".$year_pub."</td>";
        echo "<td class = 'tdBookAdmin'>".$ISBN."</td>";
        echo "<td class = 'tdBookAdmin'>".$language."</td>";
        echo "</tr>";

      }//End of while loop

      ?>
      </tbody>
            </table>
            <br/>
             <!-- Back Button -->
            <center><a class="btn btn-primary" href="programsAdmin.php" role="button">Back To Donors</a></center>




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