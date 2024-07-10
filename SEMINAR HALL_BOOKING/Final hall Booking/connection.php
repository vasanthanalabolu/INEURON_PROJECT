<?php

$server='localhost';
$username='root';
$password='';
$database='hallbooking';
$link=mysql_connect($server,$username,$password) or die(mysql_error());
if(!$link)
{
	exit('Error: could not establish database connection');
}
mysql_select_db($database, $link) or die("Cant establish connection with the db");
?>
