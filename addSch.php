<?php
	include("class.php");
	evoting::db();
	$sch=!isset($_GET['sch'])?"":$_GET['sch'];
	if($sch!=""){
		$q=mysql_query("SELECT * FROM mng_sch WHERE sch='$sch'") or die(mysql_error());
		$n=mysql_num_rows($q);
		if($n==0){
			mysql_query("INSERT INTO mng_sch(sch) VALUES('$sch')") or die(mysql_error());
			echo "1";
		}
		else if($n>0){
			echo "2";
		}
	}
	else{
		echo "empty";
	}
?>