<?php
	include("class.php");
	evoting::db();
	//$uploads="C:/wamp/www/e-voting/candidates/";
	$uname=!isset($_SESSION['uname'])?"":$_SESSION['uname'];
	$candidate_id=htmlentities($_POST['vote']);
	$catVal=!isset($_SESSION['catVal'])?"":$_SESSION['catVal'];
	$catVar=!isset($_SESSION['catVar'])?"":$_SESSION['catVar'];
	$type=!isset($_SESSION['type'])?"":$_SESSION['type'];
	$today=!isset($_SESSION['voteTime'])?"":$_SESSION['voteTime'];
	$q=mysql_query("SELECT * FROM vote WHERE username='$uname' AND election_type='$type' AND election_category='$catVar' AND election_category_value='$catVal'") or die(mysql_error());
	$n=mysql_num_rows($q);
	if($n==0){
		$q=mysql_query("SELECT * FROM mng_candi WHERE candidate_id='$candidate_id'") or die(mysql_error());
		$n=mysql_num_rows($q);
		if($n>0){
			while($r=mysql_fetch_array($q)){
				$votes=$r['votes'];
				$candidate_name=$r['candidate_name'];
			}
			$votes++;
			if(mysql_query("UPDATE mng_candi SET votes='$votes' WHERE candidate_id='$candidate_id'")){
				mysql_query("INSERT INTO vote(username,election_category,election_category_value,election_type,candidate,vote_time) VALUES('$uname','$catVar','$catVal','$type','$candidate_id','$today')")or die(mysql_error());
				session_destroy();
				$msgs="<br /><br /><b>Here is a summary of your vote</b><br /><br />Candidate Name: $candidate_name<br />Election For: $catVar ( $catVal )<br />Election Type: $type<br />Time of Vote: $today<br />Thank you for using the e-Voting System!<br />";
				$msg=urlencode($msgs);
				echo "<script>document.location.href='.?votemsg=Your Vote was Successful! $msgs'</script>";
			}
			else{
				echo "<script>document.location.href='.?vote&msg=Sorry. You cannot vote now. Try again Later!'</script>";
			}
		}
	}
	else{
		echo "<script>document.location.href='.?vote&msg=You already voted for this category!'</script>";
	}	
?>