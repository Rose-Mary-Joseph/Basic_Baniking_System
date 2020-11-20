<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Customers</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Spark Foundation Banking System</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <<script src="js/bootstrap.min.js"></script>      
</head>

<?php
	include 'navbar.php';
?>

<body >
<?php

$con=mysqli_connect("localhost","root","") or die(mysqli_error($con));
mysqli_query($con,"create database if not exists banking") or die(mysqli_error($con));
	
mysqli_query($con,"use banking") or die(mysqli_error($con));
$rs=mysqli_query($con,"select * from users") or die(mysqli_error($con));

?>

<div class="container ">
           
        <h2 style='color:grey' align='center'>Transfer Money</h2>
        <br>

            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table roundedCorners tabletext  table-sm ">
                       
                        <tbody>
<?php	  
$r=mysqli_query($con,"select * from users") or die(mysqli_error($con));
	while($row=mysqli_fetch_array($r))
	{
		?>
	                    <tr>
                        
                        <td ><?php echo $row[0] ?></td>
                        <td ><?php echo $row[1]?></td>
                        <td ><?php echo $row[2]?></td>
                        <td ><?php echo $row[3]?></td>
                        <td ><a href="TransferProcess.php?id= <?php echo $row['ID'] ;?>"> <button class="btn btn-success btn-lg active">Transfer</button></a></td>
                    </tr>
                <?php
                    
                
		
	}	
	mysqli_close($con); 

?>
			</tbody>
                    </table>
                    </div>
                </div>
            </div>
           </div>

</body>
</html>
