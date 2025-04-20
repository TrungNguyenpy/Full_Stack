
<?php 

	switch($_GET['go'])
	{
		case "home" :
		include ("home.php") ;
		break;
		
		
		case "slider" :
		include ("slider.php") ;
		break;
			
			case "choban" :
		include ("choban.php") ;
		break;
		
		
		case "tablet" :
		include ("balet.php") ;
		break;
		
		
		case "quangcao" :
		include ("quangcao.php") ;
		break;
		
		case "chat" :
		include ("chat.php") ;
		break;
		
		case "canhga" :
		include ("canhga.php") ;
		break;
		
		case "lienhe" :
		include ("lienhe.php") ;
		break;
		
		case "baiviet" :
		include ("baiviet.php") ;
		break;
		
		
		case "xlylienhe" :
		include ("xlylienhe.php") ;
		break;
		
		case "xldangnhap" :
		include ("xldangnhap.php") ;
		break;
		
		
		case "detail_ts":
		include ("detail_ts.php");
		break;
		
		case "detail_tinkm":
		include ("detail_tinkm.php");
		break;
		
		case "detail_sp":
		include ("detail_sp.php");
		break;
		
		case "showcart":
		include ("showcart.php");
		break;
		
		case "addcart":
		include ("addcart.php");
		break;
		
		case "delcart":
		include ("delcart.php");
		break;
	
		default :
		include("home.php");
	
	}
	
?>
