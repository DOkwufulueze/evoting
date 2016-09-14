<?php
	include("class.php");
	include("ev.inc");
	if($_POST){
		evoting::login();
	}
?>
	<?php
		 echo !isset($_GET['votemsg'])?"":"<br /><br />".$_GET['votemsg']."<br />";
	?>
	<div id="left">
		<span style="color:#ee2222;"><?php echo !isset($_GET['msg'])?"":$_GET['msg']; ?></span><br/><br/>
		<div id="adm">Admin Login</div>
		<br/>
		<form action="" method="POST">
			User Name
				<br/>
				<input type="text" size="" name="bs" id="bs" onfocus="demo()"/>
				<br/>
			Password
				<br/>
				<input type="password" size="" name="bs1" id="bs1" onfocus="demo()"/>
				<br/>
			<!--button onclick="but()">Send</button-->
			<input type="submit" value="Send" /><br/>
		</form>
		Forgot Password
			<br/>
		Note: Your input are case sensitive
	</div>
	<div id="image1">
	</div>
	
	<br/>
	<div id="left1">
	<ul id="left1list">
		<hr style="border-bottom:0.5px groove #cfc;"/>
	    <li>
			<a href=".?pg=userlogin" class="aref">Vote</a>
		</li>
	</ul>
	</div>
	<div id="right">
		<span style="color:green;">News</span>
		<hr style="border-bottom:0.5px groove #cfc;"/>
		<ul id="left1list">
			<li id="lik">
				<a href="#" class="ak">Lastest News</a>
			</li>
			<li>
				<a href="#" class="ak">Local News</a>
			</li>
			<li>
				<a href="#" class="ak">International News</a>
			</li>
		</ul>
	</div>
	 
<?php
	include("foot.inc");
?>