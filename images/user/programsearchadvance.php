<!DOCTYPE html>
<?php
  require ("../configurationDatabase.php");
  require ("userHeader.php");
?>

  <div class="container center_div row-padding">

            <div class="panel panel-primary ">
                <div class="panel-heading"> <h4>Program Search</h4></div>
                <div class="panel-body">
                    <p>Fill in at least on field. To define your search, fill in more fields</p>
                    <form action ="searchresults.php" method="POST" class="form-horizontal" >

                        <div class="form-group">
                            <label class="control-label col-sm-2" >Program:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="program" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Start Date:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="startDate" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Mission:</label>
                            <div class="col-sm-10"> 
                                <input type="text" name ="mission" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group "> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button name="reset" type="reset" class="btn btn-default ">Clear</button>
                                <button type="submit" name ="ProgramAdvancedSearch" class="btn btn-primary">Search</button>
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