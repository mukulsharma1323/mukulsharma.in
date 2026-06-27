<?php
	session_start();
	if (isset($_SESSION["name"]))
	{}
	else
	{
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
	<title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	</head>
	<body>
	<div class="alert alert-info clearfix">
    <a href="logout.php" class="btn btn-primary btn-md float-right">Log Out</a> 
</div>
	<h2 style="text-align: center;" >Hello Admin</h2>
	<br>
	<div class="container-fluid">
		<p>Dashboard content</p>
	</div>
	</body>
</html>