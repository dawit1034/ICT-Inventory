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
		if(isset($_POST['insert_status']))
		{
			$Status_Name = $_POST['Status_Name'];
			$result = mysqli_query($connection,"SELECT * FROM  status where Status_Name='$Status_Name'");
			if(mysqli_num_rows($result)>0)
			{
				echo "<div class='alert alert-primary' role='alert'>This status is existed!!</div>";
			}
			else
			{
			$result = mysqli_query($connection,"INSERT INTO status (Status_Name) VALUES ('$Status_Name')");
			if($result==TRUE)
			{
				$i=1;
				$result=mysqli_query($connection,"SELECT * FROM status ORDER by Status_Id DESC");
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
					<td><?php echo $row['Status_Name']; ?></td>
				  </tr>
				<table>
				<hr>
		<?php
			}
			
			}
			}
		}
		if(isset($_POST['update_status']))
		{
			$Status_Id=$_POST['Status_Id'];
			$Status_Name=$_POST['Status_Name'];
			$registrar="UPDATE status SET Status_Name='$Status_Name' WHERE Status_Id='$Status_Id'";
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
						<?php $result=mysqli_query($connection,"SELECT * FROM status where Status_Id='$Status_Id'");
						while($row=$result->fetch_array())
						{ ?>
							<tr>
								<td><?php echo $row['Status_Name']; ?></td>
							</tr>
						</table>
						<hr>
						<?php 
						}
				}
		}		
					
			$connection->close();
				?> 
					<a class="btn btn-success" href="status.php">Back</a>
		</div>
	</div>
</div>
</div>

<?php
include("footer.php"); 
?>


