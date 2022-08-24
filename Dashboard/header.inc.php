<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:login.php');
	die();
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>CFTF - Dashboard</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
      <br><br><br>
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">


                  <li class="menu-item-has-children dropdown">
                     <a href="index.php" > Dashboard</a>
                  </li>
				      <li class="menu-item-has-children dropdown">
                     <a href="Orders.php" > Orders</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="Sales.php" > Sales</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="Inventory.php" > Inventory</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="Users.php" > Profile</a>
                  </li>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header" height="200px">
            <div class="top-left">
               <div class="navbar-header">
								 	<a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
									<a>        </a>
                  <a class="navbar-brand" href="index.php"><img src="Images/logo-bl-null.png" alt="Home" width="40%" height="100%" style="padding:5%"></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
               </div>
            </div>
         </header>
