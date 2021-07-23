<?php
	include('session.php');
?>

<div class="col-8">
	<div class="card">
		<div class="card-header text-white bg-success">
			User Registration Form
		</div>
		<div class="card-body">
		<?php
			if(isset($_POST['insert_user']))
				{
			$First_Name = $_POST['First_Name'];
			$Middle_Name = $_POST['Middle_Name'];
			$Last_Name = $_POST['Last_Name'];
			$Department_Id = $_POST['Department_Id'];
			$Role_Id = $_POST['Role_Id'];
			$Login_Name = $_POST['Login_Name'];
			$Password = $_POST['Password'];
			$md5password = md5($Password);
			$result = mysqli_query($connection,"SELECT * FROM  user where Login_Name='$Login_Name'");
			if(mysqli_num_rows($result)>0)
			{
				echo "This user is existed!!";
			}
			else
			{
			$result = mysqli_query($connection,"INSERT INTO user (First_Name, Middle_Name, Last_Name, Department_Id , Role_Id , Login_Name, Password) VALUES ('$First_Name','$Middle_Name','$Last_Name','$Department_Id','$Role_Id','$Login_Name','$md5password')");
			if($result==TRUE)
			{
				$i=1;
				$result=mysqli_query($connection,"SELECT * FROM user ORDER by User_Id DESC");
				while($row=$result->fetch_array()){
				$i=$i+1;
				if($i>2)
				break;
			?>
			<hr>
				The new user registered successfully!!<br>
			<hr>
				<table class="table">
					  <tr class="table-dark">
					<th>Role ID</th>
					<th>UserMName</th>
					<th>UserLName</th>
					<th>DepId</th>
					<th>RoleId</th>
					<th>LoginName</th>
					<th>UserId</th>
				  </tr>
				  <tr>
					<td><?php echo $row['First_Name']; ?></td>
					<td><?php echo $row['Middle_Name']; ?></td>
					<td><?php echo $row['Last_Name']; ?></td>
					<td><?php echo $row['Department_Id']; ?></td>
					<td><?php echo $row['Role_Id']; ?></td>
					<td><?php echo $row['Login_Name']; ?></td>
				</tr>
				<table>
				<hr>
				<a class="btn btn-success" href="users.php">Back</a>
			<?php
				
				
				}
			}
			else{
				
				echo "failure";
			}
			}
				}
			$connection->close();
				?> 
		</div>
	</div>
</div>
</div>

<?php
include("footer.php"); 
?>
