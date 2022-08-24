<?php
require('connection.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($conn,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($conn,$_GET['invoiceNum']);
		$delete_sql="delete from orders where invoiceNum='$invoiceNum'";
		mysqli_query($conn,$delete_sql);
	}
}
$sql="select * from orders;";
$res=mysqli_query($conn,$sql);
?>
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
    <div class="side-menu">
            <ul>
                <br><br><br><br>
                <li>
                  <a href="index.php">
                    <span class="material-icons-sharp">dashboard</span>
                    <span>Dashboard</span>
                </a>
                </li>
                <li>
                  <a href="Orders.php">
                    <span class="material-icons-sharp">task</span>
                    <span>Orders</span>
                  </a>
                </li>
                <li>
                  <a href="Sales.php">
                    <span class="material-icons-sharp">point_of_sale</span>
                    <span>Sales</span>
                  </a>
                </li>
                <li>
                  <a href="Inventory.php">
                    <span class="material-icons-sharp">inventory_2</span>
                    <span>Inventory</span>
                  </a>
                </li>
                <li>
                  <a href="">
                    <span class="material-icons-sharp">person_outline</span>
                    <span>Profile</span>
                  </a>
                </li>
                <br><br><br><br>
                <li>
                  <a href="logout.php">
                    <span class="material-icons-sharp">logout</span>
                    <span>Logout</span>
                  </a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="content">
            <div class="content-2">
                    <div class="recent-sales">
                        <div class="title">
                            <h2>Orders</h2>
                            <a href="Manage_Inventory.php" class="btn">Add New Order</a>
                        </div>
                        <table>
                            <tr>
                                <th>Order Number</th>
                                <th>Status</th>
                                <th>Client</th>
                                <th>Vehicle</th>
                                <th>Sales Person</th>
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
                                <td><?php echo $row['orderNum']?></td>
                                <td><?php echo $row['statusOrder']?></td>
                                <td><?php echo $row['fk_clientID']?></td>
                                <td><?php echo $row['fk_vin']?></td>
                                <td><?php echo $row['fk_SalesPersonID']?></td>
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
