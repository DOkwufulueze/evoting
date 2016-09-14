<?php
	include_once("class.php");
	$fac=!isset($_GET['fac'])?"":$_GET['fac'];
	evoting::getDepartmentsFromFaculty($fac);
?>