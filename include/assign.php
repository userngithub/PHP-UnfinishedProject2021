<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/defi/include/classes/uni_var.php');
    $validpass = new UniVar('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/');
    
?>