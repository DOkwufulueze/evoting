<html>
<head>
	<link rel="stylesheet" type="text/css" href="cascade.css" />
	<script type="text/javaScript" src="fn.js"></script>
	<script type="text/javaScript" src="jq/jq.js"></script>
	<title>LASU e-Voting System</title>
</head>
<body>
<div id="wrap">
	<div id="wrap1" style="margin-left:200px;">
		<div id="head">
		</div>
		<div id="menu">
			<a href=".?pg=home" class="aref">Home</a> | 
			<a href=".?pg=reg" class="aref">Register</a>| 
			<a href=".?pg=userlogin" class="aref">Vote</a> | 
			<a href=".?pg=reportPublic" class="aref">Election Report</a> | 
			<a href="#" class="aref">FAQ</a> | 
			<a href="#" class="aref">Help</a> 
			<span style="float:right">
				<input type="text" name="srch" id="srch" /><input type="button" value="Search Voters" onclick="showVoter('<?php echo !isset($_GET['pg'])?'':$_GET['pg']; ?>')" />
			</span>
		</div>
		
	
	