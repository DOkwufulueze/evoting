<?php
	include("class.php");
	include("ev.inc");
?>
<?php
	include("AdminH.inc");
?>

	<div id="man-1">
		<div id="conf">
				&nbsp;
		</div>
		<span id="ms">Manage Election</span>
		<br/>
		<fieldset>
			<legend> Election Category</legend>
			<input type="radio" name="cat" id="schCat" value="School" onclick="if(this.checked){document.getElementById('schDiv').style.display='block';document.getElementById('facDiv').style.display='none';document.getElementById('deptDiv').style.display='none';document.getElementById('catVar').value='School';}" /><label  for="schCat">School</label> &nbsp;&nbsp;&nbsp;
			
			<input type="radio" name="cat" id="facCat" onclick="if(this.checked){document.getElementById('schDiv').style.display='none';document.getElementById('facDiv').style.display='block';document.getElementById('deptDiv').style.display='none';document.getElementById('catVar').value='Faculty';}" /><label  for="facCat">Faculty</label> &nbsp;&nbsp;&nbsp;
			
			<input type="radio" name="cat" id="deptCat" onclick="if(this.checked){document.getElementById('schDiv').style.display='none';document.getElementById('facDiv').style.display='none';document.getElementById('deptDiv').style.display='block';document.getElementById('catVar').value='Department';}" /><label  for="deptCat">Department</label><br />
			<div id="schDiv" style="display:none">
				<select name="sch" id="sch" onchange="document.getElementById('catVal').value=this.options[this.selectedIndex].value;">
					<?php evoting::getElectionSchools();?>
				</select>
			</div>
			<div id="facDiv" style="display:none">
				<select name="fac" id="fac" onchange="document.getElementById('catVal').value=this.options[this.selectedIndex].value;">
					<?php evoting::getElectionFaculties();?>
				</select>
			</div>
			<div id="deptDiv" style="display:none">
				<select name="dept" id="dept" onchange="document.getElementById('catVal').value=this.options[this.selectedIndex].value;">
					<?php evoting::getElectionDepartments();?>
				</select>
			</div>
			<input type="hidden" name="catVar" id="catVar" />
			<input type="hidden" name="catVal" id="catVal" />
		</fieldset>
		<br />
		Election Type:
		<select name="election" id="election" >
			<?php
				evoting::popElectionTypes();
			?>
		</select>
		<br/>
		Election Date:
		<input type="text" name="day" id="day" size="2" value="DD" onfocus="clears('day')" onblur="clears2('day')" />&nbsp;&nbsp; - &nbsp;&nbsp;<input type="text" name="month" id="month" size="2" value="MM" onfocus="clears('month')" onblur="clears2('month')" />&nbsp;&nbsp; - &nbsp;&nbsp;<input type="text" name="year" id="year" size="4" value="YYYY" onfocus="clears('year')" onblur="clears2('year')" />
		<br/>
		 Start Time:
		<input type="text" name="s_hour" id="s_hour" size="2" value="HH" onfocus="clears('s_hour')" onblur="clears2('s_hour')" />&nbsp;&nbsp; : &nbsp;&nbsp; <input type="text" name="s_minute" id="s_minute" size="2" value="mm" onfocus="clears('s_minute')" onblur="clears2('s_minute')" />&nbsp;&nbsp; : &nbsp;&nbsp;<input type="text" name="s_second" id="s_second" size="2" value="ss" onfocus="clears('s_second')" onblur="clears2('s_second')" />
		<br/>
		 End Time:
		<input type="text" name="e_hour" id="e_hour" size="2" value="HH" onfocus="clears('e_hour')" onblur="clears2('e_hour')" />&nbsp;&nbsp; : &nbsp;&nbsp;<input type="text" name="e_minute" id="e_minute" size="2" value="mm" onfocus="clears('e_minute')" onblur="clears2('e_minute')" />&nbsp;&nbsp; : &nbsp;&nbsp;<input type="text" name="e_second" id="e_second" size="2" value="ss" onfocus="clears('e_second')" onblur="clears2('e_second')" />
		<br/>
		<input type="button" value="Save" onclick="regElection()" />
	</div>
<?php
	include("foot.inc");
?>