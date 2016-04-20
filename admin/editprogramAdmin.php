

<!--Add Session to every Admin page-->
<?php
	//Add session to be start
	require ("adminHeader.php");
?>

	
   <!-- Start your coding below here --> 
 
 <?php

global $DataBaseCon; //grabs connection to MYSQL database
$id = $_GET['editId'];
//echo $id;
//echo $id;
 $Query = "SELECT program_id, program, yr_start, mission FROM program WHERE program_id= $id";
   $results = mysqli_query($DataBaseCon, $Query);
 if (mysqli_num_rows($results) > 0) {
    //output data of each row 
    while ($row = mysqli_fetch_array($results)) {
      $program[] =$row["program"] ;
     $year = $row["yr_start"] ;
    $mission[]  =$row["mission"] ;
     $_SESSION["IdEdit"] = $row["program_id"] ;
    }
 }
 ?>

        <br/>
        <div class="container center_div row-padding">

            <div class="panel panel-primary ">
                <div class="panel-heading"> <h4>Edit Program</h4></div>
                <div class="panel-body">
                    <p>Edit the Program's info below</p>
                    <form action ="editSubmitProgramAdmin.php" method="POST" class="form-horizontal" >

                        <div class="form-group">
                            <label class="control-label col-sm-2" >Program Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="programName" value= "<?php echo implode('', $program); ?>"  class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Year:</label>
                            <div class="col-sm-10"> 
                                <input type="number" name ="year" value= <?php echo "$year"; ?> class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Mission Statement/Theme:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="mission" value= "<?php echo implode('', $mission); ?>" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group "> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <a class="btn btn-primary" href="programsAdmin.php" role="button">Back To Program</a>&nbsp
                                <button type="submit" name ="editButton" class="btn btn-primary">Save</button>
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
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>