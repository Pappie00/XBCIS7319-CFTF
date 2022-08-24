<?php
require('header.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($conn,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($conn,$_GET['id']);
		$delete_sql="delete from invoice where id='$id'";
		mysqli_query($conn,$delete_sql);
	}
}

$sql="select * from invoice";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Sales</h4>
				   <h4 class="box-link"><a href="ManageSales.php">Add New Sale</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
                 <th>ID</th>
							   <th>Invoice</th>
							   <th>Vehicle</th>
							   <th>Salesperson</th>
							   <th>Client</th>
							   <th>Status</th>
							   <th></th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['invoiceNum']?></td>
							   <td><?php echo $row['fk_vin']?></td>
							   <td><?php echo $row['fk_salesPersonID']?></td>
							   <td><?php echo $row['fk_clientID']?></td>
							   <td><?php echo $row['statusInvoice']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='ManageSales.php?id=".$row['id']."'>Edit</a></span>&nbsp;";

								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>
