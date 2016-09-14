<?php
	$uname=!isset($_SESSION['uname'])?"":$_SESSION['uname'];
	if($uname==""){
		echo "<script>document.location.href='?&msg=:::Invalid access to voter's page.'</script>";
	}
	else{
		include("top.php");
		$host="localhost"; // Host name
		$username="root"; // Mysql username
		$password=""; // Mysql password
		$db_name="evoting"; // Database name


		//anpp
		if(isset($_POST['Submit'])) {

		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");


		 //$e_id ="inec/ 396" ;
		//	$attempt  = "1";
		//$pres_result = mysql_query("SELECT pres_attempts FROM attempts where election_id ='$e_id'");
		 //while($pres_row = mysql_fetch_row($pres_result)){
		 //$pres_attempt =  $pres_row ['pres_attempts'];
		  // if ($pres_attempt >= 1){
		//header("location:error.php");
		 
		$names = 0;
		$result = mysql_query("SELECT pres_count FROM presidential_votes where party ='ANPP'");
		 while($row = mysql_fetch_row($result)){
		   $names =  $row [0];
		   $names =  $names + 1;
		   
		   mysql_query("UPDATE presidential_votes SET pres_count=$names WHERE party ='ANPP' ");
		 mysql_query("UPDATE attempts SET pres_attempts = '$attempt' WHERE election_id ='$e_id' ");
		  }
		 } 
		//pdp
		if(isset($_POST['Submit2'])) {
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");

		$names2 =  0;
		//$regnum = $_POST['txtnumber'];
		$result = mysql_query("SELECT pres_count FROM presidential_votes where party ='pdp'");
		 while($row = mysql_fetch_row($result)){
		   // $names = $row[1];
		 $names2 =  $row [0];
		   $names2 =  $names2 + 1;
		   
		   mysql_query("UPDATE presidential_votes SET pres_count=$names2 WHERE party ='pdp' ");
		  } 
		}

		//acn
		if(isset($_POST['Submit3'])) {
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");

		$names3 =  0;
		//$regnum = $_POST['txtnumber'];
		$result = mysql_query("SELECT pres_count FROM presidential_votes where party ='acn'");
		 while($row = mysql_fetch_row($result)){
		   // $names = $row[1];
		 $names3 =  $row [0];
		   $names3 =  $names3 + 1;
		   
		   mysql_query("UPDATE presidential_votes SET pres_count=$names3 WHERE party ='acn' ");
		  } 
		}
?>
<div id="content">
	<div id="left">
    <p style="text-align:center; color:#FF0000;"><strong><marquee  behavior="scroll">
    THIS VOTING SYSTEM IS FOR STUDENTS OF LAGOS STATE UNIVERSITY
    </marquee></strong></p>
</div>
  <p><a href="?pg=logout">LOGOUT</a></p>
  <table width="719" border="0" align="center">
    <tr>
      <th width="713" height="661" scope="col"><form id="form1" method="post" action="">
          <table width="671" border="0" align="center">
            <tr>
              <th width="233" bgcolor="#00FF66" scope="col"><span class="style8">CANDIDATE</span></th>
              <th width="197" scope="col"><span class="style8">NAME</span></th>
              <th width="149" bgcolor="#00FF66" scope="col"><span class="style8">PARTY</span></th>
              <th width="74" bgcolor="#993300" scope="col">UPDATED RESULT </th>
            </tr>
            <tr>
              <td height="151"><img src="images/contact1.jpg" alt="" width="177" height="218" /></td>
              <td>MRS CYNTHIA ALABA </td>
              <td><input type="submit" name="Submit" value="ANPP"  onclick="return confirm_vote('<?php echo "MRS CYNTHIA ALABA AS PRESIDENT ";  ?>')" /></td>
              <td><?php echo $names;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td height="150"><img src="images/1.jpg" alt="" width="180" height="182" /></td>
              <td>PROF. ELIJAH AMINU </td>
              <td><input type="submit" name="Submit2" value="PDP" onclick="return confirm_vote('<?php echo "PROF. ELIJAH AMINU AS PRESIDENT ";  ?>')"/></td>
              <td><?php echo $names2;  ?></td>
            </tr>
            <tr>
              <td height="105"><img src="images/contact3.jpg" alt="" width="178" height="183" /></td>
              <td>DECONESS SALOME SEUN (JP.) </td>
              <td><input type="submit" name="Submit3" value="ACN" onclick="return confirm_vote('<?php echo "DECONESS SALOME SEUN (JP.)  AS PRESIDENT ";  ?>')"/></td>
              <td><?php echo $names3;  ?></td>
            </tr>
            <tr>
              <td height="105">&nbsp;</td>
              <td>&nbsp;</td>
              <td><a href="pres_result.php">click here to view all parties result </a></td>
              <td>&nbsp;</td>
            </tr>
          </table>
      </form></th>
    </tr>
    <tr>
      <th height="17" scope="col">&nbsp;</th>
    </tr>
  </table>
</div>
<?php 
		include("foot.php");
	}
?>