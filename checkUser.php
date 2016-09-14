<?php
	include("class.php");
	evoting::db();
	$uname=!isset($_GET['uname'])?"":$_GET['uname'];
	$pwd=!isset($_GET['pwd'])?"":$_GET['pwd'];
	$pin=!isset($_GET['pin'])?"":$_GET['pin'];
	$q=mysql_query("SELECT * FROM regUser WHERE username='$uname' AND password=md5('$pwd') AND code='$pin'") or die(mysql_error());
	$n=mysql_num_rows($q);
	if($n==0){//No such user
		echo "0";
	}
	else if($n>0){//user exists
		$row=mysql_fetch_assoc($q);
		$_SESSION['sch']=$row['sch'];
		$_SESSION['fac']=$row['fac'];
		$_SESSION['dept']=$row['dept'];
		$_SESSION['name']=$row['surname']." ".$row['firstname']." ".$row['othername'];
		$_SESSION['pic']=$row['pic'];
		$_SESSION['uname']=$uname;
		$_SESSION['code']=$pin;
		echo "1";
	}
?>