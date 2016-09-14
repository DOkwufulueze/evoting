<?php
	include("class.php");
	$uname=!isset($_SESSION['uname'])?"":$_SESSION['uname'];
	if($uname==""){
		echo "<script>document.location.href='.?&msg=Invalid Access to Admin Page $uname!'</script>";
	}
	else if($uname!=""){//isset($_SESSION['uname'])&&$_SESSION['uname']!=""){
		include("ev.inc");
?>
<?php
		include("AdminH.inc");
?>
		<div id="man-1">
			<?php echo !isset($_GET['msg'])?"":$_GET['msg']; ?><br/><br/>
			<div id="conf">
				&nbsp;
			</div>
			<span id="ms">Manage School</span>
			<br/>
			School Name:
			<select name="sch" id='sch'><?php evoting::getSchools(); ?></select>
			<br/>
			<input type="button" value="Save" onclick="regSch()" />
		</div>
<?php
		include("foot.inc");
	}
?>