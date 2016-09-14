<?php
	include("class.php");
	evoting::db();
	$srch=!isset($_GET['srch'])?"":$_GET['srch'];
	$pg=!isset($_GET['pg'])?"":$_GET['pg'];
	$q=mysql_query("SELECT * FROM regUser WHERE username='$srch' OR firstname LIKE '%$srch%' OR surname LIKE '%$srch%' OR othername LIKE '%$srch%' OR date like '%$srch%'") or die(mysql_error());
	$n=mysql_num_rows($q);
	if($n==0){//No such user
		echo "nil";
	}
	else if($n>0){//user exists
		$r=mysql_fetch_assoc($q);
		$uname=$r['username'];
		$name=$r['surname']." ".$r['firstname']." ".$r['othername'];
		$date=$r['date'];
		$dob=$r['dob'];
		echo "The voter you searched for is shown below<br />";
		echo "<div style='clear:both;'><span style='width:auto;'><b>Username</b>: $uname</span></div>";
		echo "<div style='clear:both;'><span style='width:auto;'><b>Name</b>: $name</span></div>";
		echo "<div style='clear:both;'><span style='width:auto;'><b>Date of Registration</b>: $date</span></div>";
		echo "<div style='clear:both;'><span style='width:auto;'><b>Date of Birth</b>: $dob</span></div>";
		echo "<div style='clear:both;'><span style='width:auto;'><button onclick=\"document.location.href='?pg=$pg'\" >Back</button></span></div>";
	}
?>