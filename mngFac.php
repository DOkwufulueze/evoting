<?php
	include("class.php");
	$uname=!isset($_SESSION['uname'])?"":$_SESSION['uname'];
	if($uname==""){
		echo "<script>document.location.href='.?&msg=Invalid Access to Admin Page $uname!'</script>";
	}
	else if($uname!=""){
		include("ev.inc");
?>
<?php
	include("AdminH.inc");
?>

	<div id="man-1">
		<div id="conf">
				&nbsp;
		</div>
		<span id="ms">Manage Faculties</span>
		<br/>
		School &nbsp;&nbsp;&nbsp;<select name="sch" id='sch' onchange="popFacsAndDepts(this.options[this.selectedIndex].value,'fac','dept')"><?php evoting::getSchools(); ?></select><br /><br />
		Faculty &nbsp;&nbsp;&nbsp;<select name="fac" id='fac'><?php evoting::getFaculties(); ?></select>
		<br />
		<input type="button" value="Save" onclick="regFac()" />
	</div>
<?php
		include("foot.inc");
	}
?>
