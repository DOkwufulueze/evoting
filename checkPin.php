<?php
	include("class.php");
	e_voting::db();
	$pin=!isset($_GET['pin'])?"":$_GET['pin'];
	$q=mysql_query("SELECT * FROM pins WHERE pin='$pin'") or die(mysql_error());
	$n=mysql_num_rows($q);
	if($n==0){//No such pin code
			echo "0";
	}
	else if($n>0){//pin code exists
		while($rr=mysql_fetch_array($q)){
			$st[]=$rr['status'];
		}
		$status=$st[0];
		if($status=="Used"){//Used Pin
			echo "2";
		}
		/*else{//Valid Pin
			echo "1";
		}*/	
	}
?>