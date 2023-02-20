<?php
  session_start(); 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/defi/include/classes/function1.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/defi/include/classes/function.php');
?>
<?php echo LoadTop::getTop(); ?>
<!--
<meta name="KEYWORDS" content="<?php //echo htmlspecialchars($key[$pag]['keywords']);?>">
<meta name="DESCRIPTION" content="<?php //echo htmlspecialchars($des[$pag]['description']);?>"> -->
        <title><?php //echo htmlspecialchars($tit[$pag]['title']);?></title>
    </head>
<body>
<div class="topnav">
  <div class="fosearch"><?php echo LoadSearchBox::getSearchBox(); ?></div>
</div>
<!-- Content -->
<!-- Right Column -->
<div id="conL"><?php echo  LoadSideNav::getSideNav();  ?></div>
        <!-- fino qua -->
<!-- Left Column -->
  <div id="conR">
    <div id="navPath">
    <?php echo LoadIndexNav::getIndexNav();
    if(isset($_SESSION['user_level']) == 1){
      echo LoadMyAdminNav::getMyAdminNav() . LoadLogoutNav::getLogoutNav();
    } ?>
    </div>
    
  <h1>These are the registered users</h1>
    <?php require(ServerDocumentRoot::getServerDR() . '/defi/include/process_view_users.php'); ?>
  </div> 
<!-- Footer -->

<footer>
  <?php require(ServerDocumentRoot::getServerDR() . '/defi/include/primary_nav.html'); ?>
</footer>
  
</body>
</html>
