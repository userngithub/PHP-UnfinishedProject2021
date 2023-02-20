<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/defi/include/init.php');
// Definite function

class ServerDocumentRoot
{
    private static $_serverDR;
    public static function getServerDR(){
        self::$_serverDR = $_SERVER['DOCUMENT_ROOT'];
        return self::$_serverDR;
    }
    private function __construct(){ }
}

class LoadEnDecryptData
{
    private static $encrypt_key;
    private static $iv;
    private static $encrypted;
    private static $encrypted_data;
    public static function getEncryptData($data, $chiave){
        self::$encrypt_key = base64_decode($chiave);
        self::$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        self::$encrypted = openssl_encrypt($data,'aes-256-cbc', self::$encrypt_key,0,self::$iv);
        return base64_encode(self::$encrypted.'\0'.self::$iv);
    }

    public static function getDecryptData($data, $chiave){
        self::$encrypt_key = base64_decode($chiave);
        list(self::$encrypted_data, self::$iv) = array_pad(explode('\0',base64_decode($data),2),2,null);
        return openssl_decrypt(self::$encrypted_data,'aes-256-cbc',self::$encrypt_key,0,self::$iv);
    }
    private function __construct(){ }
    public function __destruct(){}
}

class LoadConnectDB
{
    private static $_hn = "localhost";
    private static $_mu = "smysql";
    private static $_mp = "az19";
    private static $_db = "sitedb";

    protected static $_con = NULL;
    private function __construct(){}

    public static function getConnectDB(){
        if(!LoadConnectDB::$_con){
            try{
            self::$_con = new mysqli(self::$_hn,self::$_mu,self::$_mp,self::$_db);
            mysqli_set_charset(LoadConnectDB::$_con, 'utf8');
            }catch(PDOException $b){
                echo 'Connected failed: ' . $b->getMessage();
            }
        }
        return self::$_con;
    }

    public function __destruct(){}
}

class LoadDBAccess
	{
		private static $_hostname = "localhost";
		private static $_mysqluser = "smysql";
		private static $_password = "az19";
		private static $_dbname = "sitedb";

        protected static $_connect = NULL;
        public function __construct(){}

		public static function getConnect(){
			if(!isset(LoadDBAccess::$_connect)){
				try{
				self::$_connect = new PDO('mysql:host='.self::$_hostname.';dbname='.self::$_dbname, self::$_mysqluser, self::$_password);
                self::$_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$_connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                self::$_connect->exec('set session sql_mode = traditional');
                self::$_connect->exec('set session innodb_strict_mode = on');
				}catch(PDOException $b){
					echo 'Connected failed: ' . $b->getMessage();
				}
			}
			return self::$_connect;
        }
        
        public function __destruct(){}
	}

class LoadTop
{
    private static $_top;
    
    private function __construct(){ }

    public static function getTop()
    {           
        self::$_top ='
<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="shortcut icon" type="image/x-icon" href="/image/favicon.ico">
        <link href="/defi/css/style_old.css" rel="stylesheet" type="text/css">
        <link href="/defi/css/style.css" rel="stylesheet" type="text/css">
        <script src="/defi/include/getload.js"></script>'; 
        return LoadTop::$_top;
    }

    public function __destruct(){}
} 

class LoadSearchBox
{
    private static $_searchbox;
    public static function getSearchBox(){
        self::$_searchbox = '
       <div> <form action="/result_page" method="GET">
                        <input type="text" class="insearch" name="user_search" id="user_search" value="" maxlength="500" placeholder="Cerca il tuo libro" />
                        </div>
                        <div class="imgsearch"><input type="image" src="/defi/icon/search.PNG" alt="Submit"/> 
                </div></form>';
        return self::$_searchbox;
    }
    private function __construct(){ }
}

class LoadContentInd
{
    private static $_contentTrim;
    private static $_defaultTrim;
    private static $_pageTrim;
    protected $pat;
    protected $def;
    static public function CaricaContent($pat, $def ='') {
    self::$_contentTrim = filter_input(INPUT_GET, $pat, FILTER_SANITIZE_STRING);
    self::$_defaultTrim = filter_var($def, FILTER_SANITIZE_STRING);
    self::$_contentTrim = (empty(self::$_contentTrim)) ? $def : self::$_contentTrim;
    if (self::$_contentTrim) {
	    self::$_pageTrim = require_once($_SERVER['DOCUMENT_ROOT'] . '/defi/content/'.self::$_contentTrim.'.php');
	    return self::$_pageTrim ;
    }
    }
    private function __construct(){ }
    private function __destruct(){ }
}


/**
* @IndexNav
*/
class LoadIndexNav
{
    private static $_indexNav;
    
    private function __construct(){ }
    public static function getIndexNav(){
        self::$_indexNav = '<button class="btn" onclick="location.href = \'/defi/\'" >Home</button>';
        return self::$_indexNav;
    }
    private function __destruct(){ }
}

/**
* @LoadHomeRegiNav
*/
class LoadHomeRegiNav
{
    private static $_homeRegiNav;
    public static function getHomeRegiNav(){
        self::$_homeRegiNav = '<button class="btn" onclick="location.href = \'/defi/\'" >Home</button>'
            .' '.'<button class="btn" onclick="location.href = \'/user_registration\'">Register</button>';
        return self::$_homeRegiNav;
    }
    private function __construct(){ }
    private function __destruct(){ }
}

/**
* @LoginNav
*/
class LoadLoginNav
{
    private static $_loginNav;
    public static function getLoginNav(){
        self::$_loginNav = '<button class="btn" onclick="location.href = \'/login\'">Login</button>';
        return self::$_loginNav;
    }
    private function __construct(){ }
}

/**
* @LoadMyAccLogoutNav
*/
class LoadMyAccLogoutNav
{
    private static $_accLogoutNav;
    public static function getAccLogoutNav(){
        self::$_accLogoutNav = '<button class="btn" onclick="location.href = \'/user\'" >My Account</button>'
            .' '.'<button class="btn" onclick="location.href = \'/defi/content/logout.php\'" >Logout</button>';
        return self::$_accLogoutNav;
    }
    private function __construct(){ }
    private function __destruct(){ }
}
?>