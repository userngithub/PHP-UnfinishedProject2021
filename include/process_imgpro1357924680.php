<?php 
try{
if((isset($_SESSION['user_id'])) || (isset($_SESSION['email']))) {
    $stmt = LoadDBAccess::getConnect()->prepare('SELECT email,p_img FROM imagepro AS i JOIN users AS u ON i.userid = u.userid');
   // $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->closeCursor();
    $stmt->execute();
    while($row = $stmt->fetch()){
        $pimg = htmlspecialchars($row['p_img'], ENT_QUOTES);
        echo '<button class="imgpro">';
        if($row['p_img'] != ''){ echo '<img src="/defi/img/'.$pimg.'" style="width:33px;height:33px;border-radius:50%;" >';}
        else{echo '<img src="/defi/img/defimg.png" style="width:35px;height:35px;" >';}
        echo '</button>';      
}
}else{NULL;}
}catch(Exception $e){
    print $e->getMessage();
}
?>