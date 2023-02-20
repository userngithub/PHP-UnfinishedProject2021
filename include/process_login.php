<?php 
$key = new UniVar('CHIAVE');
$chiave = $key->getUniVar();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $dbcon = LoadConnectDB::getConnectDB();
   $email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
   $emailtrim = trim(strtolower($email));
	if  ((empty($emailtrim)) || (!filter_var($emailtrim, FILTER_VALIDATE_EMAIL))
			|| (strlen($emailtrim > 50))) { 
		$errors[] = 'Please enter your email address.';
   }else{$en_email = bin2hex($emailtrim);}
$pass = filter_var( $_POST['password'], FILTER_SANITIZE_STRING);
$passtrim = trim($pass);	
if (empty($passtrim)){  
$errors[] ='Please enter your password.';
}
else {
   $validpass = new UniVar('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/');
   if(!preg_match( $validpass->getUniVar(), $passtrim)) { 
   $errors[] = 'Please enter your valid password.';
   }
}	
   if (empty($errors)) {
      $query = new UniVar('SELECT userid, password, first_name, user_level FROM users WHERE email=?');
      $stmnt = mysqli_stmt_init($dbcon);
      mysqli_stmt_prepare($stmnt, $query->getUniVar());
	   mysqli_stmt_bind_param($stmnt, "s", $en_email); 
       mysqli_stmt_execute($stmnt);
      $result = mysqli_stmt_get_result($stmnt);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);
if (mysqli_num_rows($result) == 1) {
   if (password_verify($passtrim, $row[1])) {  				 
      $_SESSION['user_id'] = $row[0];
      $de_firstname = $row[2];
		$de_firstname = LoadEnDecryptData::getDecryptData($de_firstname, $chiave);
		$_SESSION['first_name'] = $de_firstname; 
      $_SESSION['user_level'] = (int) $row[3];  
      $_SESSION['note'] = '<h3 style="color: #808A9B;">Benvenuto ' . $de_firstname.'!</h3>';          
      $page = ($_SESSION['user_level'] === 1) ? '/admin'  : '/defi/'; 
      header('Location: ' . $page);
} else { $errors[] = 'Email/Password does not match our records. ';}
} else { $errors[] = 'Email/Password does not match our records. ';}
}}
?>