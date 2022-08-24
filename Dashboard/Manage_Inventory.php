<?php
require('header.inc.php');
$vin='';
$make='';
$model='';
$year='';
$exteriorColour='';
$interiorColour='';
$options='';
$price='';
$sellPrice='';
$category='';
$image='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($conn,$_GET['id']);
	$res=mysqli_query($conn,"select * from vehicle where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$vin=$row['vin'];
    $make=$row['make'];
    $model=$row['model'];
    $year=$row['year'];
    $exteriorColour=$row['exteriorColour'];
    $interiorColour=$row['interiorColour'];
		$options=$row['options'];
		$price=$row['price'];
		$sellPrice=$row['sellPrice'];
        $category=$row['category'];
	}else{
		header('location:Inventory.php');
		die();
	}
}

if(isset($_POST['submit'])){
    $vin=get_safe_value($conn,$_POST['vin']);
    $make=get_safe_value($conn,$_POST['make']);
    $model=get_safe_value($conn,$_POST['model']);
    $year=get_safe_value($conn,$_POST['year']);
    $exteriorColour=get_safe_value($conn,$_POST['exteriorColour']);
    $interiorColour=get_safe_value($conn,$_POST['interiorColour']);
    $options=get_safe_value($conn,$_POST['options']);
    $price=get_safe_value($conn,$_POST['price']);
    $sellPrice=get_safe_value($conn,$_POST['sellPrice']);
    $category=get_safe_value($conn,$_POST['category']);

	$res=mysqli_query($conn,"select * from vehicle where vin='$vin'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){

			}else{
				$msg="Product already exists";
			}
		}else{
			$msg="Product already exists";
		}
	}


	if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg image format";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg image format";
			}
		}
	}

	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['description']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['description'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update vehicle set vin='$vin',make='$make',model='$model',year='$year',exteriorColour='$exteriorColour',interiorColour='$interiorColour',options='$options',price='$price',sellPrice='$sellPrice', category='$category', image='$image where id='$id'";
			}else{
				$update_sql="update vehicle set vin='$vin',make='$make',model='$model',year='$year',exteriorColour='$exteriorColour',interiorColour='$interiorColour',options='$options',price='$price',sellPrice='$sellPrice', category='$category' where id='$id'";
			}
			mysqli_query($conn,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['type'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($conn,"insert into vehicle(vin,make,model,year,exteriorColour,interiorColour,options,price,sellPrice,category,image) values('$vin','$make','$model','$year','$exteriorColour','$interiorColour','$options','$price','$sellPrice','$category','$image')");
		}
		header('location:Inventory.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add/Edit A Product</strong></div>
                        <form method="post" enctype="multipart/form-data">
													<div class="card-body card-block">
															<div class="form-group">
																<label for="categories" class=" form-control-label">Vehicle Identification Number</label>
																<input type="text" name="vin" placeholder="AAVZBB3CD901726956" class="form-control" required value="<?php echo $vin?>">
															</div>
															<div class="form-group">
																<label for="categories" class=" form-control-label">Make</label>
																<input type="text" name="make" placeholder="Volkswagen" class="form-control" required value="<?php echo $make?>">
															</div>
															<div class="form-group">
																<label for="categories" class=" form-control-label">Model</label>
																<input type="text" name="model" placeholder="Amarok" class="form-control" required value="<?php echo $model?>">
															</div>
															<div class="form-group">
																<label for="categories" class=" form-control-label">Year</label>
																<input type="text" name="year" placeholder="2015" class="form-control" required value="<?php echo $year?>">
															</div>
                                <div class="form-group">
																<label for="categories" class=" form-control-label">Exterior Colour</label>
																<input type="text" name="exteriorColour" placeholder="Grey" class="form-control" required value="<?php echo $exteriorColour?>">
															</div>
                                <div class="form-group">
																<label for="categories" class=" form-control-label">Interior Colour</label>
																<input type="text" name="interiorColour" placeholder="Black" class="form-control" required value="<?php echo $interiorColour?>">
															</div>
                                <div class="form-group">
																<label for="categories" class=" form-control-label">Options/Description</label>
																<input type="text" name="options" placeholder="ONLY 34500KMs, Sunroof, Xenon Lights...." class="form-control" required value="<?php echo $options?>">
															</div>
                                <div class="form-group">
																<label for="categories" class=" form-control-label">Price ($)</label>
																<input type="text" name="price" placeholder="245000.00" class="form-control" required value="<?php echo $price?>">
															</div>
                                <div class="form-group">
																<label for="categories" class=" form-control-label">Sell Price ($)</label>
																<input type="text" name="sellPrice" placeholder="281750.00" class="form-control" required value="<?php echo $sellPrice?>">
															</div>
                                <div class="form-group">
																<label for="categories" class=" form-control-label">Category</label>
																<input type="text" name="category" placeholder="Pick-Up Truck" class="form-control" required value="<?php echo $category?>">
															</div>
															<div class="form-group">
																<label for="categories" class=" form-control-label">Image</label>
																<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
															</div>

							   							<button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   									<span id="payment-button-amount">Submit</span>
							   							</button>
							   					<div class="field_error"><?php echo $msg?></div>
												</div>
											</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>

<?php
require('footer.inc.php');
?>
