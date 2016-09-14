<?php
	include("class.php");
	e_voting::db();
	$uname=!isset($_GET['uname'])?"":$_GET['uname'];
	$pwd=!isset($_GET['pwd'])?"":$_GET['pwd'];
	if($uname!=""&&$pwd!=""){
		$q=mysql_query("SELECT * FROM admin WHERE username='$uname' AND password='$pwd'") or die(mysql_error());
		$n=mysql_num_rows($q);
		if($n==0){
			echo "invalid";
		}
		else if($n>0){
			echo "valid";
		}
	}
	else{
		echo "empty";
	}
?>