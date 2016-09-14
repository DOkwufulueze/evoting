<?php
	$dob=!isset($_GET['dob'])?"":$_GET['dob'];
	$dobYear=substr($dob,0,4);
	$today=date("Y-m-d");
	$todayYear=substr($today,0,4);
	if($dobYear<$todayYear){
		$diff=strtotime($today)-strtotime($dob);
		$year=$diff/(60*60*24*365);
		if($year<18){
			echo "1";
		}
		else{
			echo "1";
		}
	}
	else{
		echo "0";
	}
?>