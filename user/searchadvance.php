<!DOCTYPE html>
<?php
  require ("../configurationDatabase.php");
  require ("userHeader.php");
?>

  <div class="container center_div row-padding">

            <div class="panel panel-primary ">
                <div class="panel-heading"> <h4>Book Search</h4></div>
                <div class="panel-body">
                    <p>Fill in at least on field. To define your search, fill in more fields</p>
                    <form action ="searchresults.php" method="POST" class="form-horizontal" >

                        <div class="form-group">
                            <label class="control-label col-sm-2" >Title:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="title" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Author First Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="authorFName" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Author Last Name:</label>
                            <div class="col-sm-10"> 
                                <input type="text" name ="authorLName" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Genre:</label>
                            <div class="col-sm-10"> 
                                <select name="genre" class="form-control">
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
                                <input type="text" name ="yearOfPub" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >ISBN:</label>
                            <div class="col-sm-10"> 
                                <input type="text" name ="isbn" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Language:</label>
                            <div class="col-sm-10"> 
                                <select name = "language" class="form-control">
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
                                <input type="number" name ="cost" placeholder="Please enter a valid number" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group "> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button name="reset" type="reset" class="btn btn-default ">Clear</button>
                                <button type="submit" name ="advancedSearch" class="btn btn-primary">Search</button>
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