<?php 
session_start();
require_once('database/connection.php');
if(isset($_POST['login'])){
	if(!empty($_POST['Login_Name']) && !empty($_POST['Password']))
	{
		$Login_Name = trim($_POST['Login_Name']);
		$Password = trim($_POST['Password']);
		
		$Password = md5($Password);
		
		$sql = "select * from user where Login_Name = '".$Login_Name."' and Password = '".$Password."'";
		$rs = mysqli_query($connection,$sql);
		$getNumRows = mysqli_num_rows($rs);
		
		if($getNumRows == 1)
		{
			$getUserRow = mysqli_fetch_assoc($rs);
			unset($getUserRow['Password']);
			
			$_SESSION = $getUserRow;
						
			header('location:index.php');
			exit;
		}
		else
		{
			$errorMsg = "Username and Password not correct!!";
		}
	}
}

if(isset($_GET['logout']) && $_GET['logout'] == true)
{
	session_destroy();
	header("location:login.php");
	exit;
}


if(isset($_GET['lmsg']) && $_GET['lmsg'] == true)
{
	$errorMsg = "Please enter your credentials to login.";
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="fsc.png">
<link rel="stylesheet" href="loginstyle.css">
<title> </title>
</head>
<body>
  
    <div class="login-page">
      <div class="form">
		<div class="imgcontainer">
			<img src="fsc.png" alt="logo" class="logo">
		</div>
        <div class="login">
          <div class="login-header">
		 
            <h3> <hr>LOGIN <hr></h3>
            
          </div>
        </div>
		
		<?php 
			if(isset($errorMsg))
				{
					echo '<p class="outset">';
					echo $errorMsg;
					echo '</p>';
					unset($errorMsg);
					}
				?>		
		
        <form action="<?php echo $_SERVER['PHP_SELF']?>" class="login-form" method="POST">
          <input type="text" name="Login_Name" id="Login_Name" placeholder="user_name">
          <input type="password" name="Password" id="Password" placeholder="password">
		  <input type="submit" value="login" name="login">
          
        </form>
      </div>
    </div>

</body>
</html>