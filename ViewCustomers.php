<head>

		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Spark Foundation Bank System</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
</head>
<body>

        <?php
		include 'navbar.php';
		?>
        
        <div class="container ">
            
        <h2 style='color:grey' align='center'>View Customers</h2>

       <br>
       <div class="table-responsive-sm">
    <table class="table roundedCorners  tabletext table-hover table-striped table-condensed" >
        <thead>
            <tr>
                
                <th>Id</th>
                <th>Name</th>
                <th>Balance Amount</th>
            </tr>
        </thead>
        <tbody>
        
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error($con));
	mysqli_query($con,"create database if not exists banking") or die(mysqli_error($con));
	
	mysqli_query($con,"use banking") or die(mysqli_error($con));

		$r=mysqli_query($con,"select * from users") or die(mysqli_error($con));
		
	            while($rows = mysqli_fetch_array($r))
            {
        ?>
            <tr>
            
            <td><?php echo $rows[0]; ?></td>
            <td><?php echo $rows[1]; ?></td>
            <td><?php echo $rows[3]; ?> </td>

        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
</body>
</html>