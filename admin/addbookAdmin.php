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

    <title>Vunnava Dot Com Library</title>

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
          <a class="navbar-brand" href="../indexAdmin.php"><img class="header-logo" alt="Vunnava Dot Com Library Logo" src="../images/logo.png"></a>
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

   <!-- Start your coding below here -->
    <?php
    /*There are two parts to connection to the database and querying results, THIS IS STEP 1
    SEE LINE 133 for further step*/
    global $DataBaseCon; //grabs connection to MYSQL database
    //My Query I will be Using
    $getData = "SELECT program_id, program FROM program"; 
    $getData2 = "SELECT donor_id, donor_fname, donor_lname FROM donors"; 
    $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
    $results2 = mysqli_query($DataBaseCon, $getData2);  //Grab results from database using connection and query

    ?>
    <!-- Start your coding below here -->
<div class="container center_div row-padding">

            <div class="panel panel-primary ">
                <div class="panel-heading"> <h4>Add Book</h4></div>
                <div class="panel-body">
                    <p>Add a book to the database</p>
                    <form action ="addBookSubmit.php" method="POST" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="control-label col-sm-2" >Title:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="titleAdmin" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Author First Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="authorFNameAdmin" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Author Last Name:</label>
                            <div class="col-sm-10"> 
                                <input type="text" name ="authorLNameAdmin" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Genre:</label>
                            <div class="col-sm-10"> 
                                <select name="genreAdmin" class="form-control">
                                    <option value="">(Select one)</option>
                                    <option value="Novel">Novel</option>
                                    <option value="Science">Science</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Action">Action</option>
                                    <option value="Romance">Romance</option>
                                    <option value="Mystery">Mystery</option>
                                    <option value="Horror">Horror</option>
                                    <option value="Health">Health</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Guide">Guide</option>
                                    <option value="Children">Children</option>
                                    <option value="Religion">Religion</option>
                                    <option value="Science">Science</option>
                                    <option value="History">History</option>
                                    <option value="Comics">Comics</option>
                                    <option value="Cookbooks">Cookbooks</option>
                                    <option value="Diaries">Diaries</option>
                                    <option value="Fantasy">Fantasy</option>
                                    <option value="Art">Art</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Year of Publisher:</label>
                            <div class="col-sm-10"> 
                                <input type="number" name ="yearOfPubAdmin" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Language:</label>
                            <div class="col-sm-10"> 
                                <select name = "languageAdmin" class="form-control">
                                    <option value="">(Select one)</option>
                                    <option value="english" >English</option>
                                    <option value="hindi">Hindi</option>
                                    <option value="tengu">Telugu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Cost:</label>
                            <div class="col-sm-10"> 
                                <input type="number" step="any" name ="costAdmin" placeholder="Please enter a valid number" class="form-control"  >
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" >Program Name:</label>
                            <div class="col-sm-10"> 
                                <select name = "programName" class="form-control">
                                    <option selected="(Select one)">(Select one)</option>
                                    <?php
                                        if (mysqli_num_rows($results) > 0)
                                          {
                                            //output data of each row 
                                            while ($row = mysqli_fetch_assoc($results))
                                            {
                                              ?>
                                              <option><?php echo ($row['program_id'])." ".($row['program']);?></option>
                                              <?php
                                            }
                                        }
                                              ?>        
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" >Donor Name:</label>
                            <div class="col-sm-10">
                             <select name = "donorName" class="form-control">
                                    <option selected="(Select one)">(Select one)</option>
                                    <?php
                                        if (mysqli_num_rows($results2) > 0)
                                          {
                                            //output data of each row 
                                            while ($row = mysqli_fetch_assoc($results2))
                                            {
                                              ?>
                                              <option><?php echo ($row['donor_id'])." ".($row['donor_fname'])." ".($row['donor_lname']);?></option>
                                              <?php
                                            }
                                        }
                                              ?>        
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Upload Book Image:</label>
                            <div class="col-sm-10"> 
                                <input type="file" name="photo" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group "> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <a class="btn btn-primary" href="booksAdmin.php" role="button">Back</a>
                                <button type="submit" name ="submit" class="btn btn-primary">Add Book</button>
                            </div>
                        </div>
                    </form> </div>
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