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

	<!--***Add Below -->
	<link href="StyleSheet/userStyleSheet.css" rel="stylesheet">
	<!--***Done add above-->
	
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
	
	<!--***Add Below for program table from the database-->
    <!-- Start your coding below here -->
	<h1>Programs</h1>
	<br>
	<h3><a href = "addNewProgram.php" >Add New Program</a></h3>
	<!--Table of program to display-->
	<table class = "tdProgramsAdmin" style="width: 100%" >
		<tr>
			<th class = "tdProgramsAdmin">Program ID</th>
			<th class = "tdProgramsAdmin">Program Name</th>
			<th class = "tdProgramsAdmin">Year Started</th>
			<th class = "tdProgramsAdmin">Mission Statement/Reason For Program</th>
			<th class = "tdProgramsAdmin" colspan= "4">Edit</th>
		</tr>
		
			<!--***Add below-->
			<?php
			
			//****Called connecDatabase.php to do connection 
			require("../configurationDatabase.php");
		//	global $DataBaseCon; //grabs connection to MYSQL database
			$getDatabase = "SELECT program_id,program,yr_start,mission FROM program ";
			//Run query
			if(!$result = mysqli_query($DataBaseCon, $getDatabase)){
				echo "Could not successfully run query";
				exit();
			}
			//If there no match result found
			if(mysqli_num_rows($result) == 0){
				echo "No rows found !";
				exit();
			}
		
			while($row = mysqli_fetch_assoc($result)){
				$number = $row["program_id"];
				$program_name = $row["program"];
				$year = $row["yr_start"];
				$mission = $row["mission"];
				
				//Convert integer to string as program id session name
				//$progID = '"'.$number.'"';
				//$_SESSION[$progID] = $number;
				
				
				echo "<tr>";
				echo "<td class = 'tdProgramsAdmin'>".$number."</td>";
				echo "<td class = 'tdProgramsAdmin'>". $program_name."</td>";
				echo "<td class = 'tdProgramsAdmin'>".$year."</td>";
				echo "<td class = 'tdProgramsAdmin'>". $mission."</td>";
				
				echo "<td class = 'tdProgramsAdmin'>
						<form name='submit_program_ID' action='viewbooksprogram.php' method='POST'>
						<input type= 'hidden' name ='program_id' value ='".$number."'>
						<input type= 'hidden' name ='program_name' value ='".$program_name."'>
						<input type ='submit' name='submitProgramID' value = 'View Book' >
						</form>
					</td>";
				
				//echo "<td class = 'tdProgramsAdmin'><a href='viewbooksprogramAdmin.php'>View Books</a></td>";
				//echo "<td class = 'tdProgramsAdmin'><a href='viewdonorsprogramAdmin.php'>View Donors</a></td>";
				echo "<td class = 'tdProgramsAdmin'>
						<form name='submit_program_ID' action='viewdonorsprogram.php' method='POST'>
						<input type= 'hidden' name ='program_id' value ='".$number."'>
						<input type= 'hidden' name ='program_name' value ='".$program_name."'>
						<input type ='submit' name='submitProgramID' value = 'View Donor' >
						</form>
					</td>";
				echo "</tr>";

			}//End of while loop

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