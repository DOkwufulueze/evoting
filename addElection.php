<?php
	include("class.php");
	evoting::db();
	$catVar=!isset($_GET['catVar'])?"":$_GET['catVar'];
	$catVal=!isset($_GET['catVal'])?"":$_GET['catVal'];
	$startDateTime=!isset($_GET['startDateTime'])?"":$_GET['startDateTime'];
	$endDateTime=!isset($_GET['endDateTime'])?"":$_GET['endDateTime'];
	$election=!isset($_GET['election'])?"":$_GET['election'];
	if($startDateTime!=""&&$endDateTime!=""&&$election!=""){
		$today=date("Y-m-d H:i:s");
		$year=substr($startDateTime,0,4);
		$thisYear=substr($today,0,4);
		if($year<$thisYear){
			echo "0";//Year has passed
		}
		else if($year>=$thisYear){
			if(strtotime($startDateTime)<strtotime($today)){
				echo "00";//Date has passed
			}
			else if(strtotime($startDateTime)>strtotime($endDateTime)){
				echo "000";//Start time greater than stop time
			}
			else if(strtotime($startDateTime)==strtotime($endDateTime)){
				echo "0000";//start time equal to stop time
			}
			else{
				$q=mysql_query("SELECT * FROM mng_elec WHERE election_category='$catVar' AND election_category_value='$catVal' AND election_type='$election'") or die(mysql_error());
				$n=mysql_num_rows($q);
				if($n==0){
					mysql_query("INSERT INTO mng_elec(election_category,election_category_value,election_type,start_time,end_time) VALUES('$catVar','$catVal','$election','$startDateTime','$endDateTime')") or die(mysql_error());
					echo "1";
				}
				else if($n>0){
					echo "2";
				}
			}
		}
	}
	else{
		echo "empty";
	}
?>