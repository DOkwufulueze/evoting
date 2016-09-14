<?php
	include("class.php");
	include("ev.inc");
?>
<?php
	include("AdminH.inc");
	if($_POST){
		evoting::pins();
	}
?>

	<?php echo $msg=!isset($_GET['msg'])?"":$_GET['msg']; ?><br />
	<div id="man-1">
		Please, don't generate more than 10 pins at a time<br />
		<form method="post" action="" >
			Amount <input type="text" name="amount" id="amount" size="" />
			<br/>
			<input type="submit" value="Save" onmousedown="valPin()" />
		</form>
	</div>
<?php
	include("foot.inc");
?>