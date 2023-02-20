<?php
 if((isset($_SESSION['first_name'])) || (isset($_SESSION['user_id']))){
  header('Location:/defi/');
  exit();
 }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      require_once($_SERVER['DOCUMENT_ROOT'] . '/defi/include/process_registration.php');
    }
?>
<fieldset class="reglog">
  <legend>
<h1>Sign-in</h1></legend>
<form action="<?php ServerDocumentRoot::getServerDR() . '/defi/content/user_registration.php'; ?>" method="POST" ">
    <label for="first_name">First Name:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input type="text" class="ininside" name="first_name" id="first_name" placeholder="First Name" maxlength="50" required
	  value="<?php if (isset($_POST['first_name'])) echo trim(ucwords(strtolower($_POST['first_name']))); ?>" >
    </div></div><br />

    <label for="last_name" >Last Name:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input type="text" class="ininside" name="last_name" id="last_name" placeholder="Last Name" maxlength="50" required
	  value="<?php if (isset($_POST['last_name'])) echo trim(ucwords(strtolower($_POST['last_name']))); ?>">
    </div></div><br />

    <label for="email" >E-mail:</label>
<div class="inform">
  <div style="margin:0;width:auto;">
      <input type="email" class="ininside" name="email" id="email" placeholder="Email" maxlength="50" required
	  value="<?php if (isset($_POST['email'])) echo trim(strtolower($_POST['email'])); ?>">
    </div></div><br />

    <label for="password1" >Password:</label>
    <div class="inform">
  <div style="margin:0;width:auto;">
      <input type="password" class="ininside" id="inpass" name="password1"
	  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" 
    title="8 to 12 characters => one number, one uppercase letter, one lowercase letter, one special character "
	  placeholder="Password" minlength="8" maxlength="12" required
    value="<?php if (isset($_POST['password1'])) echo trim($_POST['password1']); ?>"></div>
    <div style="margin:0;width:45px;">    
    <img style="margin:0;cursor: pointer;" id="img" src="/defi/icon/off.PNG" onclick="loadImg()"></div></div>
	  <br />
  
    <label for="password2">Confirm Password:</label>
    <div class="inform">
  <div style="margin:0;width:auto;">
      <input type="password" class="ininside" id="inpass1" name="password2" 
      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" 
    title="8 to 12 characters => one number, one uppercase letter, one lowercase letter, one special character "
	  placeholder="Confirm Password" minlength="8" maxlength="12" required
	  value="<?php if (isset($_POST['password2'])) echo trim($_POST['password2']); ?>">
    </div>
    <div style="margin:0;width:45px;">    
    <img style="margin:0;cursor: pointer;" id="imge" src="/defi/icon/off.PNG" onclick="loadImge()"></div></div><br />
    <input type="submit" class="insubmit" name="reguser" value="&nbsp;&nbsp;Register&nbsp;&nbsp;" style="cursor:pointer;" />&nbsp;&nbsp;<input type="reset" class="insubmit" value="&nbsp;&nbsp;Reset&nbsp;&nbsp;" style="cursor:pointer;"/>     
    <input type="hidden" name="token" value="<?php echo $token; ?>" >
  </form>
</fieldset>
