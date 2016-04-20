<!--Add Session to every Admin page-->
<?php
	//Add session to be start
	require ("adminHeader.php");
?>
    <!-- Start your coding below here -->

 <!--***Add below--> 
   <?php

	if(isset($_POST['submit_edit'])){	

	$titleAdmin = $_POST['titleAdmin'];
	$authorFNameAdmin = $_POST['authorFNameAdmin'];
	$authorLNameAdmin = $_POST['authorLNameAdmin'];
	$genreAdmin = $_POST['genreAdmin'];
	$yearOfPubAdmin = $_POST['yearOfPubAdmin'];
	$isbnAdmin = $_POST['isbnAdmin'];
	$languageAdmin = $_POST['languageAdmin'];
	$costAdmin = $_POST['costAdmin'];
	
	$programName = $_POST['programName'];
	$donorName = $_POST['donorName'];
	
	$oldBook_id = $_POST['book_id'];

	//update the program
	//UPDATE program SET program = "Read Test Book", yr_start ="2016", mission = "read edit test 1" WHERE program_id = "1"; 
	$updateBook = "UPDATE books SET book_title = '".$titleAdmin."',author_fname ='".$authorFNameAdmin.
					"', author_lname ='".$authorLNameAdmin."', genre ='".$genreAdmin.
					"', year_ofpub ='".$yearOfPubAdmin."', LANGUAGE ='".$languageAdmin.
					"', cost ='".$costAdmin."', donor_id ='".$donorName."', program_id ='".$programName.
					"' WHERE book_id ='".$oldBook_id."'";
					
	//Check if it return true or false
	if(mysqli_query($DataBaseCon, $updateBook)){
		$GLOBALS['addEdit'] = "Edit Successfuly !";
		
		
	}else{
		
		$GLOBALS['addEdit'] = "Edit Error!";
	
	}
	
}//End of if edit
?>
<!--***Done add above--> 

<!--Add form edit code-->
<div class="container center_div row-padding">
    <div class="panel panel-primary ">
        <div class="panel-heading"> <h4>Edit Book</h4></div>
            <div class="panel-body">
                    <p>Edit a book to the database</p>
                    <form action ="editbookAdmin.php" method="POST" class="form-horizontal" >

                        <div class="form-group">
                            <label class="control-label col-sm-2">Title:</label>
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
                                    <option value="tengu">Telugu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Cost:</label>
                            <div class="col-sm-10"> 
                                <input type="number" step="any" name ="costAdmin" placeholder="Please enter a valid number" class="form-control"  >
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" >Program Name:</label>
                            <div class="col-sm-10"> 
                                <input type="text" name ="programName" class="form-control"  >
								
								<!--Edit donor name to get program id-->
                                <select name="programName" class="form-control">
								<?php	
									$getAllProgram = "SELECT program_id, program FROM program";
									$resultProgram = mysqli_query($DataBaseCon, $getAllProgram);
									if(mysqli_num_rows($resultProgram) == 0){
										$GLOBALS['getProgram'] = "Get program Successfuly !";
										
									}else{
										$GLOBALS['getProgram'] = "Get program Error!";
										
									}
									 
									while($rowProgram = mysqli_fetch_assoc($result)){
										echo "<option value=''>(Select one)</option>";
										echo " <option value='".$rowProgram["program_id"]."'>".$rowProgram["program"]."</option>";
										
								?>
								</select>			
						<!--done Edit program name-->	
	
                            </div>
                        </div>
						
                         <div class="form-group">
                            <label class="control-label col-sm-2" >Donor Name:</label>
                            <div class="col-sm-10"> 
							
							<!--Edit donor name to get donor id-->
                                <select name="donorName" class="form-control">
								<?php	
									$getAllDonor = "SELECT donor_id, donor_fname, donor_lname FROM donors";
									$resultDonor = mysqli_query($DataBaseCon, $getAllDonor);
									if(mysqli_num_rows($resultDonor) == 0){
										$GLOBALS['getDonor'] = "Get donor Successfuly !";
										
									}else{
										$GLOBALS['getDonor'] = "Get donor Error!";
										
									}
									 
									while($rowDonor = mysqli_fetch_assoc($result)){
										$donor_id = $rowDonor["donor_id"];
										echo "<option value=''>(Select one)</option>";
										echo " <option value='".$donor_id."'>".$rowDonor['donor_fname']."' '".$rowDonor['donor_lname']."</option>";
										
								?>
								</select>			
							<!--done Edit donor name-->		
								
								
								
                            </div>
                        </div>
                        <div class="form-group "> 
                            <div class="col-sm-offset-2 col-sm-10">
							
							<input type = "hidden" name = "oldProgram_id" value="<?php $GLOBALS['book_id'] = $_POST['program_id']; echo $book_id; ?>">

                                <a class="btn btn-primary" href="booksAdmin.php" role="button">Back</a>
								<input type = "reset" name = "reset" value = "Cancel">
                                <button type="submit" name ="submit_edit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form> 
					
					
			</div>		
		</div>
    </div>
</div>
<!--Done add form above-->

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