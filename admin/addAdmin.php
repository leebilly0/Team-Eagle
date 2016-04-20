<!--***Add below-->
<?php
	//Add session to be start
	require ("adminHeader.php");
	//Add php log out process After it press the logoff button
	require ("../logoff.php");      
?>
<!--***Done add above-->  

    <!-- Start your coding below here -->
  <!--***Add below--> 
   <?php
if(isset($_POST['addAdmin'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];

	//****Called connecDatabase.php to do connection from adminHeader.php	
	//Insert program edit to database
	$addUser = "INSERT INTO logins(username,password, name) VALUES('".$username."','".$password."','".$name."')";			
	//Check if it return true or false
	if(mysqli_query($DataBaseCon, $addUser)){
		echo "Add Successfuly !";
	
	}else{
		
		echo "Add Error!";
	}

}//End of if edit
?>
 

<h2>Add Admin</h2>
<form name="Add_admin" action="addAdmin.php" method="POST">
 Name:<br>
<input type = "text" name = "name">
<br><br>
User Name:<br>
<input type = "text" name = "username">
<br><br>
Password: <br>
<input type = "password" name = "password">
<br><br>
<!--***Add below-->
<input type="hidden" name="addAdmin" value="TRUE">
<!--***Done add above-->
<input type = "reset" name = "reset" value = "Cancel">
<input type = "submit" name = "edit_program" value = "Save">
<br><br>
</form>





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