<?php
include ('connection.php');
session_start();
$d=$_POST['date'];

$q='select * from halls where Date = "'.$d.'"';
$res=mysql_query($q) or die(mysql_error());
$row=mysql_fetch_array($res);
$num=mysql_num_rows($res);
if($num>0)
{
$_SESSION['success']=TRUE;
echo $row['Hall'];
header('location:checkhalls.php');
}
else
{
$_SESSION['fail']=TRUE;
header('location:check.php');
}
?>