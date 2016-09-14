<?php
	//$y=include("home.php");
	switch($_GET['pg']=!isset($_GET['pg'])?"":$_GET['pg'])
	{
		case "home":
		include("home.php");
		break;
		
		case "register":
		include ("register.php");
		break;
		
		case "faculty":
		include("mngfac.php");
		break;
		
		case "school":
		include("mngsch.php");
		break;
	
		case "department":
		include("mngdept.php");
		break;
	
		case "election":
		include("mngelection.php");
		break;
	
		case "accreditation":
		include("mngaccreditation.php");
		break;
	
		case "registration":
		include("mngregistration.php");
		break;
	
		case "candidate":
		include("mngcandidate.php");
		break;
	
		case "userlogin":
		include("userlogin.php");
		break;
		
		case "user":
		include("user-reg.php");
		break;
	
		case "admin":
		include("adim-reg.php");
		break;
		
		case "reg":
		include("registration.php");
		break;
		
		case "selectelec":
		include("selectelec.php");
		break;
		
		case "pins":
		include("pins.php");
		break;
		
		case "report":
		include("report.php");
		break;
		
		case "reportPublic":
		include("reportPublic.php");
		break;
		
		case "vote":
		include("vote.php");
		break;
		
		case "logout":
		include("class.php");
		evoting::logout();
		break;
	
		default:
		include("home.php");
		break;
	}
?>