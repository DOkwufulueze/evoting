<?php
	include("class.php");
	evoting::db();
	$sch=!isset($_GET['sch'])?"":$_GET['sch'];
	$fac=!isset($_GET['fac'])?"":$_GET['fac'];
	$dept=!isset($_GET['dept'])?"":$_GET['dept'];
	$st=array();
	if($sch!=""&&$fac!=""&&$dept!=""){
		$q=mysql_query("SELECT * FROM mng_fac WHERE sch='$sch' AND fac='$fac'") or die(mysql_error());
		$n=mysql_num_rows($q);
		if($n==0){//No such School and Faculty Combination
			echo "noCode";
		}
		else if($n>0){//School and Faculty Combination exists
			$q=mysql_query("SELECT * FROM mng_dept WHERE sch='$sch' AND fac='$fac' AND dept='$dept' ") or die(mysql_error());
			$nn=mysql_num_rows($q);
			if($nn==0){//No such combination of sch, fac and dept
				mysql_query("INSERT INTO mng_dept(sch,fac,dept) VALUES('$sch','$fac','$dept')") or die(mysql_error());
				echo $code;
			}
			else if($nn>0){//A combination of sch, fac and dept already exists
				echo "2";
			}
			
		}
	}
	else{
		echo "empty";
	}
?>