
  <?php
  if((isset($_SESSION['first_name']))){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
   require_once (ServerDocumentRoot::getServerDR() . '/defi/include/process_change_password.php');
  }
  ?>  
<h1>Cambia Password</h1>
<div id="reglog">
<form action="<?php ServerDocumentRoot::getServerDR() . 'content/change_password.php'; ?>" method="POST" name="passform" id="passform" onsubmit="return checked();">
<label for="email" >E-mail:</label>
<div class="inform">
  <div style="margin:0;width:auto;">
      <input type="email" class="ininside" name="email" id="email" placeholder="Email" maxlength="35" required
	  value="<?php if (isset($_POST['email'])) echo trim(strtolower($_POST['email'])); ?>">
    </div></div><br />
    <label for="password" >Current Password:</label>
    <div class="inform">
  <div style="margin:0;width:auto;">
    <input class="ininside" type="password" id="password" name="password"
    placeholder="Password" minlength="8" maxlength="12" required
	  value="<?php if (isset($_POST['password'])){
           echo $_POST['password'];} ?>">
	  </div></div><br />
    <label for="password1" >New Password:</label>
    <div class="inform">
  <div style="margin:0;width:auto;">
      <input type="password" class="ininside" id="inpass" name="password1"
	  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" 
    title="8 to 12 characters => one number, one uppercase letter, one lowercase letter, one special character "
	  placeholder="New Password" minlength="8" maxlength="12" required
    value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>"></div>
    <div style="margin:0;width:45px;">    
    <img style="margin:0;cursor: pointer;" id="img" src="/icon/off.PNG" onclick="loadImg()">
  </div></div><br />
    <label for="password2">Confirm Password:</label>
    <div class="inform">
  <div style="margin:0;width:auto;">
      <input type="password" class="ininside" id="inpass1" name="password2" 
      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" 
    title="8 to 12 characters => one number, one uppercase letter, one lowercase letter, one special character "
	  placeholder="Confirm Password" minlength="8" maxlength="12" required
	  value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>">
    </div>
    <div style="margin:0;width:45px;">    
    <img style="margin:0;cursor: pointer;" id="imge" src="/icon/off.PNG" onclick="loadImge()"></div></div>
    <span id='message'></span><br />
    <input type="submit" class="insubmit" name="data_user" value="&nbsp;&nbsp;Change Password&nbsp;&nbsp;" class="inputsearch" style="cursor:pointer;" />&nbsp;&nbsp;<input type="reset" class="insubmit" value="&nbsp;&nbsp;Reset&nbsp;&nbsp;" class="inputsearch" style="cursor:pointer;"/>
      <br /><br /><a href="<?php ServerDocumentRoot::getServerDR() . '/send_message'; ?>" style="color:#666666;">Forgot Password</a>
</form>
</div>
<?php
  }else{
  header('Location:/defi/');
  exit();
  }