<?php
  session_start(); 
 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/defi/include/classes/function.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/defi/include/classes/function_old.php');
 // require_once(ServerDocumentRoot::getServerDR() . '/defi/include/classes/user_data.php');
  require_once(ServerDocumentRoot::getServerDR() . '/defi/include/classes/uni_var.php');
  require_once(ServerDocumentRoot::getServerDR() . '/defi/include/token.php');
  if(!isset($token)){
    header('Location: /defi'); 
}
?>
<?php echo LoadTop::getTop(); ?>
<!--
<meta name="KEYWORDS" content="<?php //echo htmlspecialchars($key[$pag]['keywords']);?>">
<meta name="DESCRIPTION" content="<?php //echo htmlspecialchars($des[$pag]['description']);?>"> -->
        <title><?php //echo htmlspecialchars($tit[$pag]['first_name']);?></title>
    </head>
<body>
<div class="topnav" style="text-align:right;padding:5px 2%;" ><!--
  <div class="fosearch"  style="margin-right:2%;"><?php echo LoadSearchBox::getSearchBox(); ?></div> -->
  <input type="text" style="padding: 5px;border-radius:5px;"/>&nbsp;<button class="btn">Search</button>
 <?php 
  require_once(ServerDocumentRoot::getServerDR() . '/defi/include/nav_path.php'); ?>
</div>
<?php 
// test
  $latests[0] = 'Scambiamo: <button class="btn" style="width:100%;" onclick="location.href = \'/pubblica_libro/\'" >Pubblica il Tuo libro</button>';
  $latests[1] = 'OrdiniInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personaliInformazioni personali';
  $latests[2] = 'Informazioni personali';
  $latests[3] = 'fox';
  $latests[4] = 'jumps';
  $latests[5] = 'lazy';
  $latests[6] = 'dog. The quick brown fox jumps over the lazy dog.';
  $latests[7] = 'lazy';
?>
<!-- Content -->
<!-- Left Column -->
<div id="conL">
  <?php
    if((ServerRequestUri::getServerRU() === '/index.php') || (ServerRequestUri::getServerRU() === '/defi/')
     || (ServerRequestUri::getServerRU() === '/user_registration') || (ServerRequestUri::getServerRU() === '/login')){
      foreach ($latests as $i=>$latest): ?>
    <div class="rownav0<?php // echo $i % 2; ?>">
      <p> <?php echo $latest;  ?></p>
    </div>
  <?php endforeach;
    }
    elseif((ServerRequestUri::getServerRU() === '/user') || (ServerRequestUri::getServerRU() === '/admin')
    ){echo LoadUserPriNav::getUserPriNav();// LoadSideNav::getSideNav();
    }else{echo LoadUserPriNav::getUserPriNav();// LoadSideNav::getSideNav();
    } ?>
  </div>
<!-- Right Column -->
  <div id="conR">
    <div class="patnav">
    <?php  
     // require_once(ServerDocumentRoot::getServerDR().'/defi/include/process_imgpro1357924680.php');
      echo '<br />';
     // require_once(ServerDocumentRoot::getServerDR() . '/defi/include/nav_path.php');
      ?>
    </div>
      <?php htmlentities(LoadContentInd::CaricaContent('content', 'home')); ?>
  </div> 
<!-- Footer -->

<footer>
  <?php echo LoadFooter::getFooter(); ?>
</footer>
  
</body>
</html>
