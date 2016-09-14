<?php
	include("class.php");
	include("ev.inc");
?>
<?php
	include("AdminH.inc");
?>
<?php echo $msg=!isset($_GET['msg'])?"":$_GET['msg']; ?><br />
		<?php
			if($msg=="Candidate Successfully Registered!"){
				$candidate_id=!isset($_GET['candidate_id'])?"":$_GET['candidate_id'];
				evoting::db();
				$uploads="candidates/";
				$q=mysql_query("SELECT * FROM mng_candi WHERE candidate_id='$candidate_id'")or die(mysql_error());
				$n=mysql_num_rows($q);
				if($n>0){
					echo "<span>";
					echo "<table border='0' cellspacing='15'><tr/><th>Candidate Name</th><th>Election For</th><th>Candidate Image</th></tr>";
					while($r=mysql_fetch_array($q)){
						$catVar=$r['election_category'];
						$dept=$r['dept'];
						$fac=$r['fac'];
						$sch=$r['sch'];
						$catVal="";
						if($catVar=="Department"){
							$catVal=$dept;
						}
						if($catVar=="Faculty"){
							$catVal=$fac;
						}
						if($catVar=="School"){
							$catVal=$sch;
						}
						echo "<tr><td>".$r['candidate_name']."</td><td>".$catVal."</td><td><img src='".$uploads.$r['candidate_image']."' width='100' height='100' /></td></tr>";
					}
					echo "</table></span><br />";
				}
			}
		?>
	<div id="man-1">
		<div id="conf">&nbsp; </div>
		<span id="ms">Manage Candidate</span>
		<br/>
		<form method="post" action="addCandidate.php" enctype="multipart/form-data">
			
			Candidate Id:
			<input type="password" name="candidate_id" id="candidate_id" size="" onblur="checkPin('candidate_id')" onkeypress="enableBtn2('candidate_id','sbm')" />
			<br/>
			Candidate Name:
			<input type="text" name="candidate_name" id="candidate_name" value="<?php echo $msg=!isset($_GET['candidate_name'])?'':$_GET['candidate_name'] ;?>" size=""/>
			<br/>
			Candidate Image:
			<input type="file" name="candidate_image" id="candidate_image" size=""/>
			<br/>
			<fieldset>
				<legend>Candidate Academic Status</legend>
				School &nbsp;&nbsp;&nbsp;<select name="candiSch" id='candiSch' onchange="popFacsAndDepts(this.options[this.selectedIndex].value,'candiFac','candiDept')"><?php evoting::getSchools(); ?></select><br />
				Faculty &nbsp;&nbsp;&nbsp;<select name="candiFac" id='candiFac' onchange="popDepts(this.options[this.selectedIndex].value,'candiDept')"><?php evoting::getFaculties(); ?></select><br />
				Department &nbsp;&nbsp;&nbsp;<select name="candiDept" id='candiDept'><?php evoting::getDepartments(); ?></select><br />
				<br/>
			</fieldset>
			<br />
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
			Candidate Position:
			<select name="candidate_position" id="candidate_position" >
				<?php
					evoting::popElectionTypes();
				?>
			</select>
			<br/>
		<input type="submit" value="Save" onmousedown="valCandidate()" id="sbm" disabled />
		</form>
	</div>
<?php
	include("foot.inc");
?>