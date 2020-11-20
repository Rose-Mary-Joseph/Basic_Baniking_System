<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Spark Foundation Banking System</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
<?php 
include 'navbar.php';  
?>      
</head>
<?php

include 'Database.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amnt = $_POST['amount'];

    $sql = "SELECT * from users where ID=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users where ID=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);

 if($amnt > $sql1[3])
    {

        echo '<script type="text/javascript">';
        echo ' alert("Dont have much balance Balance")';  
        echo '</script>';
    }

     else if($amnt == 0){
         echo "<script type='text/javascript'>alert('Invalid Transfer');
    </script>";
     }
    else {

        
        $balance =$sql1[3] -$amnt;
        $sql = "UPDATE users set Amount=$balance where ID=$from";
        mysqli_query($con,$sql);



        $balance =$sql2[3] +$amnt;
        $sql = "UPDATE users set Amount=$balance where ID=$to";
        mysqli_query($con,$sql);

		
        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];
        $det="INSERT INTO transactions('Sender', 'Seceiver', 'Amount') VALUES ('$sender','$receiver','$amnt')";
        $detsubmit=mysqli_query($con,$det);
        if($det){
           echo "<script type='text/javascript'>
                    alert('Transaction Successfull!');
                    
                </script>";
        }
        
        
       $balance= 0;
       $amnt =0; 
    }

}

?>


<body>
       
        <div class="container ">
        
        <h2>Transfer Process</h2>
        
            <?php
                include 'Database.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where ID=$sid";
                $query=mysqli_query($con,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($con);
                }
                $rows=mysqli_fetch_array($query);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br/>
        <label> From: </label><br/>
        <div>
            <table class="table roundedCorners  tabletext table-hover  table-striped table-condensed astyle"  >
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance Amount</th>
                </tr>
                <tr>
                    <td><?php echo $rows[0] ?></td>
                    <td><?php echo $rows[1] ?></td>
                    <td><?php echo $rows[2] ?></td>
                    <td><?php echo $rows[3] ?></td>
                </tr>
            </table>
        </div>
        <br/><br/><br/>
        <label>To:</label>
        <select class=" form-control"   name="to" style="margin-bottom:5%;" required>
            <option value="" disabled selected> </option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where ID!=$sid";
                $query=mysqli_query($con,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($con);
                }
                while($rows = mysqli_fetch_array($query)) {
            ?>
                <option class="table text-center table-striped " value="<?php echo $rows['ID'];?>" >

                    <?php echo $rows[1] ;?>
                   

                </option>
            <?php
                }
            ?>
        </select> <br/><br/><br/>
            <label>Amount:</label>
            <input type="number" id="amm" class="form-control" name="amount" min="0" required  />  <br/><br/>
                <div class="text-center btn3" >
            <button class="btn btn-success btn-lg active" name="submit" type="submit" id="mybtn" style="margin-left:5%">Proceed</button>
            </div>
        </form>
    </div>
 </body>      
</html>