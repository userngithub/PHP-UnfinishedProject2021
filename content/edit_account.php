<h1>Edit My Account</h1>
<?php	
$key = new UniVar('CHIAVE');
$chiave = $key->getUniVar();		                                                  
if (isset($_SESSION['user_id'])){
$id = filter_var( $_SESSION['user_id'], FILTER_SANITIZE_STRING);
} else {
header("Location: /login");
exit();
}

require_once(ServerDocumentRoot::getServerDR() . '/defi/include/process_edit_account.php');		
?>
<div id="reglog">

<form action="<?php ServerDocumentRoot::getServerDR() . '/defi/content/edit_account.php'; ?>" method="POST">
<label for="first_name">First Name:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input type="text" class="ininside" name="first_name" id="first_name" placeholder="First Name" maxlength="40" required
    value="<?php
              $de_firstname = $row['first_name'];
              $de_firstname = LoadEnDecryptData::getDecryptData($de_firstname, $chiave);
              echo trim(ucwords(strtolower($de_firstname))); ?>" >
    </div></div><br />

    <label for="last_name" >Last Name:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input type="text" class="ininside" name="last_name" id="last_name" placeholder="Last Name" maxlength="40" required
    value="<?php
              $de_lastname = $row['last_name'];
              $de_lastname = LoadEnDecryptData::getDecryptData($de_lastname, $chiave);
              echo trim(ucwords(strtolower($de_lastname)));?>">
    </div></div><br />

    <label for="email" >E-mail:</label>
  <div class="inform">
  <div style="margin:0;width:auto;">
      <input type="button" style="background-color:#FFFFFF;color:#808A9B;text-align:left;" class="ininside"  maxlength="50" required
    value="<?php 
            $de_email = $row['email'];
            $de_email = hex2bin($de_email);
            echo $de_email;?>">
    </div><a href="/change_email" >edit</a></div>
    <br />
    <label for="address1">Indirizzo*:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input type="text"  class="ininside" id="pri_address" name="pri_address" pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*"  
       placeholder="Indirizzo" maxlength="50" required value=
		"<?php if(isset($row['pri_address'])){
      $de_address1 = $row['pri_address'];
      $de_address1 = LoadEnDecryptData::getDecryptData($de_address1, $chiave); 
      echo trim(ucwords(strtolower($de_address1)));}else{
        $de_address1 = NULL;
      }?>" >
    </div>
  </div><br />
  <!--
  <label for="address2">Indirizzo Secondario</label>
  <div class="inform">
    <div style="margin:0;width:auto;">
      <input class="ininside" type="text" id="sec_address" name="sec_address" pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*"  
     placeholder="Indirizzo Secondario" maxlength="50" required value=
    "<?php/* if(isset($row['sec_address'])){
      $de_address2 = $row['sec_address'];
      $de_address2 = LoadEnDecryptData::getDecryptData($de_address2, $chiave); 
      echo trim(ucwords(strtolower($de_address2)));}else{
      $de_address2 = NULL;}
      */?>" >
    </div>
  </div><br /> -->
  
    <label for="city" >Citt&agrave;*:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input class="ininside" type="text" id="city" name="city" pattern="[a-zA-Z][a-zA-Z\s\.\,\-]*"  
     placeholder="citt&agrave;" maxlength="50" required value=
    "<?php if(isset($row['city'])){
      $de_city = $row['city'];
      $de_city = LoadEnDecryptData::getDecryptData($de_city, $chiave); 
      echo trim(ucwords(strtolower($de_city)));}else{
      $de_city = NULL;}
      ?>" >
    </div>
  </div><br />
    <label for="province">Provincia*:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input class="ininside" type="text" id="province" name="province" pattern="[a-zA-Z][a-zA-Z\s\.]*"  
     placeholder="Provincia" maxlength="30" required value=
    "<?php if(isset($row['province'])){
      $de_province = $row['province'];
      $de_province = LoadEnDecryptData::getDecryptData($de_province, $chiave); 
      echo trim(ucwords(strtolower($de_province)));}else{
        $de_province = NULL;
      }?>" >
    </div>
  </div><br />	
    <label for="zipcode">CAP*:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input class="ininside" type="text" id="zipcode" name="zipcode" pattern="[0-9]*"
     placeholder="CAP" minlength="5" maxlength="5" required value=
    "<?php if(isset($row['zipcode'])){
      $de_zipcode = $row['zipcode'];
      $de_zipcode = LoadEnDecryptData::getDecryptData($de_zipcode, $chiave);
      echo trim($de_zipcode);}else{
        $de_zipcode = NULL;
      }?>" >
    </div>
  </div><br />		
    <label for="phone" >Telefono:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input class="ininside" type="tel" id="phone" name="phone" pattern="[0-9]*" placeholder="Phone Number" maxlength="15"
    size="40" value=
    "<?php if(isset($row['phone'])){
      $de_phone = $row['phone'];
      $de_phone = LoadEnDecryptData::getDecryptData($de_phone, $chiave); 
      echo trim($de_phone);}else{
        $de_phone = NULL;
      }?>" >
    </div>
	</div><br />
	<input type="hidden" name="id" value="' . $id . '">
  <label for=""></label>
  <div>
    <div>
	<input class="insubmit" style="cursor:pointer;" id="submit" type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;Invio&nbsp;&nbsp;&nbsp;">
  &nbsp;&nbsp;<input type="reset" class="insubmit" value="&nbsp;&nbsp;Reset&nbsp;&nbsp;" style="cursor:pointer;"/>
    </div>
	</div>
	</form>
</div>
