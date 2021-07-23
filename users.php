<?php
	include('session.php');
?>

<div class="col-8">
	<div class="card">
		<div class="card-header text-white bg-success">
			User Registration Form
		</div>
		<div class="card-body">
			<form  action="users_action.php" method="POST" > 
				<div class="row g-3">
					<div class="col">
						<label for="First_Name">User First Name</label></br>
						<input type="text" class="form-control" placeholder="User First Name" name="First_Name" required>
					</div>
					<div class="col">
						<label for="Middle_Name">User Middle Name</label></br>
						<input type="text" class="form-control" placeholder="User Middle Name" name="Middle_Name" required>
					</div>
				</div>
				<div class="row g-3">
					<div class="col">
						<label for="Last_Name">User Last Name</label></br>
						<input type="text" class="form-control" placeholder="User Last Name" name="Last_Name" required>
					</div>
					<div class="col">
						<label for="Department_Id">Department ID</label></br>
						<select id="Department_Id" class="form-control" name="Department_Id">
							<option>--Department--</option>
								<?php 	
									$fac=mysqli_query($connection,"select * from department");
									while ($row=mysqli_fetch_array($fac))
									{
									?>							
							<option value="<?php echo $row["Department_Id"]; ?>"><?php echo $row["Department_Name"]; ?></option>";
								<?php
								}
							?>
						</select>
					</div>
				</div>
				<div class="row g-3">
					<div class="col">
						<label for="Role_Id">Role</label></br>
						<select id="Role_Id" class="form-control" name="Role_Id">
							<option>Role</option>
								<?php 	
									$fac=mysqli_query($connection,"select * from user_role");
									while ($row=mysqli_fetch_array($fac))
									{
									?>							
							<option value="<?php echo $row["Role_Id"]; ?>"><?php echo $row["Role_Name"]; ?></option>";
								<?php
								}
							?>
						</select>
					</div>
					<div class="col">
						<label for="Login_Name">User Name</label></br>
						<input type="text" class="form-control" placeholder="User Name" name="Login_Name" required>
					</div>
				</div>
				<div class="row g-3">					
					<div class="col">
						<label for="Password">Password</label></br>
						<input type="password" class="form-control" placeholder="Password" name="Password" required>
					</div>
				</div>
				<div class="row">	
					<div class="col">
						<label for="submit"></br></label></br>
						<input type="submit" class="btn btn-primary" name="insert_user"  value="Submit">
					</div>
				</div>
			</form> 	
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	    function change_Fac_Id()
		{
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","ajax.php?FacId="+document.getElementById("FacId1").value,false);
				xmlhttp.send(null);				
				document.getElementById("DepId").innerHTML=xmlhttp.responseText;				
		}
</script>
<?php
include("footer.php"); 
?>
