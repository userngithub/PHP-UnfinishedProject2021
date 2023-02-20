<?php
/*
* Class
* @class
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/defi/include/classes/user_data.php');
// Single Variable
class ProtectVar{
    // @username
    protected $_username;
    public function __construct($username){
        $this->_username = $username;
    }

    // @validpass
    protected $_validpass;
    
    public function getValidPass(){
        return $this->_validpass;
    }

     // @user_admin
     protected $_user_admin;
    // @userpass
    protected $_email;
    
    // @loadfirstname
    protected $_firstname;
    /** 
     * @datauser input error
    */
    protected $_username_err;
    protected $_user_email_err;
    protected $_userpass_err;
    // @submit form
    protected $_subForm;

/*
    public function __construct($username){
        $this->_username = $username;
    }
*/
    public function getUsername(){
        return $this->_username;
    }


    // @getUsername
    public function getUserAdmin(){ 
        $_username = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        return $this->_user_admin;}

    //@getUserPass
    

    
    //@getUserEmail
    public function getEmail(){
        return $this->_email;
    }
    
    /**
     * @getdataError 
     */ 
    public function getUnErr(){
        return $this->_username_err;
    }
    public function getUpErr(){
        return $this->_userpass_err;
    }
    public function getUeErr(){
        return $this->_user_email_err;
    }

    
    public function getSubForm(){ return $this->_subForm; }
 
 

} 

/**
 * @Db
 */
/*class Db
	{
		private static $_hn = "localhost";
		private static $_mu = "smysql";
		private static $_mp = "az19";
		private static $_db = "sitedb";

		protected static $_con = NULL;

		public static function getCon(){
			if(!Db::$_con){
				try{
				self::$_con = new PDO('mysql:host='.self::$_hn.';dbname='.self::$_db, self::$_mu, self::$_mp);
				self::$_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "Successful connection to mysql!"; 
				}catch(PDOException $b){
					echo 'Connected failed: ' . $b->getMessage();
				}
			}
			return self::$_con;
		}

		private function __construct(){

		}
    }
    *//*
    class ConnectDB
	{
		private static $_hn = "localhost";
		private static $_mu = "smysql";
		private static $_mp = "az19";
		private static $_db = "sitedb";

		protected static $_con = NULL;

		public static function getConnectDB(){
			if(!ConnectDB::$_con){
				try{
                self::$_con = new mysqli(self::$_hn,self::$_mu,self::$_mp,self::$_db);
                mysqli_set_charset(ConnectDB::$_con, 'utf8');
				// echo "Successful connection to mysql!"; 
				}catch(PDOException $b){
					echo 'Connected failed: ' . $b->getMessage();
				}
			}
			return self::$_con;
		}

		private function __construct(){

		}
    }

*/

/**
* @Top
*//*
class LoadTop
{
    private static $_top;
    public static function getTop()
    {           
        self::$_top ='
<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="shortcut icon" type="image/x-icon" href="/image/favicon.ico">
        <link href="/defi/css/style.css" rel="stylesheet" type="text/css">
        <script src="/defi/include/getload.js"></script>'; 
        return LoadTop::$_top;
    }
    private function __construct(){ }
} 
*/
/**
* @Searchbox
*/
/*
class LoadSearchBox1
{
    private static $_searchbox;
    public static function getSearchBox1(){
        self::$_searchbox = '<form action="/result_page" method="GET">
                        <input type="text" style="border-radius:3px;padding:5px;font-size:16px;" name="user_search" id="user_search" value="" size="35" class="besearch" placeholder="Searh here" />
                        <input type="submit" style="border-radius:3px;padding:5px;font-size:15px;cursor:pointer;" name="Scuosearch" value="&nbsp;Search&nbsp;" />
                </form>';
        return self::$_searchbox;
    }
    private function __construct(){ }
}
class LoadSearchBox
{
    private static $_searchbox;
    public static function getSearchBox(){
        self::$_searchbox = '
       <div> <form action="/result_page" method="GET">
                        <input type="text" class="insearch" name="user_search" id="user_search" value="" maxlength="500" placeholder="Searh here" />
                        </div>
                        <div class="imgsearch"><img src="/icon/search.PNG" type="submit" style="cursor:pointer;" name="Scuosearch" />
                </div></form>';
        return self::$_searchbox;
    }
    private function __construct(){ }
}
*/
/**
* @Dropdown Nav
* 10% Not Compatible 
*/
class LoadDropdownNav
{
    private static $_dropdownNav;
    public static function getDropdownNav(){
        self::$_dropdownNav = '<button class="btn" onclick="navDD()" class="hrefdd">Edit My Account</button>
            <div id="idnavuser" class="navuserddcon">
            <a href="#home">Il Mio Profilo</a>
            <a href="#about">Il Mio Ordine</a>
            <a href="#home">New Password</a>
            <a href="#home">Cambia Indirizzo</a>
            <a href="#contact">Pagamento</a>
            </div>';
        return self::$_dropdownNav;
    }
    private function __construct(){ }
}





/**
* @RegistrationNav
*/
class LoadRegiNav
{
    private static $_RegiNav;
    public static function getRegiNav(){
        self::$_RegiNav = '<button class="btn" onclick="location.href = \'/user_registration\'">Register</button>';
        return self::$_RegiNav;
    }
    private function __construct(){ }
}

/**
* @HomeLoginNav
*/
class LoadHomeLoginNav
{
    private static $_homeLoginNav;
    public static function getHomeLoginNav(){
        self::$_homeLoginNav = '<button class="btn" onclick="location.href = \'/defi/\'" >Home</button>'
		.' '.'<button class="btn" onclick="location.href = \'/login\'">Login</button>';
        return self::$_homeLoginNav;
    }
    private function __construct(){ }
}

/**
* @LoadAdminNav
*/
class LoadMyAdminNav
{
    private static $_myAdminNav;
    public static function getMyAdminNav(){
        self::$_myAdminNav = '<button class="btn" onclick="location.href = \'/admin\'" >My Account</button>';
        return self::$_myAdminNav;
    }
    private function __construct(){ }
}

/**
* @LoadUserNav
*/
class LoadMyUserNav
{
    private static $_myUserNav;
    public static function getMyUserNav(){
        self::$_myUserNav = '<button class="btn" onclick="location.href = \'/user\'" >My Account</button>';
        return self::$_myUserNav;
    }
    private function __construct(){ }
}



/**
* @LoadLogoutNav
*/
class LoadLogoutNav
{
    private static $_logoutNav;
    public static function getLogoutNav(){
        self::$_logoutNav = '<button class="btn" onclick="location.href = \'/logout\'" >Logout</button>';
        return self::$_logoutNav;
    }
    private function __construct(){ }
}



/**
* @LoadHomeRegiNav
*/
class LoadAdminNav
{
    private static $_adminNav;
    public static function getAdminNav(){
        self::$_adminNav = '<button class="btn" onclick="location.href = \'/defi/\'" >Home</button>
        <button class="btn" onclick="location.href = \'/defi/adm/view_users.php\'">View Members</button>
		<button class="btn" onclick="location.href = \'/defi/index.php?content=logout\'" >Logout</button>
	 	';
        return self::$_adminNav;
    }
    private function __construct(){ }
}


/**
* @SideNav
*/
class LoadSideNav
{
    private static $_sideNav;
    public static function getSideNav(){
        self::$_sideNav = '<button id="navsx" onclick="location.href = \'/edit_myaccount/\'">Edit My Account</button>
        <button id="navsx" onclick="location.href = \'/myorders/\'">Il Mio Ordini</button>
        <button id="navsx" onclick="location.href = \'/change_phone/\'">Telefono</button>
        <button id="navsx" onclick="location.href = \'/change_address/\'">Indirizzo</button>
        <button id="navsx" onclick="location.href = \'/method_payment/\'">Pagamento</button>
        <button id="navsx" onclick="location.href = \'/change_password\'">Change Password</button>
        <button id="navsx" onclick="location.href = \'/defi/\'">Argomento 7</button>';
        return self::$_sideNav;
    }
    private function __construct(){ }
}

/**
* @UserpriNav
*/
class LoadUserPriNav
{
    private static $_userPriNav;
    public static function getUserPriNav(){
        self::$_userPriNav = '<div class="rownav0" style="text-align:center;"><a href = \'/edit_myaccount/\' style="text-decoration:none;">Edit My Account</a></div>
        <div class="rownav1" style="text-align:center;"><a href = \'/myorders/\' style="text-decoration:none;">Il Mio Ordini</a></div>
        <div class="rownav0" style="text-align:center;"><a href = \'/change_phone/\' style="text-decoration:none;">Telefono</a></div>
        <div class="rownav1" style="text-align:center;"><a href = \'/change_address/\' style="text-decoration:none;">Indirizzo</a></div>
        <div class="rownav0" style="text-align:center;"><a href = \'/method_payment/\' style="text-decoration:none;">Pagamento</a></div>
        <div class="rownav1" style="text-align:center;"><a href = \'/change_password\' style="text-decoration:none;">Change Password</a></div>
        <div class="rownav0" style="text-align:center;"><a href = \'/defi/\' style="text-decoration:none;">Argomento 7</a></div>';
        return self::$_userPriNav;
    }
    private function __construct(){ }
}

/**
 * AutoLoadContent
 * @param $defi
 *//*
class AutoLoadContent
{
    static public function CaricaContent($dove, $defi='') {
    $content = filter_input(INPUT_GET, $dove, FILTER_SANITIZE_STRING);
    $defi = filter_var($defi, FILTER_SANITIZE_STRING);
    $content = (empty($content)) ? $defi : $content;
    if ($content) {
	    $page = require_once($_SERVER['DOCUMENT_ROOT'] . '/defi/content/'.$content.'.php');
	    return $page;
    }
    }
}
*/
/**
* @ConfirmRegistration
*/
class ConfirmRegistration
{
    private static $_confirmReg;
    public static function getConfirmReg(){
        self::$_confirmReg = "<?php session_start(); echo '<p>Ciao,' . \$_SESSION['first_name'] . '</p>'; ?>";
        return self::$_confirmReg;
    }
    private function __construct(){ }
}

/**
* @LoadMysqliStmtBindParam
*/
class MysqliStmtBindParam
{
    private static $_mysqliSBP;
    public static function getMysqliSBP(){
        self::$_mysqliSBP = 'Mysqli_stmt_bind_param';
        return self::$_mysqliSBP;
    }
    private function __construct(){ }
}

/**
* @LoadServerDocumentRoot
*/ 
/*class ServerDocumentRoot
{
    private static $_serverDR;
    public static function getServerDR(){
        self::$_serverDR = $_SERVER['DOCUMENT_ROOT'];
        return self::$_serverDR;
    }
    private function __construct(){ }
}
*/
/**
* @LoadServerRequestUri
*/
class ServerRequestUri
{
    private static $_serverRU;
    public static function getServerRU(){
        self::$_serverRU = $_SERVER['REQUEST_URI'];
        return self::$_serverRU;
    }
    private function __construct(){ }
}

/**
* @LoadServerRequestUri
*/
class ServerRequestMethod
{
    private static $_serverRM;
    public static function getServerRM(){
        self::$_serverRM = $_SERVER['REQUEST_METHOD'];
        return self::$_serverRM;
    }
    private function __construct(){ }

}

/**
* @LoadGlobalVar
*/
class LoadGlobalVar
{
    protected $_globalVar;

    public function __construct($globalVar){
        $this->_globalVar = $globalVar;
    }

    public function getGlobalVar(){
        return $this->_globalVar;
    }

}

/**
* @LoadContent
*/
class LoadContent
{
    protected $_content;
     public function __construct($_content){
        $this->_content = $_content;
    }
    public function getLoadContent(){
        return $this->_content;
    }
   
}

/** 
* @Footer
*/
class LoadFooter
{
    private static $_footer;

    public static function getFooter(){
        self::$_footer = ' miosito.com &copy;'. (date('Y'));
     return self::$_footer;
    }

    private function __construct(){ }
}

/*
* Start Page's Structure
* Footer Data
*/

class FetchData
{
    private static $_fetchData;

    public static function getFetchData(){
        self::$_fetchData = "SELECT userid, password, first_name, last_name, registration_date, user_level FROM users ";
        return self::$_fetchData;
    }

    private function __construct(){ }
}

class ProtectedVar
{
	protected $_firstname;
    protected $_lastname;
    public $_userid;

	public function getProtectedVar($fn, $ln,$id){
			$this->_firstname = $fn;
			echo $fn;
			$this->_firstname = $ln;
            echo $ln;
            $this->_userid = $id;
            echo $id;
	}

}
 
?>