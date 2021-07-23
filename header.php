<?php
include("database/connection.php"); 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="fsc.png">
    <!-- Bootstrap CSS -->
    <link href="bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <title>FSC ICT Inventory</title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark bg-dark">
		<div class="container-fluid">
			<img class="navbar-brand" src="fsc.png" style="width:20px;border-radius: 50%;">
			<a class="navbar-brand" href="#">FSC ICT Inventory</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="about.php">About</a>
					</li>
					
				</ul>
				<a class="btn btn-light btn-sm" aria-current="page" href="login.php">login</a>	
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-2">
				
				<div class="card">
					<div class="card-header text-white bg-danger">
						Setting
					</div>
					<div class="card-body">
						<ul class="nav flex-column">
							<li class="nav-item ">
								<a class="nav-link text-dark btn-info" href="status.php">Status</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link text-dark btn-info" href="user_role.php">user role</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link text-dark btn-info" href="users.php">User</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link text-dark btn-info" href="department.php">Department</a>
							</li>
							
						</ul>
					</div>
				</div>			
			</div>
