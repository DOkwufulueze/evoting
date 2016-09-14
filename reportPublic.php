<?php
	include("class.php");
	/*$uname=!isset($_SESSION['uname'])?"":$_SESSION['uname'];
	if($uname==""){
		echo "<script>document.location.href='.?&msg=Invalid Access to the Election Reports Page'</script>";
	}
	else{*/
	evoting::db();
	include("ev.inc");
?>
<?php
	//include("AdminH.inc");
?>

	<!--div id="man-1" style="top:10px; width:520px;right:10px;"-->
	<div id="report" style="top:10px; width:auto;margin-left:50px;">
		<div id="conf">
				&nbsp;
		</div><br /><br />
		<span id="ms">Election Report</span><br /><br />
		<div style="clear:both;">
			<div style="float:left;font-weight:bold;font-size:12px;width:110px;margin-left:0px;line-height:15px;">
				Candidate Name
			</div>
			<div style="float:left;font-weight:bold;font-size:12px;width:110px;margin-left:20px;line-height:15px;">
				Candidate Image
			</div>
			<div style="float:left;font-weight:bold;font-size:12px;width:180px;margin-left:20px;line-height:15px;">
				Candidate Position
			</div>
			<div style="float:left;font-weight:bold;font-size:12px;width:120px;margin-left:20px;line-height:15px;">
				Election For
			</div>
			<div style="float:left;font-weight:bold;font-size:12px;width:110px;margin-left:20px;line-height:15px;">
				Candidate Votes
			</div>
		</div><br /><br />
		<?php
			$q=mysql_query("SELECT * FROM mng_candi")or die(mysql_error());
			$n=mysql_num_rows($q);
			if($n>0){
				while($r=mysql_fetch_array($q)){
		?>
				<div style='clear:both;'>
					<div style='float:left;font-size:11px;width:110px;height:50px;margin-left:0px;line-height:15px;'>
						<?php echo $r['candidate_name']; ?>
					</div>
					<div style='float:left;font-size:11px;width:110px;height:50px;margin-left:20px;line-height:15px;'>
						<?php echo "<img src='candidates/".$r['candidate_image']."' width='50' height='40' />"; ?>
					</div>
					<div style='float:left;font-size:11px;width:180px;height:50px;margin-left:20px;line-height:15px;'>
						<?php 
							$pos=$r['candidate_position'];
							echo $pos;
						?>
					</div>
					<div style='float:left;font-size:11px;width:110px;height:50px;margin-left:20px;line-height:15px;'>
						<?php 
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
							echo $catVar." (".$catVal.")";
						?>
					</div>
					<div style='float:left;font-size:11px;width:110px;height:50px;margin-left:20px;line-height:15px;'>
						<?php echo $r['votes']; ?>
					</div>
				</div>
				<br/>
		<?php 
				}//end of while
			}//end of if
			else{
		?>
		No Election Report yet!<br />
		<?php
			}//end of else
		?>
		 
	</div>
<?php
	include("foot.inc");
	//}
?>