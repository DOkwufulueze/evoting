<?php  
	session_start();
	require 'PHPMailer/PHPMailerAutoload.php';
	class evoting{
		public static function db(){
			@mysql_connect("localhost","root","") or die(mysql_error());
			@mysql_select_db("evoting") or die(mysql_error());
		}
		
		public static function getSchools(){
			evoting::db();
			$get = mysql_query('SELECT DISTINCT school FROM departments');
			$num=mysql_num_rows($get);
			if($num>0){
				echo "<option value=''>Select School</option>";
				while($var = mysql_fetch_assoc($get))
				{
					$sch=$var['school'];
					echo "<option value='$sch'>$sch</option>";
				}
			}
			else{
				echo "<option value=''>:::No School yet</option>";
			}
		}
		
		public static function getFaculties(){
			evoting::db();
			$get = mysql_query('SELECT DISTINCT faculty FROM departments');
			$num=mysql_num_rows($get);
			if($num>0){
				echo "<option value=''>Select Faculty</option>";
				while($var = mysql_fetch_assoc($get))
				{
					$fac=$var['faculty'];
					echo "<option value='$fac'>$fac</option>";
				}
			}
			else{
				echo "<option value=''>:::No Faculty yet</option>";
			}
		}

		public static function getDepartments(){
			evoting::db();
			$get = mysql_query('SELECT DISTINCT department FROM departments');
			$num=mysql_num_rows($get);
			if($num>0){
				echo "<option value=''>Select Department</option>";
				while($var = mysql_fetch_assoc($get))
				{
					$dept=$var['department'];
					echo "<option value='$dept'>$dept</option>";
				}
			}
			else{
				echo "<option value=''>:::No Department yet</option>";
			}
		}

		public static function getDepartmentsFromFaculty($fac){
			evoting::db();
			$get = mysql_query("SELECT DISTINCT department FROM departments WHERE faculty='$fac'");
			$num=mysql_num_rows($get);
			if($num>0){
				echo "<option value=''>Select Department</option>";
				while($var = mysql_fetch_assoc($get))
				{
					$dept=$var['department'];
					echo "<option value='$dept'>$dept</option>";
				}
			}
			else{
				echo "<option value=''>:::No Department yet</option>";
			}
		}
		
		public static function getFacultiesAndDepartmentsFromSchool($sch){
			evoting::db() ;
			$get = mysql_query("SELECT DISTINCT faculty FROM departments WHERE school='$sch'");
			$num=mysql_num_rows($get);
			if($num>0){
				echo "<option value=''>Select Faculty</option>";
				while($var = mysql_fetch_assoc($get))
				{
					$fac=$var['faculty'];
					echo "<option value='$fac'>$fac</option>";
				}
				echo "~";
				$get = mysql_query("SELECT DISTINCT department FROM departments WHERE school='$sch'");
				$num=mysql_num_rows($get);
				if($num>0){
					echo "<option value=''>Select Department</option>";
					while($var = mysql_fetch_assoc($get))
					{
						$dept=$var['department'];
						echo "<option value='$dept'>$dept</option>";
					}
				}
				else{
					echo "<option value=''>:::No Department yet</option>";
				}
			}
			else{
				echo "<option value=''>:::No Faculty yet</option>";
			}
		}
		
		public static function getElectionSchools(){
			evoting::db();
			$get = mysql_query('SELECT DISTINCT sch FROM mng_sch');
			$num=mysql_num_rows($get);
			if($num>0){
				echo "<option value=''>Select School</option>";
				while($var = mysql_fetch_assoc($get))
				{
					$sch=$var['sch'];
					echo "<option value='$sch'>$sch</option>";
				}
			}
			else{
				echo "<option value=''>:::No School yet</option>";
			}
		}
		
		public static function getElectionFaculties(){
			evoting::db();
			$get = mysql_query('SELECT DISTINCT fac FROM mng_fac');
			$num=mysql_num_rows($get);
			if($num>0){
				echo "<option value=''>Select Faculty</option>";
				while($var = mysql_fetch_assoc($get))
				{
					$fac=$var['fac'];
					echo "<option value='$fac'>$fac</option>";
				}
			}
			else{
				echo "<option value=''>:::No Faculty yet</option>";
			}
		}

		public static function getElectionDepartments(){
			evoting::db();
			$get = mysql_query('SELECT DISTINCT dept FROM mng_dept');
			$num=mysql_num_rows($get);
			if($num>0){
				echo "<option value=''>Select Department</option>";
				while($var = mysql_fetch_assoc($get))
				{
					$dept=$var['dept'];
					echo "<option value='$dept'>$dept</option>";
				}
			}
			else{
				echo "<option value=''>:::No Department yet</option>";
			}
		}
		
		public static function popElectionTypes(){
			evoting::db();
			$get = mysql_query('SELECT DISTINCT election_type FROM election_types');
			$num=mysql_num_rows($get);
			if($num>0){
				echo "<option value=''>Select Election Type</option>";
				while($var = mysql_fetch_assoc($get))
				{
					$tp=$var['election_type'];
					echo "<option value='$tp'>$tp</option>";
				}
			}
			else{
				echo "<option value=''>:::No Election Type yet</option>";
			}
		}
		
		public static function regUser(){
			evoting::db();
			$sname=htmlentities($_POST['sname']);
			$fname=htmlentities($_POST['fname']);
			$oname=htmlentities($_POST['oname']);
			$name=$sname." ".$oname." ".$fname;
			$pic=$_FILES['pic']['name'];
			$picName=$_FILES['pic']['name'];
			$picSize=$_FILES['pic']['size'];
			$picType=$_FILES['pic']['type'];
			$picLoc=$_FILES['pic']['tmp_name'];
			$uploads="C:/wamp/www/evoting/users/";
			$sex=htmlentities($_POST['sex']);
			$sch=htmlentities($_POST['sch']);
			$fac=htmlentities($_POST['fac']);
			$dept=htmlentities($_POST['dept']);
			$phone=htmlentities($_POST['phone']);
			$email=htmlentities($_POST['email']);
			$to=$email;
			$status=htmlentities($_POST['status']);
			$day=htmlentities($_POST['day']);
			$month=htmlentities($_POST['month']);
			$year=htmlentities($_POST['year']);
			$dob=$year."-".$month."-".$day;
			$uname=htmlentities($_POST['uname']);
			$pwd=htmlentities($_POST['pwd']);
			$verified="0";
			$pwd=md5($pwd);
			$dt=date("Y-m-d H:i:s");
			if($picType!="image/pjpeg"&&$picType!="image/jpeg"&&$picType!="image/gif"){
				echo "<script>document.location.href='.?pg=user&msg=:::Invalid Image Format!&sname=$sname&fname=$fname&oname=$oname&sex=$sex&phone=$phone&email=$email&status=$status&dob=$dob&uname=$uname'</script>";
			}
			else{
				if($picSize>120000){
					echo "<script>document.location.href='.?pg=user&msg=:::Upload pictures not greater than 120KB!&sname=$sname&fname=$fname&oname=$oname&sex=$sex&phone=$phone&email=$email&status=$status&dob=$dob&uname=$uname'</script>";
				}
				else{
					$q=mysql_query("SELECT * FROM regUser WHERE username='$uname' OR email='$email' OR phone='$phone'") or die(mysql_error());
					$n=mysql_num_rows($q);
					if($n>0){
						echo "<script>document.location.href='.?pg=user&msg=:::User already registered&sname=$sname&fname=$fname&oname=$oname&sex=$sex&phone=$phone&email=$email&status=$status&dob=$dob&uname=$uname'</script>";
					}
					else if($n==0){
						list($txt, $ext) = explode(".", $pic);
						/*if(in_array($ext,$valid_formats))
						{
						}*/
						$pic=$uname.time().".".$ext;
						$pin="";
						$code="";
						$alphabet = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ" ;
						$length = 20 ;
						$i=0;
						while($i==0){
							$pin="";
							for($j = 0 ; $j < $length ; $j++){
								$pin.= $alphabet[mt_rand(0, (strlen($alphabet)-1))] ;
							}
							$q=mysql_query("SELECT * FROM regUser WHERE verification_code='$pin'")or die (mysql_error());
							$num=mysql_num_rows($q);
							if($num==0){
								$i=1;
							}
						}
						$i=0;
						while($i==0){
							$code="";
							for($j = 0 ; $j < 10 ; $j++){
								$code.= $alphabet[mt_rand(0, (strlen($alphabet)-1))] ;
							}
							$q=mysql_query("SELECT * FROM regUser WHERE verification_code='$code'")or die (mysql_error());
							$num=mysql_num_rows($q);
							if($num==0){
								$i=1;
							}
						}
						if(move_uploaded_file($picLoc,$uploads.$pic)){
							if(mysql_query("INSERT INTO regUser(surname,firstname,othername,pic,sex,sch,fac,dept,phone,email,status,dob,username,password,date,verified,verification_code,code) VALUES('$sname','$fname','$oname','$pic','$sex','$sch','$fac','$dept','$phone','$email','$status','$dob','$uname','$pwd','$dt','$verified','$pin','$code') ")){
								$activate="http://127.0.0.1/evoting/evotingActivate.php?verCode=$pin";
								$msg="Congratulations $name.<br />Your registration is almost completed. <br />Click the following link to activate your Voter's account:<br /> $activate <br /><br />Tel: +234 (0) 802 453 8049<br />Email: info@evoting.com<br />";
								$msg2="Congratulations $name. Your registration is almost completed. Click the following link to activate your Voter's account: $activate";
								//$msg=wordwrap($msg,70);
								$mail = new PHPMailer;
								//$mail->SMTPDebug = 3;                               // Enable verbose debug output
								$mail->isSMTP();                                      // Set mailer to use SMTP
								$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
								$mail->SMTPAuth = true;                               // Enable SMTP authentication
								$mail->Username = 'daniel.okwufulueze@gmail.com';            // SMTP username
								$mail->Password = '5a3cmpton@5a3';                           // SMTP password
								$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
								$mail->Port = 587;                                    // TCP port to connect to
								$mail->From = 'daniel.okwufulueze@gmail.com';
								$mail->FromName = 'LASU e-VOTING';
								$mail->addAddress($to, 'Client');     // Add a recipient
								$mail->addReplyTo('daniel.okwufulueze@gmail.com', 'Information');
								$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
								$mail->isHTML(true);                                  // Set email format to HTML

								$mail->Subject = 'Activate Your e-Voting Account';
								$mail->Body    = $msg;
								$mail->AltBody = $msg2;//For non-HTML mail clients

								if($mail->send()) {
									echo "<script>document.location.href='.?pg=user&msg=$sname $fname $oname, your registration is almost completed. Visit your email to activate your voter's account.'</script>";
								}
								else{
									if(mysql_query("DELETE FROM regUser WHERE username='$uname'")){
										if(unlink($uploads.$pic)){
											echo "<script>document.location.href='.?pg=user&msg=:::Message could not be sent now.&sname=$sname&fname=$fname&oname=$oname&sex=$sex&phone=$phone&email=$email&status=$status&dob=$dob&uname=$uname'</script>";
											//echo 'Mailer Error: ' . $mail->ErrorInfo;
										}
										else{
											echo "<script>document.location.href='.?pg=user&msg=:::Message could not be sent now and problem deleting picture.&sname=$sname&fname=$fname&oname=$oname&sex=$sex&phone=$phone&email=$email&status=$status&dob=$dob&uname=$uname'</script>";
										}
									}
									else{
										echo "<script>document.location.href='.?pg=user&msg=:::Message could not be sent now and problem deleting from db.&sname=$sname&fname=$fname&oname=$oname&sex=$sex&phone=$phone&email=$email&status=$status&dob=$dob&uname=$uname'</script>";
									}
								}
							}
							else{
								unlink($uploads.$pic);
								echo "<script>document.location.href='.?pg=user&msg=:::Sorry. Unable to Register you at this moment.&sname=$sname&fname=$fname&oname=$oname&sex=$sex&phone=$phone&email=$email&status=$status&dob=$dob&uname=$uname'</script>";
							}
							//echo "<script>document.location.href='.?pg=user&msg=Congratulations $sname $fname $oname, your registration was successful!'</script>";
						}
						else{
							echo "<script>document.location.href='.?pg=user&msg=:::Sorry. Unable to upload Image!&sname=$sname&fname=$fname&oname=$oname&sex=$sex&phone=$phone&email=$email&status=$status&dob=$dob&uname=$uname'</script>";
						}
					}
				}
			}
		}
		
		public static function login(){
			evoting::db();
			$uname=htmlentities($_POST['bs']);
			$pwd=htmlentities($_POST['bs1']);
			if($uname!=""&&$pwd!=""){
				$pwd=md5($pwd);
				$q=mysql_query("SELECT * FROM admin WHERE username='$uname' AND password='$pwd'") or die(mysql_error());
				$n=mysql_num_rows($q);
				if($n==0){
					echo "<script>document.location.href='.?pg=home&msg=Invalid Username or Password!$pwd'</script>";
				}
				else if($n>0){
					$_SESSION['uname']=$uname;
					$_SESSION['status']="admin";
					$nn=$_SESSION['uname'];
					echo "<script>document.location.href='.?pg=school&msg=Welcome to the Admin Page $nn!'</script>";
				}
			}
			else{
				echo "<script>document.location.href='.?pg=home&msg=Please fill all fields!'</script>";
			}
		}
		
		public static function pins(){
			evoting::db() ;
			$false = "Not Assigned" ;
			$user = "None" ;
			$i=0; $k=0 ;
			$amountstr = mysql_real_escape_string($_POST['amount']) ;
			$amount = (int)mysql_real_escape_string($_POST['amount']) ;
			$pin = "" ;
			$alphabet = "abcdefghijklmnopqrstuvwxyz0123456789" ;
			$length = 10 ;
			$msg="";
			if(($amount <= 10)&&($amount > 0)&& ($amountstr != "")){
			while($i<$amount){
				for($j = 0 ; $j < $length ; $j++){
					$pin.= $alphabet[mt_rand(0, strlen($alphabet)-1)] ;
				}
				$query = mysql_query("SELECT * FROM pins WHERE pin='$pin'") or die(mysql_error()) ;
				$num = mysql_num_rows($query) ;
				if($num == 0){
					if(strlen($pin)== 10){
						mysql_query("INSERT INTO pins(pin, user, status) VALUES('$pin', '$user', '$false')") or die(mysql_error());
						$pins[] = $pin ;
						$pin = "" ;
						$i++ ; 
					}
					else if(strlen($pin) < 10){
						$pins2[] = $pin ;
						$pin = "" ;
					}
				}
			}
			$msg.="These are the pins just generated by the Pin Generator.<br/><br/><table border = \"1\" cellpadding = \"15\" cellspacing = \"0\"><tr><th>PINS</th><th>Used By</th><th>STATUS</th></tr>" ;
			while($k<$amount){
				$msg.="<tr><td>".$pins[$k]."</td><td>NONE</td><td>NOT ASSIGNED</td></tr>" ;
				$k++ ;
			}
			$msg.="</table>" ;
			}
			
			else{
				$msg.="Please create not more than 10 and not less than 1 pin(s) at a time!" ;
			}
			$msg=urlencode($msg."<br />");
			echo"<script>document.location.href='.?pg=pins&msg=$msg'</script>";
		}
		
		public static function activateAccount($verCode){
			evoting::db();
			$q=mysql_query("SELECT * FROM regUser WHERE verification_code='$verCode' AND verified='0'")or die (mysql_error());
			$num=mysql_num_rows($q);
			if($num==0){
				//echo "<script>document.location.href='http://127.0.0.1/evoting?activateMsg=:::User Account already Activated. $verCode'</script>";
				echo "User Account already Activated. $verCode";
			}
			else{
				$rr=mysql_fetch_assoc($q);
				$id=$rr['id'];
				$fname=$rr['firstname'];
				$code=$rr['code'];
				$phone=$rr['phone'];
				if(mysql_query("UPDATE reguser SET verified=1 WHERE id='$id'")){
					$msg="Hello $fname%0aYour registration on LASU e-Voting System is completed.%0aVoter Code: $code";
					return $msg."~".$phone;
				}
			}
			return "0";
		}
		
		public static function logout(){
			$uname=!isset($_SESSION['uname'])?"":$_SESSION['uname'];
			if($uname!=""){
				session_destroy();
				echo "<script>document.location.href='.?pg=home&msg=$uname Logged Out!'</script>";
			}
			else{
				echo "<script>document.location.href='.?pg=home&msg=Logged Out!'</script>";
			}
		}
	}
?>