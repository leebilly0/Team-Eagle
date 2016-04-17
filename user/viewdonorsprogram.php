<!DOCTYPE html>
<!--Billy code-->
<?php
 // require ("../configurationDatabase.php");
 // session_start();
?>
<!--done Billy code-->

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

	<!--***Add Below -->
	<link href="StyleSheet/userStyleSheet.css" rel="stylesheet">
	<!--***Done add above-->
    
	
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Donorstyle.css" rel="stylesheet">

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
                <li><a href="about.php">About</a></li>
            </ul>
        </div>

    </nav>
    <!-- END OF NAVBAR -->

 <!-- Start your coding below here -->
  <!--***Add below-->
	<h3>View Donor for " <?php $program_name = $_POST['program_name'];
          echo $program_name; ?> "</h3>
	<br />
	<!--Table of program to display-->
	<table class = "tdBookAdmin" style="width: 100%" >
		<tr>
			<th class = "tdBookAdmin">ID</th>
			<th class = "tdBookAdmin">First Name</th>
			<th class = "tdBookAdmin">Last Name</th>
			<th class = "tdBookAdmin">Total Amount</th>

		</tr>
		
		<!--***Add below-->
			<?php
			//****Called connecDatabase.php to do connection 
			require("../configurationDatabase.php");
			
			$program_id = $_POST['program_id'];
			
			//Get all donor id that donate to that program 1,2
			$getDornorID = $getDatabase = 'SELECT donor_id from books WHERE program_id="'.$program_id.'"';
			if(!$result1 = mysqli_query($DataBaseCon, $getDornorID)){
				echo "Could not successfully run query";
				exit();
			}
			//If there no match result found
			if(mysqli_num_rows($result1) == 0){
				echo "No result found !";
				exit();
			}
			
			while($rowDonorID = mysqli_fetch_assoc($result1)){
				$donor_id = $rowDonorID['donor_id'];

			//Get name from database with each donor id
			$getDatabase = 'SELECT donor_id, donor_fname, donor_lname, total_amt FROM donors WHERE donor_id ="'.$donor_id.'"';
			//Run query
			if(!$result = mysqli_query($DataBaseCon, $getDatabase)){
				echo "Could not successfully run query";
				exit();
			}
			//If there no match result found
			if(mysqli_num_rows($result) == 0){
				echo "No result found !";
				exit();
			}
		
			while($row = mysqli_fetch_assoc($result)){
				$donor_id = $row["donor_id"];
				$donor_fname = $row["donor_fname"];
				$donor_lname = $row["donor_lname"];
				//$author = $author_fname.$author_lname;
				$total_amt = $row["total_amt"];

				
				echo "<tr>";
				echo "<td class = 'tdBookAdmin'>".$donor_id."</td>";
				echo "<td class = 'tdBookAdmin'>".$donor_fname."</td>";
				echo "<td class = 'tdBookAdmin'>".$donor_lname."</td>";
				echo "<td class = 'tdBookAdmin'>".$total_amt."</td>";
				echo "</tr>";

			}//End of while loop
			
			}//End of get donor id  loop

			?>

	</table>
<!--***Done add above-->




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