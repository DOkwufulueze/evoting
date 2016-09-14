<?php
	include("class.php");
	e_voting::db();
	$uploads="C:/wamp/www/e-voting/candidates/";
	$wch=!isset($_GET['wch'])?"":$_GET['wch'];
	if($wch=="federal_constituency"){
		$q=mysql_query("SELECT * FROM mng_fed ") or die(mysql_error());
		$n=mysql_num_rows($q);
		if($n>0){
			echo "<select name='$wch' id='$wch'>";
			while($r=mysql_fetch_array($q)){
				echo "<option value='".$r['code']."'>".$r['fd_name']."</option>";
			}
			echo "</select>";
		}
		else{
			echo "0";
		}
	}
	else if($wch=="lga_name"){
		$q=mysql_query("SELECT * FROM mng_lga ") or die(mysql_error());
		$n=mysql_num_rows($q);
		if($n>0){
			echo "<select name='$wch' id='$wch'>";
			while($r=mysql_fetch_array($q)){
				echo "<option value='".$r['code']."'>".$r['lga_name']."</option>";
			}
			echo "</select>";
		}
		else{
			echo "0";
		}
	}
	else if($wch=="senatorial_constituency"){
		$q=mysql_query("SELECT * FROM mng_sen ") or die(mysql_error());
		$n=mysql_num_rows($q);
		if($n>0){
			echo "<select name='$wch' id='$wch'>";
			while($r=mysql_fetch_array($q)){
				echo "<option value='".$r['code']."'>".$r['sc_name']."</option>";
			}
			echo "</select>";
		}
		else{
			echo "0";
		}
	}
	else if($wch=="state"){
		$q=mysql_query("SELECT * FROM mng_state ") or die(mysql_error());
		$n=mysql_num_rows($q);
		if($n>0){
			echo "<select name='$wch' id='$wch'>";
			while($r=mysql_fetch_array($q)){
				echo "<option value='".$r['code']."'>".$r['state']."</option>";
			}
			echo "</select>";
		}
		else{
			echo "0";
		}
	}
?>