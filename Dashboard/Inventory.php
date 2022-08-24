<?php
require('header.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($conn,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($conn,$_GET['id']);
		$delete_sql="delete from vehicle where id='$id'";
		mysqli_query($conn,$delete_sql);
	}
}

$sql="select * from vehicle";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Vehicle Inventory </h4>
				   <h4 class="box-link"><a href="Manage_Inventory.php">Add New Vehicle</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>ID</th>
							   <th>VIN</th>
							   <th>Make</th>
                 <th>Model</th>
                 <th>Year</th>
                 <th>Exterior Colour</th>
                 <th>Interior Colour</th>
                 <th>Options</th>
                 <th>Price ($)</th>
							   <th>Sell Price ($)</th>
                 <th>Category</th>
                  <!--<th>Image</th> -->

							   <th></th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['vin']?></td>
							   <td><?php echo $row['make']?></td>
                 <td><?php echo $row['model']?></td>
                 <td><?php echo $row['year']?></td>
                 <td><?php echo $row['exteriorColour']?></td>
                 <td><?php echo $row['interiorColour']?></td>
                 <td><?php echo $row['options']?></td>
                 <td><?php echo $row['price']?></td>
							   <td><?php echo $row['sellPrice']?></td>
                 <td><?php echo $row['category']?></td>
							   <!-- <td><img src="<?php // echo $row["image"]; ?>" width="50px" height="50px"></td> -->
                 <td></td>
							   <td>
                  <?php
                  echo "<span class='badge badge-edit'><a href='Manage_Inventory.php?id=".$row['id']."'>Edit</a></span>&nbsp;";

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
