<?php
	include("class.php");
	evoting::db();
	$sch=!isset($_GET['sch'])?"":$_GET['sch'];
	$fac=!isset($_GET['fac'])?"":$_GET['fac'];
	if($sch!=""&&$fac!=""){
		$q=mysql_query("SELECT * FROM mng_sch WHERE sch='$sch'") or die(mysql_error());
		$n=mysql_num_rows($q);
		if($n==0){//No such school
			echo "noCode";
		}
		else if($n>0){//school exists
			$q=mysql_query("SELECT * FROM mng_fac WHERE sch='$sch' AND fac='$fac' ") or die(mysql_error());
			$nn=mysql_num_rows($q);
			if($nn==0){//No such combination of sch and fac
				mysql_query("INSERT INTO mng_fac(sch,fac) VALUES('$sch','$fac')") or die(mysql_error());
				echo "1";
			}
			else if($nn>0){//A combination of sch and fac already exists
				echo "2";
			}
			
		}
	}
	else{
		echo "empty";
	}
?>