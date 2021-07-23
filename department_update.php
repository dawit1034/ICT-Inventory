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
				$Department_Id=$_GET['Department_Id'];		  
				$Faculty="SELECT * FROM department WHERE Department_Id=".$Department_Id;
				$result=mysqli_query($connection,$Faculty);
			  if($result==true)
				{
					$row=mysqli_fetch_assoc($result);
					$Department_Name=$row['Department_Name'];
				}		  
			 ?>
			<form  action="department_action.php" method="POST" > 
				<div class="row g-3">
							
						<input type="text" class="form-control" value="<?php echo $Department_Id; ?>" name="Department_Id" required hidden>
					
					<div class="col">
						<label for="Department_Name">Department Name</label></br>
						<input type="text" class="form-control" value="<?php echo $Department_Name; ?>" name="Department_Name" required>
					</div>
					<div class="col">
					
					</div>
				</div><br>
				<div class="row">	
					<div class="col">
						<input type="submit" class="btn btn-primary" name="update_department"  value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
  require_once('footer.php');
?> 
