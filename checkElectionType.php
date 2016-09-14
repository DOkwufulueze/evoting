<?php
	include("class.php");
	e_voting::db();
	$type=!isset($_GET['type'])?"":$_GET['type'];
	$q=mysql_query("SELECT * FROM mng_candi WHERE candidate_position='$type'") or die(mysql_error());
	$n=mysql_num_rows($q);
	if($n==0){//No candidate for the election type
		echo "0";
	}
	else if($n>0){//candidate exists
		if($type=="Gubernatorial"||$type=="State Assembly"){
			$constituency="state_code";	
			$qu=mysql_query("SELECT * FROM mng_state") or die(mysql_error());
			$nu=mysql_num_rows($q);
			if($nu==0){//No State
				echo "0state";
			}
			else if($nu>0){//candidate exists
				$q=mysql_query("SELECT * FROM mng_elec WHERE election_type='$type'") or die(mysql_error());
				$n=mysql_num_rows($q);
				if($n==0){//The election type does not exist in the database
					echo "00";
				}
				else{//There are states and election type is valid
					echo "<form method='post' action='enterVote.php'><input type='hidden' id='which' name='which' value='$constituency' />";
					echo "Select State:<br /><select id='$constituency' name='$constituency'>";
					while($ru=mysql_fetch_array($qu)){
						echo "<option value='".$ru['code']."'>".$ru['state']."</option>";
					}
					echo "</select><br /><br /><input type='hidden' name='type' id='type' value='$type' /><input type='submit' value='Next>>' /></form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='.?pg=selectelec'>Back</a>";
				}
			}
		}
		else if($type=="Councillorship"||$type=="LGA Chairmanship"){
			$constituency="lga_name_code";	
			$qu=mysql_query("SELECT * FROM mng_lga") or die(mysql_error());
			$nu=mysql_num_rows($q);
			if($nu==0){//No State
				echo "0lga";
			}
			else if($nu>0){//candidate exists
				$q=mysql_query("SELECT * FROM mng_elec WHERE election_type='$type'") or die(mysql_error());
				$n=mysql_num_rows($q);
				if($n==0){//The election type does not exist in the database
					echo "00";
				}
				else{//There are states and election type is valid
					echo "<form method='post' action='enterVote.php'><input type='hidden' id='which' name='which' value='$constituency' />";
					echo "Select Local Government Area:<br /><select id='$constituency' name='$constituency'>";
					while($ru=mysql_fetch_array($qu)){
						echo "<option value='".$ru['code']."'>".$ru['lga_name']."</option>";
					}
					echo "</select><br /><br /><input type='hidden' name='type' id='type' value='$type' /><input type='submit' value='Next>>' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='.?pg=selectelec'>Back</a>";
				}
			}
		}	
		else if($type=="Federal Representative"){
			$constituency="federal_constituency_code";
			$qu=mysql_query("SELECT * FROM mng_fed") or die(mysql_error());
			$nu=mysql_num_rows($q);
			if($nu==0){//No State
				echo "0fed";
			}
			else if($nu>0){//candidate exists
				$q=mysql_query("SELECT * FROM mng_elec WHERE election_type='$type'") or die(mysql_error());
				$n=mysql_num_rows($q);
				if($n==0){//The election type does not exist in the database
					echo "00";
				}
				else{//There are states and election type is valid
					echo "<form method='post' action='enterVote.php'><input type='hidden' id='which' name='which' value='$constituency' />";
					echo "Select Federal Constituency:<br /><select id='$constituency' name='$constituency'>";
					while($ru=mysql_fetch_array($qu)){
						echo "<option value='".$ru['code']."'>".$ru['fd_name']."</option>";
					}
					echo "</select><br /><br /><input type='hidden' name='type' id='type' value='$type' /><input type='submit' value='Next>>' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='.?pg=selectelec'>Back</a>";
				}
			}	
		}
		else if($type=="Senatorial"){
			$constituency="senatorial_constituency_code";	
			$qu=mysql_query("SELECT * FROM mng_sen") or die(mysql_error());
			$nu=mysql_num_rows($q);
			if($nu==0){//No State
				echo "0sen";
			}
			else if($nu>0){//candidate exists
				$q=mysql_query("SELECT * FROM mng_elec WHERE election_type='$type'") or die(mysql_error());
				$n=mysql_num_rows($q);
				if($n==0){//The election type does not exist in the database
					echo "00";
				}
				else{//There are states and election type is valid
					echo "<form method='post' action='enterVote.php'><input type='hidden' id='which' name='which' value='$constituency' />";
					echo "Select Senatorial Constituency:<br /><select id='$constituency' name='$constituency'>";
					while($ru=mysql_fetch_array($qu)){
						echo "<option value='".$ru['code']."'>".$ru['sc_name']."</option>";
					}
					echo "</select><br /><br /><input type='hidden' name='type' id='type' value='$type' /><input type='submit' value='Next>>' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='.?pg=selectelec'>Back</a>";
				}
			}
		}
		else{
			$constituency="";
		}
		if($constituency==""){//For Presidential Category
			$q=mysql_query("SELECT * FROM mng_elec WHERE election_type='$type'") or die(mysql_error());
			$n=mysql_num_rows($q);
			if($n==0){//The election type does not exist in the database
				echo "00";
			}
			else{
				echo "1";
			}
		}
	}
?>