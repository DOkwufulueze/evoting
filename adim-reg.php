<?php
	include("class.php");
	include("ev.inc");
	if($_POST){
		e_voting::regAdmin();
	}
?>
<script type="text/javascript">
	disableBtn("cnf");
</script>
<div id="us">	
	<div>
		<span>*</span>NOTE: Please fill the whole information required.
		<form method="post" action="">
			<fieldset>
				<legend>Admin Information</legend>
					Surname Name:&nbsp; &nbsp;<input type="text" size="" name="sname" id="sname" value="<?php echo $_GET['sname']=!isset($_GET['sname'])?'':$_GET['sname'] ; ?>" /><br/>
					First Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="fname" id="fname" value="<?php echo $_GET['fname']=!isset($_GET['fname'])?'':$_GET['fname'] ; ?>" /><br/>
					Other Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="oname" id="oname" value="<?php echo $_GET['oname']=!isset($_GET['oname'])?'':$_GET['oname'] ; ?>" /><br/>
					Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="add" id="add" value="<?php echo $_GET['add']=!isset($_GET['add'])?'':$_GET['add'] ; ?>" /><br/>
					Phone Number: &nbsp;&nbsp;&nbsp;<input type="text" size="" name="phone" id="phone" value="<?php echo $_GET['phone']=!isset($_GET['phone'])?'':$_GET['phone'] ; ?>" /><br/>
					Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="email" id="email" value="<?php echo $_GET['email']=!isset($_GET['email'])?'':$_GET['email'] ; ?>" /><br/>
					Date of Birth: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="dob" id="dob" value="<?php echo $_GET['dob']=!isset($_GET['dob'])?'':$_GET['dob'] ; ?>" /><br/>
					Occupation: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="occ" id="occ" value="<?php echo $_GET['occ']=!isset($_GET['occ'])?'':$_GET['occ'] ; ?>" /><br/>
					Religion: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="rel" id="rel" value="<?php echo $_GET['rel']=!isset($_GET['rel'])?'':$_GET['rel'] ; ?>" /><br/>
					LGA: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="lga" id="lga" value="<?php echo $_GET['lga']=!isset($_GET['lga'])?'':$_GET['lga'] ; ?>" /><br/>
					State: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="state" id="state" value="<?php echo $_GET['state']=!isset($_GET['state'])?'':$_GET['state'] ; ?>" /><br/>
					Current Location: <input type="text" size="" name="loc" id="loc" value="<?php echo $_GET['loc']=!isset($_GET['loc'])?'':$_GET['loc'] ; ?>" /><br/>
			</fieldset>
			
			<div>
				<fieldset>
						<legend>Login Requirement</legend>
					Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="" name="uname" id="uname" value="<?php echo $_GET['uname']=!isset($_GET['uname'])?'':$_GET['uname'] ; ?>" /><br/>
					Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" size="" name="pwd" id="pwd" /><br/>
					Retype Password: <input type="password" size="" name="pwd1" id="pwd1" /><br/>
					
				</fieldset>
			</div>
			<div>
				<fieldset>
					<legend>Declaration</legend>
						I declare that all the information have filled above are true to the best of 
						my knowledge and also am a bonafied citizen of Nigeria; in other words I will vote to ensure
						a free and fair election.
						<input type="checkbox" size="" name="check" id="check" onclick="enableBtn('check','cnf')" value="yes"/>
				</fieldset><br/>
	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" style="margin-left:100px;" name="cnf" id="cnf" value="Confirm" onmousedown="regAdmin()" />
		</form>
	</div>
</div>