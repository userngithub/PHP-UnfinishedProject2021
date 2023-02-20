
<?php 
	$dbcon = LoadConnectDB::getConnectDB();
	$validpass = new UniVar('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/');
	$validque  = new UniVar('SELECT userid, password FROM users WHERE ( email=? )');
	$validque1 = new UniVar('UPDATE users SET password=? WHERE email=?');
	$errors = array();			
	$email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
	$emailtrim = trim(strtolower($email));	
	if  ((empty($emailtrim)) || (!filter_var($emailtrim, FILTER_VALIDATE_EMAIL))
			|| (strlen($emailtrim > 50))) {
		$errors[] = 'Please enter your valid email address';
	}else{$en_email = bin2hex($emailtrim);}
$password = filter_var( $_POST['password'], FILTER_SANITIZE_STRING);
if (empty($password)){ $errors[] ='Please enter a valid old password';}
else {
	if(!preg_match( $validpass->getUniVar(), $password)) {    
		$errors[] = 'Invalid Password, 8 to 12 characters => one number, one uppercase letter, one lowercase letter, one special character ';
	}else
	{
		$new_password = filter_var( $_POST['password1'], FILTER_SANITIZE_STRING);
		$verify_password = filter_var( $_POST['password2'], FILTER_SANITIZE_STRING);
		if (!empty($new_password)) {
			if(preg_match($validpass->getUniVar(),$new_password)) {  
        		if (($new_password !== $verify_password) || ( $password === $new_password ))
				{
            		$errors[] = 'You\'ve entered invalid password! The new password and the confirmed password did not match, '
						. 'or the new password can\'t be the same an old password.';
				}
			} else {$errors[] = 'Please enter correct password format => 8 to 12 characters => one number, one uppercase letter, one lowercase letter, one special character. ';}
		} else {$errors[] = 'Please enter a new password.';}
	}
	}
	if (empty($errors)) {           
	try {
    $query = $validque->getUniVar();
	$stmt = mysqli_stmt_init($dbcon);                                 
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, 's', $en_email);
    mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    if ((mysqli_num_rows($res) == 1) && (password_verify($password, $row['password']))){
	    $hashed_pass = password_hash($new_password, PASSWORD_DEFAULT);                                                           
       $query = $validque1->getUniVar();
	   $stmt = mysqli_stmt_init($dbcon);                                 
       mysqli_stmt_prepare($stmt, $query);
       mysqli_stmt_bind_param($stmt, 'ss', $hashed_pass, $en_email);
       mysqli_stmt_execute($stmt);
       if (mysqli_stmt_affected_rows($stmt) == 1) {	
		   $_SESSION['passchange'] = '<p style="color:green;">Password has successfully changed!</p>';
		   $page = ($_SESSION['user_level'] === 1) ? '/admin'  : '/user'; 
			header('Location: ' . $page);   
		} else { 
			$errormsg = "You couldn\'t change password due to a system error, We apologize for any inconvenience."; 
			echo "<p style='color:red'>$errormsg</p>";	
		    exit();
		 }
    } else {
	   	 $errormsg = " Please try again, the email address and current password do not match.";
			echo "<p style='color:red'>$errormsg</p>";
}
 }	
catch(Exception $e)               
   {
	    print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   $date = date('m.d.y h:i:s');
   }
   catch(Error $e)
   {
        print "An Error occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   

   }
} else {
	foreach ($errors as $err) { 
		$errormsg = "* $err<br>\n";
	}
	$errormsg .= "* Please try again.<br>";
	echo "<p class=' text-center col-sm-2' style='color:red'>$errormsg</p>";
	}

?>







