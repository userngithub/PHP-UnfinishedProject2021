<?php 
    session_start(); 
    if (($_SESSION['firstname']))
    { 
      echo '<p>Ciao,' .  $_SESSION['firstname'] . '</p>';
      if(time() === (time() + 5)){
        
      header('Location:/user');
      }
      exit();
    }
    

      echo 'Benvenuto ' .  $_SESSION['firstname'];
    
    ?>
    <h2>Confirmed Registered!</h2>