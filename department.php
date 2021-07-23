<?php
	include('session.php');
?>
<div class="col-10">
	<div class="card">
		<div class="card-header text-white bg-success">
			Faculty Registration
		</div>
		<div class="card-body">	
			<form  action="department_action.php" method="POST" > 
				<div class="row g-3">
					<div class="col">
						<label for="Department_Name">Department Name</label></br>
						<input type="text" class="form-control" placeholder="Status Name" name="Department_Name" required>
					</div>
					<div class="col">
						
					</div>
				</div><br>
				<div class="row">	
					<div class="col">
						<label for="submit">
						<input class="btn btn-primary" type="submit" name="insert_department"  value="submit">
					</div>
				</div>
			</form>
				<hr>
		
			<table class="table">
				<tr class="table-dark">
						<th>Department ID</th>
						<th>Department Name</th>
						<th>Update/Delete</th>
				</tr>
					<?php
						$result=mysqli_query($connection,"SELECT * FROM department ORDER by Department_Id DESC");
						while($row=$result->fetch_array())
						{
					 ?>  
				<tr>
					<td><?php echo $row['Department_Id'];?></td>
					<td><?php echo $row['Department_Name'];?></td>
					<td>
						<a href="department_update.php?Department_Id=<?php echo $row['Department_Id'] ?>" class="btn btn-info btn-sm" >Update</i></a>
							
							<a href="javascript:delete_department(<?php echo $row[0]; ?>)"class="btn btn-danger btn-sm">Delete</a>
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
function delete_department(Department_Id)
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
