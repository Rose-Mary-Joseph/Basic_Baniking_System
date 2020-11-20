<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database</title>
</head>

<body>

 <?php
		
	$con=mysqli_connect("localhost","root","") or die(mysqli_error($con));
	mysqli_query($con,"create database if not exists banking") or die(mysqli_error($con));
	mysqli_query($con,"use banking") or die(mysqli_error($con));
?>
</body>
</html>