<?php
	include("class.php");
	include("ev.inc");
	if($_POST){
		evoting::regUser();
	}
?>
<script type="text/javascript">
	disableBtn("cnf");
</script>
<div id="us">	
	<?php echo $_GET['msg']=!isset($_GET['msg'])?'':$_GET['msg']."<br /><br />" ; ?>
	<span>*</span>NOTE: Please fill the whole information required.
	<form method="post" action="" enctype="multipart/form-data" >
		<div id="mainForm">
			<div>
				<fieldset>
					<legend>Biography</legend>
						Status:&nbsp; &nbsp;<select name="status" id="status">
									<option value="">Choose Status</option>
									<option value="Mr">Mr</option>
									<option value="Mrs">Mrs</option>
									<option value="Miss">Miss</option>
								</select><br/>
						<span style="color:#ba4354;">*</span> Surname Name:&nbsp; &nbsp;<input type="text" size="" name="sname" id="sname" value="<?php echo $_GET['sname']=!isset($_GET['sname'])?'':$_GET['sname'] ; ?>" /><br/>
						<span style="color:#ba4354;">*</span> First Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="fname" id="fname" value="<?php echo $_GET['fname']=!isset($_GET['fname'])?'':$_GET['fname'] ; ?>" /><br/>
						<span style="color:#ba4354;">*</span> Other Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="oname" id="oname" value="<?php echo $_GET['oname']=!isset($_GET['oname'])?'':$_GET['oname'] ; ?>" /><br/>
						<span style="color:#ba4354;">*</span> User Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" size="" name="pic" id="pic" /><br/>
						<span style="color:#ba4354;">*</span> Sex: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<select name="sex" id="sex">
									<option value="">Choose Sex</option>
									<option value="Female">Female</option>
									<option value="Male">Male</option>
									<option value="Others">Others</option>
								</select><br/>
						<span style="color:#ba4354;">*</span> Phone Number: &nbsp;&nbsp;&nbsp;<input type="text" size="" name="phone" id="phone" value="<?php echo $_GET['phone']=!isset($_GET['phone'])?'':$_GET['phone'] ; ?>" /><br/>
						<span style="color:#ba4354;">*</span>Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="email" id="email" value="<?php echo $_GET['email']=!isset($_GET['email'])?'':$_GET['email'] ; ?>" /><br/>
						<span style="color:#ba4354;">*</span> Date of Birth: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><input type="text" name="day" id="day" size="2" value="DD" onfocus="clears('day')" onblur="clears2('day')" />&nbsp;&nbsp; - &nbsp;&nbsp;<input type="text" name="month" id="month" size="2" value="MM" onfocus="clears('month')" onblur="clears2('month')" />&nbsp;&nbsp; - &nbsp;&nbsp;<input type="text" name="year" id="year" size="4" value="YYYY" onfocus="clears('year')" onblur="clears2('year')" /></span>
					<br/>
						<span style="color:#ba4354;">*</span>School &nbsp;&nbsp;&nbsp;<select name="sch" id='sch' onchange="popFacsAndDepts(this.options[this.selectedIndex].value,'fac','dept')"><?php evoting::getSchools(); ?></select>
						<span style="color:#ba4354;">*</span>Faculty &nbsp;&nbsp;&nbsp;<select name="fac" id='fac' onchange="popDepts(this.options[this.selectedIndex].value,'dept')"><?php evoting::getFaculties(); ?></select>
						<span style="color:#ba4354;">*</span>Department &nbsp;&nbsp;&nbsp;<select name="dept" id='dept'><?php evoting::getDepartments(); ?></select>
				</fieldset>
				<div>
					<fieldset>
						<legend>Login Requirement</legend>
						<span style="color:#ba4354;">*</span> Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="uname" id="uname" value="<?php echo $_GET['uname']=!isset($_GET['uname'])?'':$_GET['uname'] ; ?>" /><br/>
						<span style="color:#ba4354;">*</span> Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" size="" name="pwd" id="pwd" /><br/>
						<span style="color:#ba4354;">*</span> Retype Password: <input type="password" size="" name="pwd1" id="pwd1" /><br/>
					</fieldset>
				</div>
				<br/>
				<input type="button" style="" name="prv" id="prv" value="Preview" onmousedown="regUser()" />
			</div>
		</div>
		<div style="display:none;" id="prev">
			<fieldset>
				<legend>Biography</legend>
				<b>Status</b>: <span id="ma"> </span><br />
				<b>Name</b>: <span id="na"> </span><br />
				<b>Sex</b>: <span id="se"> </span><br />
				<b>Phone</b>: <span id="ph"> </span><br />
				<b>Email</b>: <span id="em"> </span><br />
				<b>Date of Birth</b>: <span id="da"> </span><br />
				<b>School</b>: <span id="sc"> </span><br />
				<b>Faculty</b>: <span id="fa"> </span><br />
				<b>Department</b>: <span id="de"> </span><br />
			</fieldset>
			<br />
			<fieldset>
				<legend>Login Requirement</legend>
				<b>Username</b>: <span id="un"> </span>
			</fieldset>
			<br />
			<div>
				<fieldset>
					<legend>Declaration</legend>
					I declare that all the information have filled above are true to the best of 
					my knowledge and also am a bonafied student of Lagos State University; I will vote to ensure
					a free and fair election.
					<input type="checkbox" size="" name="check" id="check" onclick="enableBtn('check','cnf')" value="yes"/>
				</fieldset><br/>
			</div>
			<input type="submit" style="margin-left:100px;" name="cnf" id="cnf" value="Confirm" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" style="" name="edit" id="edit" value="Edit" onmousedown="editt()" />
		</div>
	</form>	
</div>
<?php
	include("foot.inc");
?>