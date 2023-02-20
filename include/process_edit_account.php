<?php
	$validque1  = new UniVar('SELECT userid, user_level FROM users WHERE email=? AND userid!=?');
	$validque2 = new UniVar('UPDATE users SET first_name=?, last_name=?, pri_address=?, sec_address=?, city=?, province=?, zipcode=?, phone=? WHERE userid=?');
	$validque3 = new UniVar('SELECT first_name, last_name, email, pri_address, sec_address, city, province, zipcode, phone FROM users WHERE userid=?');
    $dbcon = LoadConnectDB::getConnectDB();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array();  
   $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);	
if ((!empty($first_name)) && (preg_match('/[a-z\s]/i',$first_name)) &&
		(strlen($first_name) <= 40)) {				
	$firstnametrim = trim(ucwords(strtolower($first_name)));	
	$first_name = LoadEnDecryptData::getEncryptData($first_name, $chiave);	
	}else{	
    $errors[] = 'Inserisci il suo nome.';
   //  $errors[] = 'Please insert your firstname.';
	}
	$last_name = filter_var( $_POST['last_name'], FILTER_SANITIZE_STRING);			
if ((!empty($last_name)) && (preg_match('/[a-z\-\s\']/i',$last_name)) &&
		(strlen($last_name) <= 40)) {					
	$lastnametrim = trim(ucwords(strtolower($last_name)));
	$last_name = LoadEnDecryptData::getEncryptData($last_name, $chiave);				
	}else{	 
        $errors[] = 'Inserisci il suo cognome.';
        //  $errors[] = 'Please insert your lastname.';
	}			
    $address1 = filter_var( $_POST['pri_address'], FILTER_SANITIZE_STRING);			
    if ((!empty($address1)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address1)) &&
    (strlen($address1) <= 50)) {					
	$address1trim = trim(ucwords(strtolower($address1)));
	$address1 = LoadEnDecryptData::getEncryptData($address1, $chiave);						
	}else{	
		$errors[] = 'Inserisci il suo indirizzo.';
		//$errors[] = 'Please insert your primary address.';
	}
  /*  $address2 = filter_var( $_POST['sec_address'], FILTER_SANITIZE_STRING);	
    if ((!empty($address2)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address2)) &&
    (strlen($address2) <= 50)) {		
	$address2trim = trim(ucwords(strtolower($address2)));
	$address2 = LoadEnDecryptData::getEncryptData($address2, $chiave);	
	}else{	
	$address2 = NULL;
	} */
$city = filter_var( $_POST['city'], FILTER_SANITIZE_STRING);			
if ((!empty($city)) && (preg_match('/[a-z\.\s]/i', $city)) &&
  (strlen($city) <= 50)) {							
	$citytrim = trim(ucwords(strtolower($city)));
	$city = LoadEnDecryptData::getEncryptData($city, $chiave);							
	}else{	
	$errors[] = 'Inserisci la citt&agrave; del tuo indirizzo';
	}
$province = filter_var( $_POST['province'], FILTER_SANITIZE_STRING);		
if ((!empty($province)) && (preg_match('/[a-z\.\s]/i', $province)) &&
    (strlen($province) <= 30))	 {			
	$provincetrim = strtoupper($province);
	$province = LoadEnDecryptData::getEncryptData($province, $chiave);						
	}else{	
		$errors[] = 'Inserisci la provincia della sua citt&agrave.';
	}
$zipcode = filter_var( $_POST['zipcode'], FILTER_SANITIZE_STRING);	
if ((!empty($zipcode)) && (preg_match('/[0-9]/', $zipcode))  &&
   (strlen($zipcode) <= 5)) {					
	$zipcodetrim = $zipcode;
	$zipcode = LoadEnDecryptData::getEncryptData($zipcode, $chiave);							
	}else{	
	$errors[] = 'Inserisci il cap dell\'indirizzo.';
	}
$phone = filter_var( $_POST['phone'], FILTER_SANITIZE_STRING);	    		
if ((!empty($phone)) && (strlen($phone) <= 15)) {	
	$phonetrim = (filter_var($phone, FILTER_SANITIZE_NUMBER_INT));
	$phonetrim = preg_replace('/[^0-9]/', '', $phonetrim);
	$phone = LoadEnDecryptData::getEncryptData($phone, $chiave);		
	}else{	
	$phonetrim = NULL;
	}
	if (empty($errors)) { 
		$stmt = mysqli_stmt_init($dbcon);
		$query = $validque1->getUniVar();
        mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, 'sii', $email, $userlevel, $id);
	    mysqli_stmt_execute($stmt);
		$res = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($res) == 0) {
		$query = $validque2->getUniVar();
		 $stmt = mysqli_stmt_init($dbcon);
		 mysqli_stmt_prepare($stmt, $query);
		 $en_firstname = $firstnametrim;
		 $en_lastname = $lastnametrim;
		 $en_address1 = $address1trim;
		 $en_address2 = $address2trim;
		 $en_city = $citytrim;
		 $en_province = $provincetrim;
		 $en_zipcode = $zipcodetrim;
		 $en_phone = $phonetrim; 
		 $en_firstname = LoadEnDecryptData::getEncryptData($en_firstname, $chiave);
		 $en_lastname = LoadEnDecryptData::getEncryptData($en_lastname, $chiave);
		 $en_address1 = LoadEnDecryptData::getEncryptData($en_address1, $chiave);
		 $en_address2 = LoadEnDecryptData::getEncryptData($en_address2, $chiave);
		 $en_city = LoadEnDecryptData::getEncryptData($en_city, $chiave);
		 $en_province = LoadEnDecryptData::getEncryptData($en_province, $chiave);
		 $en_zipcode = LoadEnDecryptData::getEncryptData($en_zipcode, $chiave);
		 $en_phone = LoadEnDecryptData::getEncryptData($en_phone, $chiave); 
		mysqli_stmt_bind_param($stmt, 'ssssssssi', $en_firstname, $en_lastname, $en_address1, $en_address2, $en_city, $en_province, $en_zipcode, $en_phone, $id);
	   
       mysqli_stmt_execute($stmt);   
			if (mysqli_stmt_affected_rows($stmt) == 1) { 
				$de_firstname = $en_firstname;
				$de_firstname = LoadEnDecryptData::getDecryptData($de_firstname, $chiave);
				$_SESSION['first_name'] = $de_firstname; 
				$_SESSION['note'] = '<p style="color:green;">Hai appena cambiato i dati del tuo account.</p><br />';          
      			$page = ($_SESSION['user_level'] === 1) ? '/admin'  : '/defi/'; 
     			header('Location: ' . $page);
			} else { 
				$errormsg = 'Your account couldn\'t be edited. Please email to us.';
				echo "<p style='color:red'>$errormsg</p>";
			}
		}
		} else { 
		foreach ($errors as $msg) { 				
		$errormsg = "* $msg<br>\n";
		}
		$errormsg = 'Please try again.';
		echo "<p style='color:red'>$errormsg</p>";
		}
}                                                       
	$query = $validque3->getUniVar();	
	$stmt = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($stmt, $query);
	mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	if (mysqli_num_rows($res) == 1) {
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);}
?>
