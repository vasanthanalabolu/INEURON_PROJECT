<?php
include ('connection.php');
session_start();
if(isset($_POST['hall'])&&
   isset($_POST['namep'])&&  
   isset($_POST['date'])&&
   
   isset($_POST['time'])&&
   isset($_POST['purpose'])&&
   isset($_POST['fname'])&&
   isset($_POST['lname'])&&
   isset($_POST['roll'])&&
   isset($_POST['no'])&&
   isset($_POST['dpt']))
{ $hal=$_POST['hall'];
  $np=$_POST['namep'];
  $d=$_POST['date'];
  $tm=$_POST['time'];
  $p=$_POST['purpose'];
  $fn=$_POST['fname'];
  $ln=$_POST['lname'];
  $rollno=$_POST['roll'];
  $no=$_POST['no'];
  $dept=$_POST['dpt'];
  if(!empty($hal)&&!empty($np)&&!empty($d)&&!empty($tm)&&!empty($p)&&!empty($fn)&&!empty($ln)&&!empty($rollno)&&!empty($no)&&!empty($dept))
  { 
     $q='select * from halls where Hall = "'.$hal.'" AND Date = "'.$d.'"';
  $res=mysql_query($q) or die(mysql_error());
  $num=mysql_num_rows($res);
   if($num==1)
   { header('location:finishfail.php');
   } 
   else
   {
	    $query="INSERT INTO `halls` VALUES('".mysql_real_escape_string($hal)."','".mysql_real_escape_string($d)."','".mysql_real_escape_string($fn)."','".mysql_real_escape_string($ln)."','".mysql_real_escape_string($rollno)."','".mysql_real_escape_string($no)."','".mysql_real_escape_string($dept)."')";																																																																																																																												
	 if($query_run=mysql_query($query) or die(mysql_error()))
	  { 
	    header('location:finish.php');
	  }
	  else
	  { echo 'Sorry, Try again later.';
	  }
   }
 }
  
  else
  { echo 'All fields are required.';
  }
  
}

?>