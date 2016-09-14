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
		<span id="ms">Manage Departments</span>
		<br/>
		School &nbsp;&nbsp;&nbsp;<select name="sch" id='sch' onchange="popFacsAndDepts(this.options[this.selectedIndex].value,'fac','dept')"><?php evoting::getSchools(); ?></select><br />
		Faculty &nbsp;&nbsp;&nbsp;<select name="fac" id='fac' onchange="popDepts(this.options[this.selectedIndex].value,'dept')"><?php evoting::getFaculties(); ?></select><br />
		Department &nbsp;&nbsp;&nbsp;<select name="dept" id='dept'><?php evoting::getDepartments(); ?></select><br />
		<br/>
		<input type="button" value="Save" onclick="regDept()" />
	</div>
<?php
		include("foot.inc");
	}
?>