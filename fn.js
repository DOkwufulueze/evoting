function checkElection(){
	var catVal=document.getElementById("catVal").value;
	var catVar=document.getElementById("catVar").value;
	var election=document.getElementById("election").options[document.getElementById("election").selectedIndex].value;
	if(catVar==""||catVal==""||election==""){
		alert(":::Fill all fields.");
	}
	else{
		if(window.XMLHttpRequest){
			var rq=new XMLHttpRequest();
		}
		else if(window.ActiveXObject){
			var rq=new ActiveXObject("Microsoft.XMLHTTP");
		}
		if(rq){
			rq.onreadystatechange=function(){
				if(rq.readyState==4&&rq.status==200){
					mg=rq.responseText;
					if(mg=="0"){
						alert(":::The election combination does not exist.");
					}
					else if(mg=="00"){
						alert(":::The election date has passed.");
					}
					else if(mg=="000"){
						alert(":::Not time yet for election.");
					}
					else if(mg=="0000"){
						alert(":::You're not qualified to vote in this category.");
					}
					else if(mg=="00000"){
						alert(":::You already voted in this category.");
					}
					else if(mg=="1"){
						document.location.href=".?pg=vote&msg=Welcome to Voter's Page!";
					}
					else{
						alert(mg);
					}
				}
			}
			rq.open("GET", "checkElection.php?catVal="+catVal+"&catVar="+catVar+"&election="+election,true);//alert(mg);
			rq.send(null);
		}
	}
}

function demo(){
	var x=document.getElementById("bs");
	var y=document.getElementById("bs1");
	
	x.style.backgroundColor="#cfc";
	y.style.backgroundColor="#cfc";
}

function but(){
	var uname=document.getElementById("bs").value;
	var pwd=document.getElementById("bs1").value;
	var mg="Hello";
	if(window.XMLHttpRequest){
		var rq=new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		var rq=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(rq){
		rq.onreadystatechange=function(){
			if(rq.readyState==4&&rq.status==200){
				mg=rq.responseText;
				if(mg=="invalid"){
					alert("Invalid Username or Password!");
				}
				else if(mg=="valid"){
					document.location.href='.?pg=state&msg=Welcome to the Admin Page!';
				}
				else if(mg=="empty"){
					alert("Please fill all fields!");
				}
				alert(mg);
			}
		}
		rq.open("GET", "adminLogin.php?uname="+uname+"&pwd="+pwd,true);//alert(mg);
		rq.send(null);
	}
}					

function reg2(){
var t=document.getElementById("reg");
t.style.backgroundColor="#cfd"; 
t.style.borderRadius="10px 10px";
}				
function reg3(){
var t=document.getElementById("reg");
t.style.backgroundColor=""; 
t.style.borderRadius="";
}				
function reg4(){
var r=document.getElementById("reg0");
r.style.backgroundColor="#cfd"; 
r.style.borderRadius="10px 10px";
}
function reg5(){
var t=document.getElementById("reg0");
t.style.backgroundColor=""; 
t.style.borderRadius="";
}	
function reg7(){
var t=document.getElementById("reg6");
t.style.backgroundColor="#cfd"; 
t.style.borderRadius="10px 10px";
}	
function reg8(){
var t=document.getElementById("reg6");
t.style.backgroundColor=""; 
t.style.borderRadius="";
}	
function reg10(){
var t=document.getElementById("reg9");
t.style.backgroundColor="#cfd"; 
t.style.borderRadius="10px 10px";
}	
function reg11(){
var t=document.getElementById("reg9");
t.style.backgroundColor=""; 
t.style.borderRadius="";
}	
function reg13(){
var t=document.getElementById("reg12");
t.style.backgroundColor="#cfd"; 
t.style.borderRadius="10px 10px";
}	
function reg14(){
var t=document.getElementById("reg12");
t.style.backgroundColor=""; 
t.style.borderRadius="";
}			

function reg16(){
var t=document.getElementById("reg15");
t.style.backgroundColor="#cfd"; 
t.style.borderRadius="10px 10px";
}	
function reg17(){
var t=document.getElementById("reg15");
t.style.backgroundColor=""; 
t.style.borderRadius="";
}	
function reg19(){
var t=document.getElementById("reg18");
t.style.backgroundColor="#cfd"; 
t.style.borderRadius="10px 10px";
}	
function reg20(){
var t=document.getElementById("reg18");
t.style.backgroundColor=""; 
t.style.borderRadius="";
}			
		
					
function but2(){

}
function but3(){

}
function but4(){

}

function regSch(){
	var conf=document.getElementById("conf");
	var sch=document.getElementById("sch").options[document.getElementById("sch").selectedIndex].value;
	if(window.XMLHttpRequest){
		var rq=new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		var rq=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(rq){
		rq.onreadystatechange=function(){
			if(rq.readyState==4&&rq.status==200){
				var mg=rq.responseText;
				if(mg=="1"){
					conf.innerHTML="The information on "+sch+" was successfully added to the database!";
					conf.style.display="block";
				}
				else if(mg=="2"){
					conf.innerHTML="The information on "+sch+" already exists in the database!";
					conf.style.display="block";
				}
				else if(mg=="0"){
					conf.innerHTML="Sorry. The information on "+sch+" could not be added the database!";
					conf.style.display="block";
				}
				else if(mg=="empty"){
					conf.innerHTML="Please fill all fields!";
					conf.style.display="block";
				}
			}
		}
		rq.open("GET", "addSch.php?sch="+sch,true);//alert(state);
		rq.send(null);
	}
}

function regFac(){
	var conf=document.getElementById("conf");
	var sch=document.getElementById("sch").options[document.getElementById("sch").selectedIndex].value;
	var fac=document.getElementById("fac").options[document.getElementById("fac").selectedIndex].value;
	if(window.XMLHttpRequest){
		var rq=new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		var rq=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(rq){
		rq.onreadystatechange=function(){
			if(rq.readyState==4&&rq.status==200){
				var mg=rq.responseText;
				if(mg=="2"){
					conf.innerHTML="The information on "+fac+" Faculty already exists in the election database!";
					conf.style.display="block";
				}
				else if(mg=="noCode"){
					conf.innerHTML="Sorry. "+sch+" does not exist in the election database!";
					conf.style.display="block";
				}
				else if(mg=="empty"){
					conf.innerHTML="Please fill all fields!";//alert(sch);
					conf.style.display="block";//alert("Hello");
				}
				else{
					conf.innerHTML="The information on "+fac+" Faculty was successfully added to the election database!<br/>";
					conf.style.display="block";//alert("Hello");
				}
			}
		}
		rq.open("GET", "addFac.php?sch="+sch+"&fac="+fac,true);
		rq.send(null);
	}
}

function regDept(){
	var conf=document.getElementById("conf");
	var sch=document.getElementById("sch").options[document.getElementById("sch").selectedIndex].value;
	var fac=document.getElementById("fac").options[document.getElementById("fac").selectedIndex].value;
	var dept=document.getElementById("dept").options[document.getElementById("dept").selectedIndex].value;
	if(window.XMLHttpRequest){
		var rq=new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		var rq=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(rq){
		rq.onreadystatechange=function(){
			if(rq.readyState==4&&rq.status==200){
				var mg=rq.responseText;
				if(mg=="2"){
					conf.innerHTML="The information on "+dept+" already exists in the database!";
					conf.style.display="block";//alert("Hello");
				}
				else if(mg=="noCode"){
					conf.innerHTML="Sorry. "+sch+" and "+fac+" combination does not exist in the election database!";
					conf.style.display="block";
				}
				else if(mg=="empty"){
					conf.innerHTML="Please fill all fields!";//alert(sch);
					conf.style.display="block";//alert("Hello");
				}
				else{
					conf.innerHTML="The information on "+dept+" Department was successfully added to the election database!";
					conf.style.display="block";//alert("Hello");
				}
			}
		}
		rq.open("GET", "addDept.php?sch="+sch+"&fac="+fac+"&dept="+dept,true);
		rq.send(null);
	}
}

function valParty(){
	var party_code=document.getElementById("pt-code").value;
	var party_name=document.getElementById("pt-name").options[document.getElementById("pt-name").selectedIndex].value;
	if(party_code==""||party_name==""){
		alert("Please fill all fields");
	}
}

function valCandidate(){
	var conf=document.getElementById("conf");
	/*if(document.getElementById("which")){
		var which=document.getElementById("which").value;
		if(which!=""){//alert(which);
			//var wch=document.getElementById("\""+which+"\"").option[document.getElementById("\""+which+"\"").selectedIndex].value;
			var wch=document.getElementById(which).option[document.getElementById(which).selectedIndex].value;
		}
		else{
			var wch="";	
		}
	}
	else{
		var which="";
		var wch="";
	}*/
	var candidate_id=document.getElementById("candidate_id").value;
	var candidate_name=document.getElementById("candidate_name").value;
	var candidate_position=document.getElementById("candidate_position").options[document.getElementById("candidate_position").selectedIndex].value;
	var catVar=document.getElementById("catVar").value;
	var catVal=document.getElementById("catVal").value;
	if(candidate_id==""||candidate_name==""||candidate_position==""||catVar==""||catVal==""){
		alert("Please fill all fields");
	}
}

function checkPin(str){
	var elm=document.getElementById(str);
	if(document.getElementById("sbm")){
		var sbm=document.getElementById("sbm");
	}
	else{
		var sbm="";
	}
	var el=elm.value;
	if(el!=""){
		if(window.XMLHttpRequest){
			var rq=new XMLHttpRequest();
		}
		else if(window.ActiveXObject){
			var rq=new ActiveXObject("Microsoft.XMLHTTP");
		}
		if(rq){
			rq.onreadystatechange=function(){
				if(rq.readyState==4&&rq.status==200){
					var mg=rq.responseText;
					if(mg=="0"){
						//conf.innerHTML="Invalid Pin!";
						//conf.style.display="block";
						elm.value="";
						alert("Invalid Pin!");
						if(sbm!=""){
							sbm.disabled=true;
						}
					}
					else if(mg=="2"){
						//conf.innerHTML="Already used Pin!";
						//conf.style.display="block";
						elm.value="";
						alert("Already Used Pin!");
						if(sbm!=""){
							sbm.disabled=true;
						}
					}
					else{ 
						if(sbm!=""){
							sbm.disabled=false;
						}
					
					}
				}
			}
			rq.open("GET", "checkPin.php?pin="+el,true);
			rq.send(null);
		}
	}
}

function valPin(){
	var amount=document.getElementById("amount").value;
	if(amount<1||amount>10||amount==""||isNaN(amount)){
		alert("Please supply an integer not greater than 10!");
	}
}

function clears(str){
	var elm=document.getElementById(str);
	/*if(elm.value=="dd"||elm.value=="mm"||elm.value=="yyyy"||elm.value=="HH"||elm.value=="mm"||elm.value=="ss"){
		elm.value="";
	}*/
	if(isNaN(elm.value)){
		elm.value="";
	}
}

function clears2(str){
	var elm=document.getElementById(str);
	var el=elm.value;
	if(isNaN(el)||el==""){
		if(str=="day"){ elm.value="DD";}else if(str=="month"){ elm.value="MM";}else if(str=="year"){ elm.value="YYYY";}
		else if(str=="s_hour"){ elm.value="HH";}else if(str=="s_minute"){ elm.value="mm";}else if(str=="s_second"){ elm.value="ss";}
		else if(str=="e_hour"){ elm.value="HH";}else if(str=="e_minute"){ elm.value="mm";}else if(str=="e_second"){ elm.value="ss";}
	}
	else{
		if(str=="day"&&(el.length!=2||eval(el)>31)){ elm.value="DD";}else if(str=="month"&&(el.length!=2||eval(el)>12)){ elm.value="MM";}else if(str=="year"&&el.length!=4){ elm.value="YYYY";}
		else if(str=="s_hour"&&(el.length!=2||eval(el)>23)){ elm.value="HH";}else if(str=="s_minute"&&(el.length!=2||eval(el)>59)){ elm.value="mm";}else if(str=="s_second"&&(el.length!=2||eval(el)>59)){ elm.value="ss";}
		else if(str=="e_hour"&&(el.length!=2||eval(el)>23)){ elm.value="HH";}else if(str=="e_minute"&&(el.length!=2||eval(el)>59)){ elm.value="mm";}else if(str=="e_second"&&(el.length!=2||eval(el)>59)){ elm.value="ss";}
	}
}

function regElection(){
	var conf=document.getElementById("conf");
	var catVar=document.getElementById("catVar").value;
	var catVal=document.getElementById("catVal").value;
	var election=document.getElementById("election").options[document.getElementById("election").selectedIndex].value;
	var day=document.getElementById("day").value;
	var month=document.getElementById("month").value;
	var year=document.getElementById("year").value;
	var s_hour=document.getElementById("s_hour").value;
	var s_minute=document.getElementById("s_minute").value;
	var s_second=document.getElementById("s_second").value;
	var e_hour=document.getElementById("e_hour").value;
	var e_minute=document.getElementById("e_minute").value;
	var e_second=document.getElementById("e_second").value;
	if(catVar==""||catVal==""||election==""||day==""||isNaN(day)||month==""||isNaN(month)||year==""||isNaN(year)||s_hour==""||isNaN(s_hour)||s_minute==""||isNaN(s_minute)||s_second==""||isNaN(s_second)||e_hour==""||isNaN(e_hour)||e_minute==""||isNaN(e_minute)||e_second==""||isNaN(e_second)){
		alert("Please fill all fields, and suply the appropriate digits for the date and time fields!");
	}
	else{
		if(eval(day)>28&&eval(month)==2&&eval(year)%4!=0){
			document.getElementById("day").value="DD";
				alert("The year "+year+" is NOT a Leap Year, so it cannot have more than 28 days!");
		}
		else{
			var startDateTime=year+"-"+month+"-"+day+" "+s_hour+":"+s_minute+":"+s_second ;
			var endDateTime=year+"-"+month+"-"+day+" "+e_hour+":"+e_minute+":"+e_second ; 
			if(window.XMLHttpRequest){
				var rq=new XMLHttpRequest();
			}
			else if(window.ActiveXObject){
				var rq=new ActiveXObject("Microsoft.XMLHTTP");
			}
			if(rq){
				rq.onreadystatechange=function(){
					if(rq.readyState==4&&rq.status==200){
						var mg=rq.responseText;
						if(mg=="0"){
							conf.innerHTML="The Year : "+year+" is past. Enter a valid election year!";
							conf.style.display="block";
						}
						else if(mg=="00"){
							conf.innerHTML="The date you supplied has passed. Please Enter a valid election date and time!";
							conf.style.display="block";
						}
						else if(mg=="000"){
							conf.innerHTML="Your start time is greater than the stop time. The start time should be less than the stop time!";
							conf.style.display="block";
						}
						else if(mg=="0000"){
							conf.innerHTML="Your start time is the same as the stop time. The start time should be less than the stop time!";
							conf.style.display="block";
						}
						else if(mg=="1"){
							conf.innerHTML="Election details saved!<br />Election Type : "+catVal+" ("+election+")<br />Date : "+day+"-"+month+"-"+year+"<br />Start Time : "+s_hour+":"+s_minute+":"+s_second+"<br />Stop Time : "+e_hour+":"+e_minute+":"+e_second+"<br />";
							conf.style.display="block";
						}
						else if(mg=="2"){
							conf.innerHTML="Details about "+catVal+" ("+election+") election already exists in the database!";
							conf.style.display="block"; 
						}//alert("Hello");
						else if(mg=="empty"){
							alert("Please fill something");
						}
					}
				}
				rq.open("GET", "addElection.php?catVar="+catVar+"&catVal="+catVal+"&election="+election+"&startDateTime="+startDateTime+"&endDateTime="+endDateTime,true);
				rq.send();
			}
		}
	}
}

function disableBtn(str){
	onload=function(){
		var cnf=document.getElementById(str);
		cnf.disabled=true;
	}
}

function enableBtn(src,str){
	var cnf=document.getElementById(str);
	var chck=document.getElementById(src);
	if(chck.checked){
		cnf.disabled=false;
	}
	else if(chck.checked==false){
		cnf.disabled=true;
	}
}

function enableBtn2(src,str){
	var btn=document.getElementById(str);
	var txt=document.getElementById(src).value;
	if(txt!=""){
		btn.disabled=false;
	}
	else if(txt==""){
		btn.disabled=true;
	}
}

function regUser(){
	var sname=document.getElementById("sname").value;
	var fname=document.getElementById("fname").value;
	var oname=document.getElementById("oname").value;
	var name=sname+" "+fname+" "+oname;
	var sex=document.getElementById("sex").options[document.getElementById("sex").selectedIndex].value;
	var phone=document.getElementById("phone").value;
	var day=document.getElementById("day").value;
	var month=document.getElementById("month").value;
	var year=document.getElementById("year").value;
	var dob=day+"/"+month+"/"+year;
	var sch=document.getElementById("sch").options[document.getElementById("sch").selectedIndex].value;
	var fac=document.getElementById("fac").options[document.getElementById("fac").selectedIndex].value;
	var dept=document.getElementById("dept").options[document.getElementById("dept").selectedIndex].value;
	var uname=document.getElementById("uname").value;
	var pwd=document.getElementById("pwd").value;
	var pwd1=document.getElementById("pwd1").value;
	
	var email=document.getElementById("email").value;
	var sta=document.getElementById("status").options[document.getElementById("status").selectedIndex].value;;
	
	var na=document.getElementById("na");
	var se=document.getElementById("se");
	var ph=document.getElementById("ph");
	var em=document.getElementById("em");
	var ma=document.getElementById("ma");
	var da=document.getElementById("da");
	var sc=document.getElementById("sc");
	var fa=document.getElementById("fa");
	var de=document.getElementById("de");
	var un=document.getElementById("un");
	var filter=/^.+@.+\..{2,4}$/;
	if(sname==""||fname==""||oname==""||sex==""||phone==""||email==""||day==""||month==""||year==""||sch==""||fac==""||dept==""||uname==""||pwd==""||pwd1==""){
		alert("Please fill all compulsory fields!");
		$("document").ready(function(){
			$("#prev").hide(2000);
		});
	}
	else if (!filter.test(email)){
		alert(":::Please enter a valid email address.");
		$("document").ready(function(){
			$("#prev").hide(2000);
		});
	}
	else if(isNaN(day)||isNaN(month)||isNaN(year)||(eval(day)>28&&eval(month)==2&&eval(year)%4!=0)){
		document.getElementById("day").value="DD";
		alert("Please fill in the appropriate digits for Date of Birth. Non Leap-year must not have over 28 days!");
		$("document").ready(function(){
			$("#prev").hide(2000);
		});
	}
	else if(pwd!=pwd1){
		alert("Your Confirmation Password must match the Original Password");
		$("document").ready(function(){
			$("#prev").hide(2000);
		});
	}
	else{
		var dob=year+"-"+month+"-"+day;
		if(window.XMLHttpRequest){
			var rq=new XMLHttpRequest();
		}
		else if(window.ActiveXObject){
			var rq=new ActiveXObject("Microsoft.XMLHTTP");
		}
		if(rq){
			rq.onreadystatechange=function(){
				if(rq.readyState==4&&rq.status==200){
					var mg=rq.responseText;
					if(mg=="0"){
						alert(":::Invalid Date of birth.");
						$("document").ready(function(){
							$("#prev").hide(2000);
						});
					}
					else if(mg=="1"){
						$("document").ready(function(){
							$("#mainForm").hide(2000);
							$("#prev").show(1600);
						});
						na.innerHTML=name;
						se.innerHTML=sex;
						ph.innerHTML=phone;
						em.innerHTML=email;
						ma.innerHTML=sta;
						da.innerHTML=dob;
						sc.innerHTML=sch;
						fa.innerHTML=fac;
						de.innerHTML=dept;
						un.innerHTML=uname;
					}
				}
			}
			rq.open("GET", "checkAge.php?dob="+dob,true);
			rq.send();
		}
	}
}

function editt(){
	$("document").ready(function(){
		$("#mainForm").show(1600);
		$("#prev").hide(2000);
	});
}

function voteLogin(){
	var uname=document.getElementById("uname").value;
	var pwd=document.getElementById("pwd").value;
	var pinObj=document.getElementById("pin");
	var pin=pinObj.value;
	var mg="";
	if(uname==""||pwd==""||pin==""){
		alert("Please fill all fields!");
	}
	else{
		if(window.XMLHttpRequest){
			var rq=new XMLHttpRequest();
		}
		else if(window.ActiveXObject){
			var rq=new ActiveXObject("Microsoft.XMLHTTP");
		}
		if(rq){
			rq.onreadystatechange=function(){
				if(rq.readyState==4&&rq.status==200){
					var mg=rq.responseText;
					if(mg=="0"){
						alert(":::Invalid Username, Password or Voter Code.");
						pinObj.value="";
					}
					else if(mg=="1"){
						document.location.href=".?pg=selectelec";
					}
				}
			}
			rq.open("GET", "checkUser.php?uname="+uname+"&pwd="+pwd+"&pin="+pin,true);
			rq.send();
		}
	}
}

function checkElectionType(str){
	var dan=document.getElementById("dan");
	if(window.XMLHttpRequest){
		var rq=new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		var rq=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(rq){
		rq.onreadystatechange=function(){
			if(rq.readyState==4&&rq.status==200){
				var mg=rq.responseText;
				if(mg=="0"){
					alert("You cannot vote for any candidate in this category for now!");
				}
				else if(mg=="00"){
					alert("The election type "+str+" does not exist in our database for now!");
				}
				else if(mg=="1"){
					document.location.href=".?pg=userlogin&type="+str;
				}
				else{
					dan.innerHTML=mg;
				}
			}
		}
		rq.open("GET", "checkElectionType.php?type="+str,true);
		rq.send();
	}
}

/*function userLogin(str1,str2){
	var con_code=document.getElementById("candidate_position").options[document.getElementById("candidate_position").selectedIndex].value;
	document.location.href="pg=userlogin&type="+str1+"&constituency="+str2;
}*/
function popWhich(){
	var pos=document.getElementById("candidate_position").options[document.getElementById("candidate_position").selectedIndex].value;
	var pin=document.getElementById("candidate_id").value;
	var sbm=document.getElementById("sbm");
	var which=document.getElementById("which");
	var which2=document.getElementById("which").value;
	var popWhich=document.getElementById("popWhich");
	var wch=""; var wrd="";
	if(pos=="Federal Representative"){
		wch="federal_constituency";
		wrd="Federal Constituency";
		which.value=wch;
	}
	else if(pos=="Presidential"){
		which.value="";
	}
	else if(pos=="Senatorial"){
		wch="senatorial_constituency";
		wrd="Senatorial Cconstituency";
		which.value=wch;
	}
	else if(pos=="Gubernatorial"||pos=="State Assembly"){
		wch="state";
		wrd="State";
		which.value=wch;
	}
	else if(pos=="Councillorship"||pos=="LGA Chairmanship"){
		wch="lga_name";
		wrd="L.G.A.";
		which.value=wch;
	}
	if(window.XMLHttpRequest){
		var rq=new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		var rq=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(pos!="Presidential"&&pos!=""){
		if(rq){
			rq.onreadystatechange=function(){
				if(rq.readyState==4&&rq.status==200){
					var mg=rq.responseText;
					if(mg=="0"){
						alert("The corresponding constituency for the category "+pos+" does not exist for now!");
						sbm.disable=true;
					}
					else{
						if(pin!=""){
							sbm.disable=false;
						}
						popWhich.innerHTML=wrd+": "+mg+"<br />";
						popWhich.style.display="block";//alert(mg);
						/*$("document").ready(
							function(){
								$("popWhich").show(1500);
							}
						)*/
					}
				}
			}
			rq.open("GET", "popWhich.php?wch="+wch,true);
			rq.send();
		}
	}
	else if(pos==""||pos=="Presidential"){
		which.value="";
		popWhich.innerHTML="";
		popWhich.style.display="none";
	}
}

function showVoter(pg){
	var srch=document.getElementById("srch").value;
	if(srch!=""){
		var dv;
		if(document.getElementById("dan")){
			dv=document.getElementById("dan");
		}
		if(document.getElementById("image1")){
			dv=document.getElementById("image1");
		}
		else if(document.getElementById("man-1")){
			dv=document.getElementById("man-1");
		}
		else if(document.getElementById("field")){
			dv=document.getElementById("field");
		}
		else if(document.getElementById("report")){
			dv=document.getElementById("report");
		}
		else{
			dv=document.createElement("div");
			dv.id="dv";
			dv.style.width=400;
			dv.style.height=400;
		}
		dv.style.background="#efefef";
		dv.style.color="#44ba33";
		var xhr;
		if(XMLHttpRequest){
			xhr= new XMLHttpRequest();
		}
		else if(window.ActiveXObject){
			xhr=new ActiveXObject("Microsoft.XMLHTTP");
		}
		if(xhr){
			xhr.onreadystatechange=function(){
				if(xhr.readyState==4&&xhr.status==200){
					var msg=xhr.responseText;
					if(msg=="0"){
						alert(":::You must log in as Admin to search voters.");
					}
					else{
						if(msg=="nil"){
							dv.innerHTML="Voter with the search attribute not found.";
						}
						else{
							dv.innerHTML=msg;
						}
					}
				}
			}
			xhr.open("GET","searchVoters.php?srch="+srch+"&pg="+pg,true);
			xhr.send(null);
		}
	}
}

function popFacsAndDepts(sch,fac,dept){
	var xhr;
	var msg;
	if(window.XMLHttpRequest){
		xhr=new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		xhr=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(xhr){
		xhr.onreadystatechange=function(){//alert(xhr.status);
			if(xhr.readyState==4&&xhr.status==200){
				msg=xhr.responseText;//alert(msg);
				var facs=msg.substr(0,msg.indexOf("~"));
				var depts=msg.substr(msg.indexOf("~")+1);
				document.getElementById(fac).innerHTML=facs;
				document.getElementById(dept).innerHTML=depts;
			}
		}
		xhr.open("GET","getFacsAndDeptsFromSch.php?sch="+sch,true);
		xhr.send();
	}
}

function popDepts(fac,affected){
	//document.getElementById(affected);
	var xhr;
	var msg;
	if(window.XMLHttpRequest){
		xhr=new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		xhr=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(xhr){
		xhr.onreadystatechange=function(){//alert(xhr.status);
			if(xhr.readyState==4&&xhr.status==200){
				msg=xhr.responseText;//alert(msg);
				document.getElementById(affected).innerHTML=msg;
			}
		}
		xhr.open("GET","getDeptsFromFac.php?fac="+fac,true);
		xhr.send();
	}
}
