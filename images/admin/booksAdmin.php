<!DOCTYPE html>
<!--Add Session to every Admin page-->
<?php
  //Add session to be start
  require ("adminHeader.php");
  //Add php log out process After it press the logoff button
  require ("../logoff.php");      
?>
    <!-- END OF NAVBAR -->
  <!-- Start your coding below here -->
     <?php
    /*There are two parts to connection to the database and querying results, THIS IS STEP 1
    SEE LINE 133 for further step*/
    global $DataBaseCon; //grabs connection to MYSQL database
    //My Query I will be Using
    $getData = "SELECT book_id ,book_title,author_fname,author_lname,genre,year_ofpub,isbn,language,cost FROM books ORDER BY book_title"; 
    $results = mysqli_query($DataBaseCon, $getData);  //Grab results from database using connection and query
?>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
          <h1>Books</h1> 
          <p>Here is the list of available books in Vunnava Dot Com Library</p>

           <!--HEADLINER of PIX of donors and little info about them -->
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/gameofthrones.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Game of Thrones</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/godaan.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Godaan</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/greatgatsby.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>The Great Gatsby</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/fotr.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Fellowship of the Ring</h4>
            </div>
          </div>
          <!--ENd of headliner for donors -->
          <h4><a href = "addbookAdmin.php" >Add New Book</a></h4>
 <h2 class="sub-header">Vunnava Dot Com Library Books</h2>
          <div class="table-responsive">
            <table class="table table-striped">
   
           <!-- Table with Data -->
          
           
              <!--Headers for data table-->
              <thead>
                <tr>
                  <th>Book Title</th>
                  <th>Author Name</th>
                  <th>Genre</th>
                  <th>Year of Publish</th>
                   <th>ISBN</th>
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
                
                      echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row["book_title"] . "</td>";
        echo "<td>" . $row["author_fname"] . " " . $row["author_lname"] . "</td>";
        echo "<td>" . $row["genre"] . "</td>";
        echo "<td>" . $row["year_ofpub"] . "</td>";
        echo "<td>" . $row["book_id"] . "</td>";
        echo "<td>" . $row["language"] . "</td>";
        echo "<td>" . $row["cost"] . "</td>";
         echo "<td><a href='editbookAdmin.php?editId=".$row['book_id']."'>Edit</a> &nbsp<a href='DeleteBookAdmin.php?id=".$row['book_id']."'>Delete</a></td>";
      
        echo "</tr>";
        
        echo "</tbody>";
                    }
                  }
                ?>  
              </tbody>
        

       
                        </table>
                    </div></div>
            </div>
        </div>

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