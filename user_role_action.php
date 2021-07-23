<?php
	include('session.php');
?>
<div class="col-8">
		<div class="card">
			<div class="card-header text-white bg-success">
				User Role Registration
			</div>
			<div class="card-body">
			<?php
			if(isset($_POST['insert_user_role']))
				{
				
					$Role_Name = $_POST['Role_Name'];
					$result = mysqli_query($connection,"SELECT * FROM  user_role where Role_Name='$Role_Name'");
					if(mysqli_num_rows($result)>0)
					{
						echo "<div class='alert alert-danger' role='alert'>This users role is existed!! To return please click on back </div>";
						
					}
					else
					{
					$result = mysqli_query($connection,"INSERT INTO user_role (Role_Name) VALUES ('$Role_Name')");
					if($result==TRUE)
						{
							$i=1;
							$result=mysqli_query($connection,"SELECT * FROM user_role ORDER by Role_Id DESC");
							while($row=$result->fetch_array())
							{
								$i=$i+1;
								if($i>2)
								break;
								?>
								<div class="alert alert-info" role="alert">
								The new user role is registered successfully!!
								</div><br>
								<table class="table">
								  <tr class="table-dark">
									<th>Role ID</th>
									<th>Role Type</th>
								  </tr>
								  <tr>
									<td><?php echo $row['Role_Id']; ?></td>
									<td><?php echo $row['Role_Name']; ?></td>
								  </tr>
								</table>
								<hr>
								
							<?php
							}			
						}
					}
				}
				
				if(isset($_POST['update_user_role']))				
				{					
					$Role_Id=$_POST['Role_Id'];
					$Role_Name=$_POST['Role_Name'];
					$UsersRole="UPDATE user_role SET Role_Name='$Role_Name' WHERE Role_Id='$Role_Id'";
					$result=mysqli_query($connection,$UsersRole) or die(mysqli_error());
					if($result==true)
					{	
						?>
						<div class="alert alert-info" role="alert">
						The Role Name is Updated successfully!!
						</div>
						<table class="table">
							<tr class="table-dark">
								<th>Role Name</th>
							</tr>
						<?php $result=mysqli_query($connection,"SELECT * FROM user_role where Role_Id='$Role_Id'");
						while($row=$result->fetch_array())
						{ ?>
							<tr>
								<td><?php echo $row['Role_Name']; ?></td>
							</tr>
						</table>
						<hr>
					<?php 
						}
					}
				}
				$connection->close();
					?> 
					<a class="btn btn-primary" href="user_role.php">Back</a>
		</div>
	</div>
</div>
</div>

<?php
include("footer.php"); 
?>


