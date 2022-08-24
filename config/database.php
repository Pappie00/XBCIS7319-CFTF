<?php
/*
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "cftf"; //ENTER DATABASE Name

$conn = new mysqli($hostname, $username, $password, $databasename);

//CHECK CONNECTION STATUS
if ($conn->connect_error)
{
  die("CONNECTION FAILED: " . $conn->connect_error);
}
*/
$server = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'cftf';
$conn = mysql_connect($server, $dbuser, $dbpass);
if (isset($conn))
{
   $dbSelect = mysql_select_db($dbname);
   if (!$dbSelect)
   {
     echo "Problem in selecting database! Please contact administraator";
     die(mysql_error());
   }
}
else
{
   echo "Problem in database connection! Please contact administraator";
   die(mysql_error());
}
?>
