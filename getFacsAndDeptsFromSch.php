<?php
	include_once("class.php");
	$sch=!isset($_GET['sch'])?"":$_GET['sch'];
	evoting::getFacultiesAndDepartmentsFromSchool($sch);
?>