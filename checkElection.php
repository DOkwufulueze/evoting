<?php
	include("class.php");
	evoting::db();
	$catVal=!isset($_GET['catVal'])?"":$_GET['catVal'];
	$catVar=!isset($_GET['catVar'])?"":$_GET['catVar'];
	$election=!isset($_GET['election'])?"":$_GET['election'];
	$uname=!isset($_SESSION['uname'])?"":$_SESSION['uname'];
	$sch=!isset($_SESSION['sch'])?"":$_SESSION['sch'];
	$fac=!isset($_SESSION['fac'])?"":$_SESSION['fac'];
	$dept=!isset($_SESSION['dept'])?"":$_SESSION['dept'];
	$qq=mysql_query("SELECT * FROM mng_elec WHERE election_category='$catVar' AND election_category_value='$catVal' AND election_type='$election'") or die(mysql_error());
	$n=mysql_num_rows($qq);
	if($n==0){//No such election
		echo "0";
	}
	else if($n>0){//election exists
		while($rows=mysql_fetch_array($qq)){
			$startDateTime=$rows['start_time'];
			$endDateTime=$rows['end_time'];
			$today=date("Y-m-d H:i:s");
			$year=substr($startDateTime,0,4);
			$thisYear=substr($today,0,4);
			if(strtotime($today)>strtotime($endDateTime)){
				echo "00";//Date has passed
			}
			else if(strtotime($startDateTime)>strtotime($today)){
				echo "000";//Not yet time to vote
			}
			else{
				$q=mysql_query("SELECT * FROM mng_elec WHERE election_category='$catVar' AND (election_category_value='$sch'||election_category_value='$fac'||election_category_value='$dept') AND election_type='$election'") or die(mysql_error());
				$n=mysql_num_rows($q);
				if($n==0){//Voter not qualified for this election
					echo "0000";
				}
				else{
					$q=mysql_query("SELECT * FROM vote WHERE username='$uname' AND election_category='$catVar' AND election_category_value='$catVal' AND election_type='$election'") or die(mysql_error());
					$n=mysql_num_rows($q);
					if($n>0){//Voter already voted for this category
						echo "00000";
					}
					else{
						$_SESSION['catVal']=$catVal;
						$_SESSION['catVar']=$catVar;
						$_SESSION['type']=$election;
						$_SESSION['voteTime']=$today;
						echo "1";
					}
				}
			}
		}
	}
?>