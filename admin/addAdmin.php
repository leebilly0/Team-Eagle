
<!--***Add below-->
<?php
	//Add session to be start
	require ("adminHeader.php");
	//Add php log out process After it press the logoff button
	require ("../logoff.php");      
?>
<br/>
<div class="container center_div row-padding">

            <div class="panel panel-primary ">
                <div class="panel-heading"> <h4>Add Admin</h4></div>
                <div class="panel-body">
                    <p>Add an admin to the database</p>
                    <form action ="AddAdminSubmit.php" method="POST" class="form-horizontal" >

                        <div class="form-group">
                            <label class="control-label col-sm-2" >Username:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="username" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Password:</label>
                            <div class="col-sm-10">
                                <input type="password" name ="password" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name ="name" class="form-control"  >
                            </div>
                        </div>
                        <div class="form-group "> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name ="submit" class="btn btn-primary">Add Program</button>
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