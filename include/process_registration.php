<?php
	$key = new UniVar('CHIAVE');
	$protectvar = new LoadProtectVar();
	$errors = array();
	$firstname = $protectvar->getFirst_name();
	$firstname = filter_var( $_POST['first_name'], FILTER_SANITIZE_STRING);	
	if ((!empty($firstname)) && (preg_match('/[a-z\-\s]/i',$firstname)) &&
			(strlen($firstname) <= 35)) {
		$firstnametrim = trim(ucwords(strtolower($firstname)));		
		}else{	// $errors[] = 'Please enter your firstname.';
			$errors[] = 'Inserisci il tuo nome.';}
	$lastname = $protectvar->getLast_name();
	$lastname = filter_var( $_POST['last_name'], FILTER_SANITIZE_STRING);			
	if ((!empty($lastname)) && (preg_match('/[a-z\-\s\']/i',$lastname)) &&
				(strlen($lastname) <= 40)) {
			$lastnametrim = trim(ucwords(strtolower($lastname)));				
			}else{	// $errors[] = 'Please enter your lastname.';
				$errors[] = 'Inserisci il tuo cognome.';}
	$email = $protectvar->getEmail();
	$email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);	
	if  ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))
			|| (strlen($email > 50))) { // $errors[] = 'Please enter your valid email address.';
				$errors[] = 'Inserisci l\'email valida.';			
	}else{$emailtrim = trim(strtolower($email));
		$en_email = bin2hex($emailtrim);
	}
	$pass = $protectvar->getPassword1();
	$pass = filter_var( $_POST['password1'], FILTER_SANITIZE_STRING);
	$passtrim = trim($pass);	
	if (empty($passtrim)){ // $errors[] ='Please enter a password';
		$errors[] = 'Inserisci la password.';
	}else {
		$validpass = new UniVar('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/');
		if(!preg_match( $validpass->getUniVar(), $passtrim)) { 
		//$errors[] = 'Please enter a valid password, 8 to 12 characters, one uppercase letter, one lowercase letter, one number, one special character.';
		$errors[] = 'La password dovrebbe essere tra 8 e 12 caratteri(una lettera maiuscola, una lettera minuscola, un numero, una carattera speciale).';	
	} else{
			$passcon = $protectvar->getPassword2();
			$passcon = filter_var( $_POST['password2'], FILTER_SANITIZE_STRING);
			$passcontrim = trim($passcon);	
			if($passtrim === $passcontrim) { 
				$password = $passtrim;
			}else{ // $errors[] = 'Two passwords do not match.';
				$errors[] = 'Le due password dovrebbero essere uguali.';}
		}
	}
if (empty($errors)) {
		$stmt = LoadDBAccess::getConnect()->prepare('SELECT COUNT(userid) FROM users WHERE email=:email');
		$stmt->bindValue(':email', $en_email, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_COLUMN);
		if ($result == 0){
			$hashedpass = password_hash($password, PASSWORD_DEFAULT);
			$stmt = LoadDBAccess::getConnect()->prepare('INSERT INTO users (userid, first_name, last_name, email, password, registration_date ) VALUES (NULL, :first_name, :last_name, :email, :password, NOW())');
			$en_firstname = $firstnametrim;
			$en_lastname = $lastnametrim;
			$en_email = bin2hex($emailtrim);
			$en_firstname = LoadEnDecryptData::getEncryptData($en_firstname, $key->getUniVar());
			$en_lastname = LoadEnDecryptData::getEncryptData($en_lastname, $key->getUniVar()); 
			$stmt->bindParam(':first_name', $en_firstname, PDO::PARAM_STR, 50);
			$stmt->bindParam(':last_name',$en_lastname, PDO::PARAM_STR, 50);
			$stmt->bindParam(':email', $en_email, PDO::PARAM_STR, 50);
			$stmt->bindParam(':password',$hashedpass, PDO::PARAM_STR, 12);
			$stmt->execute();
			if($stmt->rowCount() == 1){
				if (password_verify($password, $hashedpass)){
					echo '<br />'.$en_email. '<br />'. $id; 
					if (isset($_REQUEST['reguser'])) {
					$_SESSION['user_id'] = LoadDBAccess::getConnect()->lastInsertId();
					$_SESSION['first_name'] = trim(ucwords(strtolower($_REQUEST['first_name']))); 
					$_SESSION['note'] = '<h3 style="color: #808A9B;">Ti diamo il Benvenuto '.$_SESSION['first_name']. '!</h3>';
					} 
				} 
				 	header ("location:/defi/");
					exit();
			 } 
		}else{echo "<p style='color:red'>Inserimenti dell'email e/o della password sono errati.</p><br />";}
	}else {                          
		$errmsg = "Please try again.<br />";
		foreach ($errors as $err) { 
			$errmsg .= "* $err<br>\n";
		echo "<p style='color:red'>$errmsg</p>";}}
	?>