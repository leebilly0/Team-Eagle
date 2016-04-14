
<!--***Add below-->
<?php
	//Add session to be start
	require ("adminHeader.php");
    //Add session to be start
  require ("../session.php");

  //Add php log out process After it press the logoff button
  require ("../logoff.php");      

   //To have access to mysql database
  require ("../configurationDatabase.php");
?>
	<!--***Done add above-->  
<!--Add Session to every Admin page-->

	
   <!-- Start your coding below here -->
  
   <!--***Add below-->
   
   <?php

if(isset($_POST['submittedEdit'])){
	
	$newProgram_name = $_POST['newProgram_name'];
	$year_start = $_POST['year_start'];
	$mission = $_POST['mission'];
	//****Called connecDatabase.php to do connection
			require("../connectDatabase.php");
		
	//Insert program edit to database
	$insertProgram = "INSERT INTO program VALUES(".$newProgram_name.",".$year_start.",".$mission.")";		
	
	//Check if it return true or false
	if(mysqli_query($DataBaseCon, $insertProgram)){
		echo "Edit Successfuly !";
		
	}else{
		
		echo "Edit Error!";
	}

	
	
}//End of if edit
?>
 

<h2>Add Program</h2>
<form name="Edit_form" action="addprogramAdmin.php" method="POST">
Program Name:<br>
<input type = "text" name = "newProgram_name">
<br><br>

Year Start:<br>
<input type = "number" name = "year_start" min="1" max="3000">
<br><br>

Mission Statement: <br>
<input style= "width: 36%; height: 111px;" type = "text" name = "mission">

<br><br>

<!--***Add below-->
<input type="hidden" name="submittedEdit" value="TRUE" />
<!--***Done add above-->
<input type = "reset" name = "reset" value = "Cancel">
<input type = "submit" name = "edit_program" value = "Save">
<br><br>
=======
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
                <li><a href="aboutAdmin.php">About</a></li>
                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Tools<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="addbookAdmin.php">Add Book</a></li>
                <li><a href="adddonorAdmin.php">Add Donor</a></li>
                <li><a href="addprogramAdmin.php">Add Program</a></li>
                <li><a href="addAdmin.php">Add Admin</a></li>
                <li><a href="uploadAdmin.php">Upload Spreadsheet</a></li>
              </ul>
            </li>
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






</form>



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

  