<?php
require('header.inc.php');
$invoiceNum='';
$fk_vin='';
$fk_salesPersonID='';
$fk_clientID='';
$statusInvoice='';
$invoiceFile='';

$msg='';
$invoiceFile_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$invoiceFile_required='';
	$id=get_safe_value($conn,$_GET['id']);
	$res=mysqli_query($conn,"select * from invoice where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$invoiceNum=$row['invoiceNum'];
		$fk_vin=$row['fk_vin'];
        $fk_salesPersonID=$row['fk_salesPersonID'];
		$fk_clientID=$row['fk_clientID'];
		$statusInvoice=$row['statusInvoice'];
	}else{
		header('location:ManageSales.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$invoiceNum=get_safe_value($conn,$_POST['invoiceNum']);
	$fk_vin=get_safe_value($conn,$_POST['fk_vin']);
	$fk_salesPersonID=get_safe_value($conn,$_POST['fk_salesPersonID']);
	$fk_clientID=get_safe_value($conn,$_POST['fk_clientID']);

	$res=mysqli_query($conn,"select * from invoice where invoiceNum='$invoiceNum'");
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
		if($_FILES['invoiceFile']['type']!='invoiceFile/png' && $_FILES['invoiceFile']['type']!='invoiceFile/jpg' && $_FILES['invoiceFile']['type']!='invoiceFile/pdf' && $_FILES['invoiceFile']['type']!='invoiceFile/jpeg'){
			$msg="Please select only png,jpg,pdf invoiceFile format";
		}
	}else{
		if($_FILES['invoiceFile']['type']!=''){
				if($_FILES['invoiceFile']['type']!='invoiceFile/png' && $_FILES['invoiceFile']['type']!='invoiceFile/jpg'  && $_FILES['invoiceFile']['type']!='invoiceFile/pdf' && $_FILES['invoiceFile']['type']!='invoiceFile/jpeg'){
				$msg="Please select only png,jpg,pdf invoiceFile format";
			}
		}
	}

	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['invoiceFile']['invoiceNum']!=''){
				$invoiceFile=rand(111111111,999999999).'_'.$_FILES['invoiceFile']['invoiceNum'];
				move_uploaded_file($_FILES['invoiceFile']['tmp_name'],PRODUCT_INVOICE_SERVER_PATH.$invoiceFile);
				$update_sql="update invoice set invoiceNum='$invoiceNum',fk_vin='$fk_vin',invoiceFile='$invoiceFile',fk_salesPersonID='$fk_salesPersonID',fk_clientID='$fk_clientID',statusInvoice='$statusInvoice' where id='$id'";
			}else{
				$update_sql="update invoice set invoiceNum='$invoiceNum',fk_vin='$fk_vin',fk_salesPersonID='$fk_salesPersonID',fk_clientID='$fk_clientID',statusInvoice='$statusInvoice' where id='$id'";
			}
			mysqli_query($conn,$update_sql);
		}else{
			$invoiceFile=rand(111111111,999999999).'_'.$_FILES['invoiceFile']['type'];
			move_uploaded_file($_FILES['invoiceFile']['tmp_name'],PRODUCT_INVOICE_SERVER_PATH.$invoiceFile);
			mysqli_query($conn,"insert into invoice(invoiceNum, fk_vin, fk_salesPersonID, fk_clientID, statusInvoice, invoiceFile) values('$invoiceNum', '$fk_vin', '$fk_salesPersonID', '$fk_clientID', '$statusInvoice', '$invoiceFile')");
		}
		header('location:Sales.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add/Edit A Sale</strong></div>
                        <form method="post" enctype="multipart/form-data">
													<div class="card-body card-block">
															<div class="form-group">
																<label for="categories" class=" form-control-label">Invoice Number </label>
																<input type="text" name="invoiceNum" placeholder="Enter invoice number" class="form-control" required value="<?php echo $invoiceNum?>">
															</div>
															<div class="form-group">
																<label for="categories" class=" form-control-label">Vehicle VIN</label>
																<input type="text" name="fk_vin" placeholder="Enter vehicle identification number" class="form-control" required value="<?php echo $fk_vin?>">
															</div>
															<div class="form-group">
																<label for="categories" class=" form-control-label">Sales Person ID</label>
																<input type="text" name="fk_salesPersonID" placeholder="Enter sales person ID" class="form-control" required value="<?php echo $fk_salesPersonID?>">
															</div>
															<div class="form-group">
																<label for="categories" class=" form-control-label">Client ID</label>
																<input type="text" name="fk_clientID" placeholder="Enter client ID" class="form-control" required value="<?php echo $fk_clientID?>">
															</div>
                                                            <div class="form-group">
																<label for="categories" class=" form-control-label">Invoice Status</label>
																<input type="text" name="statusInvoice" placeholder="Enter Invoice Status" class="form-control" required value="<?php echo $statusInvoice?>">
															</div> 
															<div class="form-group">
																<label for="categories" class=" form-control-label">Upload Invoice</label>
																<input type="file" name="invoiceFile" class="form-control" <?php echo  $invoiceFile_required?>>
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
