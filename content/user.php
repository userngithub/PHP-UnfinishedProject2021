<?php            
if (!isset($_SESSION['first_name']))
{ header("Location: /login");
 exit();
}

?>
<div>
  <?php echo  '<h2 style="color:#808A9B;font-weight:normal;font-height:16px;">Benvenuto ' . $_SESSION['first_name']. ',</h2>'; ?>
  <?php 
    if(isset($_SESSION['passchange'])){
      echo $_SESSION['passchange'];
      unset($_SESSION['passchange']);
    }?>
</div>
    