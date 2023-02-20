
<?php
	// Defi -> Ok
	//$path = ServerRequestUri::getServerRU(); 
	
    if(ServerRequestUri::getServerRU() === '/defi/'){
       // echo '/home';
	}else{// echo ServerRequestUri::getServerRU();
	} 
	switch (ServerRequestUri::getServerRU()) {
	case '/defi/': //home
		if((!isset($_SESSION['first_name'])) && (!isset($_SESSION['user_id']))){
		echo LoadRegiNav::getRegiNav() .' '. LoadLoginNav::getLoginNav();
		} else{
			echo '<span style="color:#808A9B;font-weight:bold;">' . $_SESSION['first_name'] . ' </span>';
			$uri = (isset($_SESSION['user_level']) == 1) ? LoadMyAdminNav::getMyAdminNav() : LoadMyUserNav::getMyUserNav(); 
			echo $uri .' '.  LoadLogoutNav::getLogoutNav();
		}
		break;
		case '/defi/index.php': //index.php
		if((!isset($_SESSION['first_name'])) && (!isset($_SESSION['user_id']))){
		echo LoadRegiNav::getRegiNav() .' '.LoadLoginNav::getLoginNav();
		}else{echo LoadMyAccLogoutNav::getAccLogoutNav();}
		break; 	     
	case '/user_registration': //user_registration.php
        if((!isset($_SESSION['first_name'])) && (!isset($_SESSION['user_id']))){
			echo LoadHomeLoginNav::getHomeLoginNav();
		}else{echo LoadMyAccLogoutNav::getAccLogoutNav();}
        break;
	case '/login': // login
        if((!isset($_SESSION['first_name'])) && (!isset($_SESSION['user_id']))){
		echo LoadHomeRegiNav::getHomeRegiNav();
		}else{echo LoadMyAccLogoutNav::getAccLogoutNav();}
		break;
		case '/login.php': // login.php
		if((!isset($_SESSION['first_name'])) && (!isset($_SESSION['user_id']))){
		echo LoadHomeRegiNav::getHomeRegiNav();
		}else{echo LoadMyAccLogoutNav::getAccLogoutNav();}
		break; 
	case '/admin': //admin.php
			echo LoadAdminNav::getAdminNav();
		break;
	case '/user': //user.php
			echo LoadIndexNav::getIndexNav() .' '. LoadLogoutNav::getLogoutNav();
		break;
	
	case '/change_password': //change_password.php
			echo LoadIndexNav::getIndexNav().' '.LoadLogoutNav::getLogoutNav();
		break;
	} 
    ?>
