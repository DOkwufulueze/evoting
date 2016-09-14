<?php
	include("class.php");
	$uname=!isset($_SESSION['uname'])?"":$_SESSION['uname'];
	if($uname==""){
		echo "<script>document.location.href='.?&msg=Invalid Access to the Voters Page'</script>";
	}
	else{
		$uname=!isset($_SESSION['uname'])?"":$_SESSION['uname'];
		$sch=!isset($_SESSION['sch'])?"":$_SESSION['sch'];
		$fac=!isset($_SESSION['fac'])?"":$_SESSION['fac'];
		$dept=!isset($_SESSION['dept'])?"":$_SESSION['dept'];
		$catVal=!isset($_SESSION['catVal'])?"":$_SESSION['catVal'];
		$catVar=!isset($_SESSION['catVar'])?"":$_SESSION['catVar'];
		$type=!isset($_SESSION['type'])?"":$_SESSION['type'];
	
		evoting::db();
		include("ev.inc");
?>
<script type="text/javascript">
	disableBtn("sbm");
</script>
<?php
	//include("AdminH.inc");
?>

	<div id="man-1" style="width:500px;">
		<span style="float:right;"><a href=".?pg=logout">Log out</a></span>
		<span style="color:#ee2222;"><?php echo !isset($_GET['msg'])?"":$_GET['msg']."<br/><br/>"; ?></span>
		<div id="conf">
				&nbsp;
		</div>
		<span id="ms">Cast your vote for candidates in this category.</span>
		<br/>
		<form action="vote2.php" method="post">
			<div style="clear:both;">
				<div style="float:left;font-weight:bold;font-size:12px;width:60px;margin-left:0px;line-height:15px;">
					Candidate Name
				</div>
				<div style="float:left;font-weight:bold;font-size:12px;width:60px;margin-left:20px;line-height:15px;">
					Candidate Position
				</div>
				<div style="float:left;font-weight:bold;font-size:12px;width:60px;margin-left:20px;line-height:15px;">
					Election For
				</div>
				<div style="float:left;font-weight:bold;font-size:12px;width:60px;margin-left:20px;line-height:15px;">
					Candidate Image
				</div>
				<div style="float:left;font-weight:bold;font-size:12px;width:60px;margin-left:20px;line-height:15px;">
					Vote
				</div>
			</div><br /><br />
			<?php
					$q=mysql_query("SELECT * FROM mng_candi WHERE candidate_position='$type' AND (sch='$catVal'||fac='$catVal'||dept='$catVal') AND election_category='$catVar'")or die(mysql_error());
					$n=mysql_num_rows($q);
					if($n>0){
						$i=1;
						while($r=mysql_fetch_array($q)){
			?>
			<div style='clear:both;'>
				<div style='float:left;font-size:11px;width:60px;height:80px;margin-left:0px;line-height:15px;'>
							<?php echo $r['candidate_name']; ?>
				</div>
				<!--div style='float:left;font-size:11px;width:60px;margin-left:20px;line-height:15px;'>
							<?php //echo "<img src='candidates/".$r['candidate_image']."' width='50' height='50' />"; ?>
				</div-->
				<div style='float:left;font-size:11px;width:60px;height:80px;margin-left:20px;line-height:15px;'>
							<?php echo $r['candidate_position']; ?>
				</div>
				<div style='float:left;font-size:11px;width:60px;height:80px;margin-left:20px;line-height:15px;'>
							<?php 
								$catVar2=$r['election_category'];
								$dept2=$r['dept'];
								$fac2=$r['fac'];
								$sch2=$r['sch'];
								$catVal2="";
								if($catVar2=="Department"){
									$catVal2=$dept2;
								}
								if($catVar2=="Faculty"){
									$catVal2=$fac2;
								}
								if($catVar2=="School"){
									$catVal2=$sch2;
								}
								echo $catVar2." (".$catVal2.")";
							?>
				</div>
				<div style='float:left;font-size:11px;width:60px;height:80px;margin-left:20px;line-height:15px;'>
							<?php 
								echo "<img src='candidates/".$r['candidate_image']."' width='50' height='50' />";
							?>
				</div>
				<div style='float:left;font-size:11px;width:60px;height:80px;margin-left:20px;line-height:15px;'>
					<input type="radio" name="vote" id="vote<?php echo $i ; ?>" value="<?php echo $r['candidate_id'] ?>" onclick="enableBtn('vote<?php echo $i ; ?>','sbm')" />
				</div>
			</div><br />
			
			<?php
						$i++;
					}//end of while
				}//end of inner if 
			?>
			<div style="clear:both;">
				<input type="submit" value="VOTE" id="sbm" />
			</div>
		</form>
	</div>
<?php
	include("foot.inc");
	}
?>