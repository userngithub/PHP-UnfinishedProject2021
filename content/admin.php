<?php     

if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1))
{ header("Location: /login");
exit();
}
else{ ?>
    <?php 
    if(isset($_SESSION['note'])){
      echo '<h1>' . $_SESSION['note'] . '</h1>';
      unset($_SESSION['note']);
    }else{
        echo '<h1>Informazioni personali</h1>'; 
    }
    ?>
    <h3>You have permission to:</h3>
    <p>&#9632;Edit and Delete a record</p>
    <p>&#9632;Use the View Members button to page through all the members</p>
    <p>&#9632;Use the Search button to locate a particular member</p>
    <p>&#9632;Use the New Password button to change your password. 
    </p>
    </div>
<?php
} 

?>
