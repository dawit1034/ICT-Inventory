<?php
	include('session.php');
?>
<div class="col-8">
	<div class="card">
		<div class="card-header text-white bg-success">
			Year registeration Form
		</div>
		<div class="card-body">   
		
			<?php
				$Status_Id=$_GET['Status_Id'];		  
				$Faculty="SELECT * FROM status WHERE Status_Id=".$Status_Id;
				$result=mysqli_query($connection,$Faculty);
			  if($result==true)
				{
					$row=mysqli_fetch_assoc($result);
					$Status_Name=$row['Status_Name'];
				}		  
			 ?>
			<form  action="status_action.php" method="POST" > 
				<div class="row g-3">
							
						<input type="text" class="form-control" value="<?php echo $Status_Id; ?>" name="Status_Id" required hidden>
					
					<div class="col">
						<label for="Status_Name">Year Name</label></br>
						<input type="text" class="form-control" value="<?php echo $Status_Name; ?>" name="Status_Name" required>
					</div>
					<div class="col">
					
					</div>
				</div><br>
				<div class="row">	
					<div class="col">
						<input type="submit" class="btn btn-primary" name="update_status"  value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
  require_once('footer.php');
?> 
