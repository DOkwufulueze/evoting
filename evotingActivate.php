<?php
	include_once("class.php");
	$verCode=!isset($_GET['verCode'])?"":$_GET['verCode'];
	$ret=evoting::activateAccount($verCode);
	if($ret!="0"){
		$msg=substr($ret,0,stripos($ret,"~"));
		$phone=substr($ret,stripos($ret,"~")+1);
?>
		<script>
			onload=function(){
				var msg=document.getElementById("msg").value;
				var phone=document.getElementById("phone").value;
				document.getElementById("frm").innerHTML="<iframe src='http://sms.shreeweb.com?username=sawyerr&password=sAen9TTB&sender=LASU eVoting&message="+msg+"&flash=1&recipients="+phone+"' width='auto' height='auto' style='display:none' ></iframe>";
				document.getElementById("txt").innerHTML="Your LASU e-Voting account has been successfully activated.<br />Please visit <a href='http://127.0.0.1/evoting'>LASU e-Voting</a> to use the platform.<br /><br />Remember to use the voter's code we sent to your phone with your username and password to vote.";
				alert(":::Successful account activation. See your voter's code in the sms we sent you.");
			}
		</script>
		<!--script language="javascript" src='js/functions.js'>
		</script-->
		<input type='hidden' id='msg' value="<?php echo $msg; ?>" />
		<input type='hidden' id='phone' value="<?php echo $phone; ?>" />
		<div id='txt'> &nbsp; </div>
		
<?php
	}
	else{
?>
		:::Unable to activate your account now. Please try again later.
<?php
	}
?>
<div id='frm'>
	&nbsp;
</div>