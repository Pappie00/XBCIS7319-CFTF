<?php
session_start();
//connecting to the database
$conn=mysqli_connect("localhost","root","","cftf");

//Creating file/server paths for retrieving files and data
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/CFTF-Test2/admin/');
define('SITE_PATH','http://localhost/CFTF-Test2/admin/');

//Creating file paths for uploading and editing images
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'config/product-images/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'config/product-images/');
//Creating file paths for uploading and editing invoices
define('PRODUCT_INVOICE_SERVER_PATH',SERVER_PATH.'config/product-invoice/');
define('PRODUCT_INVOICE_SITE_PATH',SITE_PATH.'config/product-invoice/');
?>
