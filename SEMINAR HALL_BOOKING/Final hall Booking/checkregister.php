<?php
include ('connection.php');
session_start();
if(isset($_POST['name'])&&
   isset($_POST['rollno'])&&
   isset($_POST['userid'])&&
   isset($_POST['password'])&&
   isset($_POST['password2'])&&
   isset($_POST['dpt'])&&
   isset($_POST['mail'])&&
   isset($_POST['phoneno']))
{ $uname=$_POST['name'];
  $roll=$_POST['rollno'];
  $uid=$_POST['userid'];
  $pwd=$_POST['password'];
  $pwd2=$_POST['password2'];
  $dept=$_POST['dpt'];
  $wmail=$_POST['mail'];
  $no=$_POST['phoneno'];
  if(!empty($uname)&&!empty($roll)&&!empty($uid)&&!empty($pwd)&&!empty($pwd2)&&!empty($dept)&&!empty($wmail)&&!empty($no))
  { if($pwd!=$pwd2)
  { echo'Passwords do not match.';
  }
  else
  { $query ='select UserId from user where UserId = "'.$uid.'"';
    $query_run=mysql_query($query) or die(mysql_error());
    if(mysql_num_rows($query_run)==1)
	{ echo 'Username already exists.';
	}
	else
	{ $query="INSERT INTO `user` VALUES('".mysql_real_escape_string($uname)."','".mysql_real_escape_string($roll)."','".mysql_real_escape_string(      $uid)."','".mysql_real_escape_string($pwd)."','".mysql_real_escape_string($dept)."','".mysql_real_escape_string($wmail)."','".		mysql_real_escape_string($no)."')";
	  if($query_run=mysql_query($query) or die(mysql_error()))
	  { $_SESSION['user']=$uid;
	    header('location:home.php');
	  }
	  else
	  { echo 'Sorry, Try again later.';
	  }
	}
  }
  }
  else
  { echo 'All fields are required.';
  }
}
?>