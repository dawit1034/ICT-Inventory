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
				$Role_Id=$_GET['Role_Id'];		  
			  $Year="SELECT * FROM `user_role` WHERE Role_Id=".$Role_Id;
			  $result=mysqli_query($connection,$Year);
			  if($result==true)
				{
					$row=mysqli_fetch_assoc($result);		  
					$Role_Name=$row['Role_Name'];
				}		  
			 ?>
			<form  action="user_role_action.php" method="POST" > 
				<div class="row g-3">
							
						<input type="text" class="form-control" value="<?php echo $Role_Id; ?>" name="Role_Id" required hidden>
					
					<div class="col">
						<label for="Role_Name">Role Name</label></br>
						<input type="text" class="form-control" value="<?php echo $Role_Name; ?>" name="Role_Name" required>
					</div>
					<div class="col">
					
					</div>
				</div><br>
				<div class="row">	
					<div class="col">
						<input type="submit" class="btn btn-primary" name="update_user_role"  value="Update">
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
  require_once('footer.php');
?> 
