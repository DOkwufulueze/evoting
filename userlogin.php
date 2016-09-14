<?php
	include("ev.inc");
?>
	<div>
		<fieldset id="field">
			<legend>LOGIN:::</legend>
				<div id="regwrap" ><hr/>
				<div id="ulog">
					USERNAME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="uname" id="uname" size="30" /><br>
					PASSWORD:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pwd" id="pwd" size="30" /><br>
					VOTER CODE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pin" id="pin" placeholder="The code sent to your Phone" size="30" /><br /><br />
					
				</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="Send" onclick="voteLogin()" />
					<hr style="margin-top:15px;"/>
				</div>
		</fieldset>
	
	</div>
<?php
include("foot.inc");
?>
