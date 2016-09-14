<?php
	include("class.php");
	e_voting::db();
	$which=htmlentities($_POST['which']);
	$type=htmlentities($_POST['type']);
	if($which!=""){
		$wch=htmlentities($_POST["$which"]);
		echo "<script>document.location.href='.?pg=userlogin&type=$type&code=$which&value=$wch'</script>";
	}
?>