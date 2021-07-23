<?php
	include('session.php');
?>
<div class="col-8">
	<div class="card">
		<div class="card-header text-white bg-success">
			Faculty Registration
		</div>
		<div class="card-body">	
		<?php
		if(isset($_POST['insert_department']))
		{
			$Department_Name = $_POST['Department_Name'];
			$result = mysqli_query($connection,"SELECT * FROM  department where Department_Name='$Department_Name'");
			if(mysqli_num_rows($result)>0)
			{
				echo "<div class='alert alert-primary' role='alert'>This status is existed!!</div>";
			}
			else
			{
			$result = mysqli_query($connection,"INSERT INTO department (Department_Name) VALUES ('$Department_Name')");
			if($result==TRUE)
			{
				$i=1;
				$result=mysqli_query($connection,"SELECT * FROM department ORDER by Department_Id DESC");
				while($row=$result->fetch_array()){
				$i=$i+1;
				if($i>2)
				break;
				?>
				<div class="alert alert-primary" role="alert">
				The Status is registered successfully!!
				</div><br>
				<table class="table">
					  <tr class="table-dark">
					<th>Status Name</th>
				  </tr>
				  <tr>
					<td><?php echo $row['Department_Name']; ?></td>
				  </tr>
				<table>
				<hr>
		<?php
			}
			
			}
			}
		}
		if(isset($_POST['update_department']))
		{
			$Department_Id=$_POST['Department_Id'];
			$Department_Name=$_POST['Department_Name'];
			$registrar="UPDATE department SET Department_Name='$Department_Name' WHERE Department_Id='$Department_Id'";
			$result=mysqli_query($connection,$registrar) or die(mysqli_error());
			if($result==true)
				{	
				?>
				<div class="alert alert-info" role="alert">
					The Status is Updated successfully!!
				</div>
					<table class="table">
						<tr class="table-dark">
							<th>Status Name</th>
						</tr>
						<?php $result=mysqli_query($connection,"SELECT * FROM department where Department_Id='$Department_Id'");
						while($row=$result->fetch_array())
						{ ?>
							<tr>
								<td><?php echo $row['Department_Name']; ?></td>
							</tr>
						</table>
						<hr>
						<?php 
						}
				}
		}		
					
			$connection->close();
				?> 
					<a class="btn btn-success" href="department.php">Back</a>
		</div>
	</div>
</div>
</div>

<?php
include("footer.php"); 
?>


