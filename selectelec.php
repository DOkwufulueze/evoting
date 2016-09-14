<?php
	include("class.php");
	include("ev.inc");
?>
	<div id="dan">
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
		<input type="button" onclick="checkElection()" value="Proceed>>" />
	</div>
	
	
<?php
	include("foot.inc");
?>