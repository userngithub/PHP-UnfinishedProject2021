
<?php
if((!isset($_SESSION['firstname'])) && (!isset($_SESSION['user_id']))){
    if(ServerRequestMethod::getServerRM() == 'POST'){
      require_once(ServerDocumentRoot::getServerDR() . '/defi/include/process_login.php');
    }
?>

<fieldset class="reglog">
  <legend><h1>Login</h1></legend>
<form action="<?php ServerDocumentRoot::getServerDR() . '/user_registration'; ?>" method="POST" onsubmit="return checked();">

    <label for="email" >Email:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
    <input type="email" class="ininside" name="email" id="email" placeholder="Email" maxlength="50" required
	  value="<?php if (isset($_POST['email'])) echo trim(strtolower($_POST['email'])); ?>">
    </div></div><span id='message'></span><br />
    <label for="password" >Password:</label>
   <div class="inform">
  <div style="margin:0;width:auto;">
    <input class="ininside" type="password" id="inpass" name="password"
    placeholder="Password" minlength="8" maxlength="12" required
	  value="<?php if (isset($_POST['password'])) echo trim($_POST['password']); ?>">
	  </div>
    <div style="margin:0;width:45px;">    
    <img style="margin:0;cursor: pointer;" id="img" src="/defi/icon/off.PNG" onclick="loadImg()"></div></div>
    <span id='message'></span>
    <br />
  
      <input type="submit" class="insubmit" name="data_user" value="&nbsp;&nbsp;Login&nbsp;&nbsp;"  style="cursor:pointer;" />&nbsp;&nbsp;<input type="reset"
      class="insubmit" value="&nbsp;&nbsp;Reset&nbsp;&nbsp;" style="cursor:pointer;"/>
      <input type="hidden" name="token" value="<?php echo $token; ?>" >
      &nbsp;&nbsp;&nbsp;<a href="<?php ServerDocumentRoot::getServerDR() . '/send_message'; ?>" style="color:#666666;">Forgot Password</a>
        </form>
    <?php    if (!empty($errors)) {                     
		foreach ($errors as $err) { 
			$errorstring = "<br/>* $err<br />";
		}
		$errorstring .= "* Please try again.<br>";
		echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
		}
 ?>
</fieldset>
<?php
}else{
  $page = ($_SESSION['user_level'] === 1) ? '/admin'  : '/user'; 
  header('Location: ' . $page);
  exit();
}