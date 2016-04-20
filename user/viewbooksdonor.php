<!DOCTYPE html>
<?php
  require ("../configurationDatabase.php");
  require ("userHeader.php");
?>

    <!-- Start your coding below here -->
    <?php
    $first = $_GET['first_name'];
    $last = $_GET['last_name'];

    global $DataBaseCon; //grabs connection to MYSQL database
    //My Query I will be Using
    $getData = "SELECT book_title, author_fname, author_lname, genre, year_ofpub, language, cost FROM books NATURAL JOIN donors WHERE donor_fname='".$first."' AND donor_lname='".$last."'"; 
    $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
    ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
          <br/>
          <br/>

           <!-- Table with Data -->
          <h2 class="sub-header">Books Donated By <?php 
          echo $first ;
          echo " ";
          echo $last; ?></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <!--Headers for data table-->
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Genre</th>
                  <th>Year of Publication</th>
                  <th>Language</th>
                  <th>Cost</th>
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
                      echo "<td>".$row["book_title"]."</td>";
                      echo "<td>".$row["author_fname"]." ".$row["author_lname"]."</td>";
                      echo "<td>".$row["genre"]."</td>";
                      echo "<td>".$row["year_ofpub"]."</td>";
                      echo "<td>".$row["language"]."</td>";
                      echo "<td>".$row["cost"]."</td>";
                      echo "</tr>";
                    }
                  }
                ?>  
              </tbody>
            </table>
            <br/>
             <!-- Back Button -->
            <center><a class="btn btn-primary" href="donors.php" role="button">Back To Donors</a></center>
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