<!DOCTYPE html>
<?php
  require ("../configurationDatabase.php");
  require ("userHeader.php");
?>


 <!-- Start your coding below here -->
    <?php
    /*There are two parts to connection to the database and querying results, THIS IS STEP 1
    SEE LINE 133 for further step*/
    global $DataBaseCon; //grabs connection to MYSQL database
    //My Query I will be Using
    $getData = "SELECT donor_id, donor_fname, donor_lname, donate_dd, total_amt FROM donors ORDER BY donor_fname"; 
    $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
?>

    <!-- Start your coding below here -->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main"><br>
          <h1>Donors</h1> 
          <p>Here is the list of donors who have donated books and/or monetary value to Vunnava Dot Com Library over the years</p>


           <!--HEADLINER of PIX of donors and little info about them -->
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/billy.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Billy Lee</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/lyn.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Linh Huynh</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/notAvailable.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Jane Doe</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/notAvailable.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Poleap Sar</h4>
            </div>
          </div>
          <!--ENd of headliner for donors -->

           <!-- Table with Data -->
          <h2 class="sub-header">Vunnava Dot Com Library Contributors</h2>

          <div class="table-responsive">
            <table class="table table-striped">
              <!--Headers for data table-->
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Donated Date</th>
                  <th>Total Amount Donated</th>
                  <th>Books Donated</th>
                </tr>
              </thead>
              <!--Data for Table -->
              <tbody>
                <?php
                  /*THIS IS STEP 2 in QUERYING FROM DATABASE SEE LINE 79 FOR STEP 1*/
                 
                  //if data exist in table
                  if (mysqli_num_rows($results) > 0)
                  {
                    //output data of each row 
                    while ($row = mysqli_fetch_assoc($results))
                    {
                      /*while results has row of data. output first name, last name
                      date, total amount and a link*/
                      echo "<tr>";
                      echo "<td>".$row["donor_fname"]." ".$row["donor_lname"]."</td>";
                      echo "<td>".$row["donate_dd"]."</td>";
                      echo "<td>".$row["total_amt"]."</td>";
                      echo "<td><a href='viewbooksdonor.php?first_name=".$row["donor_fname"]."&last_name=".$row["donor_lname"].
                        "'>View Books Donated</a>";
                      echo "</tr>";
                    }
                  }
                ?>  
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
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>