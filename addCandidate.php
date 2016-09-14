<?php
	include("class.php");
	evoting::db();
	$uploads="C:/wamp/www/evoting/candidates/";
	$candidate_id=htmlentities($_POST['candidate_id']);
	$candidate_name=htmlentities($_POST['candidate_name']);
	$candidate_position=htmlentities($_POST['candidate_position']);
	$sch=htmlentities($_POST['candiSch']);
	$fac=htmlentities($_POST['candiFac']);
	$dept=htmlentities($_POST['candiDept']);
	$catVar=htmlentities($_POST['catVar']);
	$catVal=htmlentities($_POST['catVal']);
	$candidate_image=$_FILES['candidate_image']['name'];
	$candidate_image_type=$_FILES['candidate_image']['type'];
	$candidate_image_size=$_FILES['candidate_image']['size'];
	$candidate_image_location=$_FILES['candidate_image']['tmp_name'];
	$q=mysql_query("SELECT * FROM pins WHERE pin='$candidate_id' AND status!='Used'") or die(mysql_error());
	$n=mysql_num_rows($q);
	if($n==0){
		echo "<script>document.location.href='.?pg=candidate&msg=Invalid or Used Pin!&candidate_name=$candidate_name&candidate_position=$candidate_position'</script>";
	}
	else{
		if($dept!=$catVal&&$fac!=$catVal&&$sch!=$catVal){
			echo "<script>document.location.href='.?pg=candidate&msg=Candidate must be a member of the group he/she wants to hold a post with.&candidate_name=$candidate_name&candidate_position=$candidate_position'</script>";
		}
		else{
			if($candidate_image==""){
				echo "<script>document.location.href='.?pg=candidate&msg=Please choose a Candidate Image&candidate_name=$candidate_name&candidate_position=$candidate_position'</script>";
			}
			else{
				if($candidate_image_type!="image/pjpeg"&&$candidate_image_type!="image/jpeg"&&$candidate_image_type!="image/gif"){
					echo "<script>document.location.href='.?pg=candidate&msg=Please Upload an image of any of the following types(JPEG, GIF).&candidate_name=$candidate_name&candidate_position=$candidate_position'</script>";
				}
				else{
					if($candidate_image_size>100000){
						echo "<script>document.location.href='.?pg=candidate&msg=Please Upload an image of size 100KB or lesser!&candidate_name=$candidate_name&candidate_position=$candidate_position'</script>";
					}
					else{
						$q=mysql_query("SELECT * FROM mng_candi WHERE candidate_id='$candidate_id' OR candidate_name='$candidate_name'") or die(mysql_error());
						$n=mysql_num_rows($q);
						if($n>0){//Candidate already registered
							echo "<script>document.location.href='.?pg=candidate&msg=:::Candidate already registered&candidate_name=$candidate_name&candidate_position=$candidate_position'</script>";
						}
						else{
							if(move_uploaded_file($candidate_image_location,$uploads.$candidate_image)){
								mysql_query("INSERT INTO mng_candi(candidate_id,candidate_name,candidate_image,candidate_position,election_category,dept,fac,sch,votes) VALUES('$candidate_id','$candidate_name','$candidate_image','$candidate_position','$catVar','$dept','$fac','$sch','0')") or die(mysql_error());
								mysql_query("UPDATE pins SET user='Candidate', status='Used', used_by='$candidate_name' WHERE pin='$candidate_id'")or die(mysql_error());
								echo "<script>document.location.href='.?pg=candidate&msg=Candidate Successfully Registered!&candidate_id=$candidate_id'</script>";
							}
						}
					}
				}
			}
		}
	}
?>