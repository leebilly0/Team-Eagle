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
                    </ul>
                </div>

                <!-- Start of username password form of right nav bar -->
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" action="../logoff.php" method="POST">
                        <div class="form-group">
                            <FONT COLOR="Black">Welcome Back<?php echo " {$_SESSION['user_name']}"; ?>&#33;</FONT>
                            <button type="submit" class="btn btn-primary" name="log_out">Log off</button>

                    </form>
                </div>
            </div>
        </nav>
        <!-- END OF NAVBAR -->

        <div class="container center_div row-padding">

            <div class="panel panel-primary ">
                <div class="panel-heading"> <h4>Book Search</h4></div>
                <div class="panel-body">
                    <p>Fill in at least on field. To define your search, fill in more fields</p>
                    <form action ="searchresultsAdmin.php" method="POST" class="form-horizontal" >

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
                                    <option value="novel">Novel</option>
                                    <option value="science">Science</option>
                                    <option value="drama">Drama</option>
                                    <option value="action">Action</option>
                                    <option value="romance">Romance</option>
                                    <option value="mystery">Mystery</option>
                                    <option value="horror">Horror</option>
                                    <option value="health">Health</option>
                                    <option value="travel">Travel</option>
                                    <option value="guide">Guide</option>
                                    <option value="children">Children</option>
                                    <option value="religion">Religion</option>
                                    <option value="science">Science</option>
                                    <option value="history">History</option>
                                    <option value="comics">Comics</option>
                                    <option value="cookbooks">Cookbooks</option>
                                    <option value="diaries">Diaries</option>
                                    <option value="fantasy">Fantasy</option>
                                    <option value="art">Art</option>

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
                            <label class="control-label col-sm-2" >ISBN:</label>
                            <div class="col-sm-10"> 
                                <input type="number" name ="isbnAdmin" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Language:</label>
                            <div class="col-sm-10"> 
                                <select name = "languageAdmin" class="form-control">
                                    <option value="">(Select one)</option>
                                    <option value="english" >English</option>
                                    <option value="hindi">Hindi</option>
                                    <option value="tengu">Tengu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Cost:</label>
                            <div class="col-sm-10"> 
                                <input type="number" step="any" name ="costAdmin" placeholder="Please enter a valid number" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group "> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button name="reset" type="reset" class="btn btn-default ">Clear</button>
                                <button type="submit" name ="advancedSearchAdmin" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form> </div>
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