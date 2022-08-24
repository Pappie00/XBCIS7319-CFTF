<?php
require('header.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($conn,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($conn,$_GET['invoiceNum']);
		$delete_sql="delete from invoice where invoiceNum='$invoiceNum'";
		mysqli_query($conn,$delete_sql);
	}
}
$sql="select * from invoice LIMIT 5;";
$res=mysqli_query($conn,$sql);

$sql = "SELECT * from invoice";
if ($result = mysqli_query($conn, $sql)) {
// Return the number of rows in result set
$rowcount = mysqli_num_rows( $result );
}
$sql = "SELECT * from vehicle";
if ($result2 = mysqli_query($conn, $sql)) {
// Return the number of rows in result set
$rowcount = mysqli_num_rows( $result2 );
}
$sql = "SELECT * from orders";
if ($result3 = mysqli_query($conn, $sql)) {
// Return the number of rows in result set
$rowcount = mysqli_num_rows( $result3 );
}
$sql = "SELECT * from customer";
if ($result4 = mysqli_query($conn, $sql)) {
// Return the number of rows in result set
$rowcount = mysqli_num_rows( $result4 );
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>CFTF - Dashboard</title>
    </head>

    <body>
        <div class="container">
          
            <div class="content">
                <div class="cards">
                    <div class="card">
                        <div class="box">
                        <?php
              				while($row=mysqli_fetch_assoc($result)){?>
                            <h1><?php echo $rowcount?></h1>
                            <h3>Total Sales</h3>
                        <?php } ?>
                        </div>
                        <div class="icon-case">
                            <span class="material-icons-sharp">payments</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                        <?php
              				while($row=mysqli_fetch_assoc($result4)){?>
                            <h1><?php echo $rowcount?></h1>
                            <h3>Total Clients</h3>
                        <?php } ?>
                        </div>
                        <div class="icon-case">
                            <span class="material-icons-sharp">account_balance_wallet</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                        <?php
              				while($row=mysqli_fetch_assoc($result2)){?>
                            <h1><?php echo $rowcount?></h1>
                            <h3>Cars in Stock</h3>
                        <?php } ?>
                        </div>
                        <div class="icon-case">
                            <span class="material-icons-sharp">directions_car</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                        <?php
              				while($row=mysqli_fetch_assoc($result3)){?>
                            <h1><?php echo $rowcount?></h1>
                            <h3>Open Orders</h3>
                        <?php } ?>
                        </div>
                        <div class="icon-case">
                            <span class="material-icons-sharp">real_estate_agent</span>
                        </div>
                    </div>
                </div>
                <div class="content-2">
                    <div class="recent-sales">
                        <div class="title">
                            <h2>Recent Sales</h2>
                        </div>
                        <table>
                            <tr>
                                <th>Invoice</th>
                                <th>Vehicle</th>
                                <th>Sales Person</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>CFTF6RGTI</td>
                                <td>Volvo XC90 D5 R-Design</td>
                                <td>FC 865,450</td>
                                <td>Mr. X</td>
                                <td>Samantha Hugo</td>
                                <td><span class="material-icons-sharp">file_download</span></td>
                            </tr>
                            <?php
              				while($row=mysqli_fetch_assoc($res)){?>
                            <tr>
                                <td><?php echo $row['invoiceNum']?></td>
                                <td><?php echo $row['fk_vin']?></td>
                                <td><?php echo $row['fk_salesPersonID']?></td>
                                <td><?php echo $row['fk_clientID']?></td>
                                <td><?php echo $row['statusInvoice']?></td>
                                <td><span class="material-icons-sharp">file_download</span></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
