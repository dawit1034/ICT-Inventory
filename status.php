<?php
	include('session.php');
?>
<div class="col-10">
	<div class="card">
		<div class="card-header text-white bg-success">
			Status Registration and lists
		</div>
		<div class="card-body">	
			<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#AddNewStatus">
			 <i class='fa fa-plus'> </i> Add New Status
			</button>

				<!-- Modal -->
				<div class="modal fade" id="AddNewStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add New Status</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
					  <div class="modal-body">
							<form  action="status_action.php" method="POST" > 
								<div class="row g-3">
									<div class="col">
										<label for="Status_Name">Status Name</label></br>
										<input type="text" class="form-control" placeholder="Status Name" name="Status_Name" required>
									</div>
									<div class="col">
										
									</div>
								</div><br>
								<div class="row">	
									<div class="col">
										<label for="submit">
										<input class="btn btn-primary" type="submit" name="insert_status"  value="submit">
									</div>
								</div>
							</form>
							</div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						
					  </div>
					</div>
				  </div>
				</div>
				<hr>
		
			<table class="table">
				<tr class="table-dark">
						<th>Status ID</th>
						<th>Status Name</th>
						<th>Update/Delete</th>
				</tr>
					<?php
						$result=mysqli_query($connection,"SELECT * FROM status ORDER by Status_Id DESC");
						while($row=$result->fetch_array())
						{
					 ?>  
				<tr>
					<td><?php echo $row['Status_Id'];?></td>
					<td><?php echo $row['Status_Name'];?></td>
					<td>
						<a href="status_update.php?Status_Id=<?php echo $row['Status_Id'] ?>" class="btn btn-info btn-sm" >Update</i></a>
							
							<a href="javascript:delete_faculty(<?php echo $row[0]; ?>)"class="btn btn-danger btn-sm">Delete</a>
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
function delete_faculty(FacId)
{
	if(confirm('Sure To Remove This Record ?'))
	{
		window.location.href='delete.php?delete_faculty='+FacId;
	}
}
</script>
<?php
include("footer.php"); 
?>
