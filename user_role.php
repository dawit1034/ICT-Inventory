<?php
	include('session.php');
?>

	<div class="col-8">
		<div class="card">
			<div class="card-header text-white bg-success">
				New User Role Registration  and lists
			</div>
			<div class="card-body">
				<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#AddNewRole">
				 <i class='fa fa-plus'> </i> Add New Role
				</button>

				<!-- Modal -->
				<div class="modal fade" id="AddNewRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form  action="user_role_action.php" method="POST" > 
									<div class="row g-3">
										<div class="col">
											<label for="Role_Name">User Role Name</label></br>
											<input type="text" class="form-control" placeholder="User Role Name" name="Role_Name" required>
										</div>
										<div class="col">
											
										</div>
									</div><br>
									<div class="row g-3">	
										<div class="col">
											<label for="submit"></br></label>
											<input type="submit" class="btn btn-primary" name="insert_user_role"  value="Submit">
										</div>
									</div>
								</form> 
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>		
				</div>		
							
				<hr>
		
				<table class="table">
					<tr class="table-dark">
							<th>Role ID</th>
							<th>Role Name</th>
							<th>Update/Delete</th>
					</tr>
						<?php
							$result=mysqli_query($connection,"SELECT * FROM user_role ORDER by Role_Id DESC");
							while($row=$result->fetch_array()){
						 ?>  
					<tr>
						<td><?php echo $row['Role_Id'];?></td>
						<td><?php echo $row['Role_Name'];?></td>
						<td>
							<a href="user_role_update.php?Role_Id=<?php echo $row['Role_Id'] ?>" class="btn btn-info btn-sm">Update</i></a>
								
							<a href="javascript:delete_usersrole(<?php echo $row[0]; ?>)" class="btn btn-danger btn-sm">Delete</a>
							 <?php
								
								}
								?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<script language="javascript">
function delete_usersrole(RoleId)
{
	if(confirm('Sure To Remove This Record ?'))
	{
		window.location.href='delete.php?delete_usersrole='+RoleId;
	}
}
</script>
<?php
include("footer.php"); 
?>
