<!DOCTYPE html>
<?php
  require ("../configurationDatabase.php");
  require ("userHeader.php");
?>

      <!-- START KEYWORD SEARCH FORM -->
        <div class="container center_div">
            <div class="row row-padding">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Keyword Search</h2></div>
                        <div class="panel-body">

                            <form action ="searchresults.php" method="POST">
                                <div class="input-group">
                                    <div class="input-group-addon input-lg">
                                        <span class="glyphicon glyphicon-book"></span>
                                    </div>
                                    <input type="textbox" name ="keywordToSearch" required class="form-control input-lg" placeholder="Type in keyword to search for a book">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-lg" name = "search" type="submit" >Search</button>
                                    </span>
                                </div>
                                
                                <div class="input-group">
                                    <button onclick="window.location.href = 'searchadvance.php'" type="button" class="btn btn-link">Advanced Search</button>
                                </div>

                            </form>
                        </div>
                        
                         <div class="panel-body">

                            <form action ="Searchresults.php"  method="POST">
                                <div class="input-group">
                                    <div class="input-group-addon input-lg">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </div>
                                    <input type="textbox" name ="DonorKeywordToSearch" required class="form-control input-lg" placeholder="Type in keyword to search for a donor">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-lg" name = "DonorSearch" type="submit" >Search</button>
                                    </span>
                                </div>
                                
                                <div class="input-group">
                                    <button onclick="window.location.href = 'donorsearchadvance.php'" type="button" class="btn btn-link">Advanced Search</button>
                                </div>

                            </form>
                        </div>
                        
                        <div class="panel-body">

                            <form action ="Searchresults.php"  method="POST">
                                <div class="input-group">
                                     <div class="input-group-addon input-lg">
                                        <span class="glyphicon glyphicon-folder-open"></span>
                                    </div>
                                    <input type="textbox" name ="ProgramKeywordToSearch" required class="form-control input-lg" placeholder="Type in keyword to search for a program">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-lg" name = "ProgramSearch" type="submit" >Search</button>
                                    </span>
                                </div>
                                
                                <div class="input-group">
                                    <button onclick="window.location.href = 'programsearchadvance.php'" type="button" class="btn btn-link">Advanced Search</button>
                                </div>

                            </form>
                        </div>
                    </div>  
                </div> 
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