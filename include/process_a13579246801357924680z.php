<fieldset>
<legend><h1>Scambiamo i Libri</h1></legend>
<?php
  $pagerows = 2;
  $stmt = LoadDBAccess::getConnect()->prepare('SELECT COUNT(book_id) FROM books');
  $stmt->bindParam(':book_id', $id, PDO::PARAM_INT);
  $stmt->closeCursor();
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_COLUMN);          
  $records = htmlspecialchars($result[0], ENT_QUOTES);
  if ($records > $pagerows){ 
    $pages = ceil ($records/$pagerows);                                                   
  }else{$pages = 1;}                                                    
  if ((isset($_GET['13579zmks0TYUakloie3213579azqpduti9860alksnrz0TYUakloie3213579az79zmks0TYUakloie3213579azqpduti9820297d0e49da81108678c5f06c001d7d24f2'])) &&( is_numeric($_GET['13579zmks0TYUakloie3213579azqpduti9860alksnrz0TYUakloie3213579az79zmks0TYUakloie3213579azqpduti9820297d0e49da81108678c5f06c001d7d24f2']))){
    $start = htmlspecialchars($_GET['13579zmks0TYUakloie3213579azqpduti9860alksnrz0TYUakloie3213579az79zmks0TYUakloie3213579azqpduti9820297d0e49da81108678c5f06c001d7d24f2'], ENT_QUOTES);
  }else{$start = 2;} 
    $stmt = LoadDBAccess::getConnect()->prepare('SELECT book_id, isbn, title, b_img, type_name, DATE_FORMAT(reg_date, \'%d %M, %Y\') AS regdat FROM books AS b JOIN types AS t ON b.type_id = t.type_id ORDER BY reg_date DESC LIMIT :s, :p');
    $stmt->bindParam(':s', $start, PDO::PARAM_INT);
    $stmt->bindParam(':p', $pagerows, PDO::PARAM_INT);
    $stmt->closeCursor();
    $stmt->execute();
    $i = 1;
    echo '<div class="prosea">'.LoadSearchBox::getSearchBox().'</div><br />';
  while($row = $stmt->fetch()){
    $isbn = htmlspecialchars($row['isbn'], ENT_QUOTES);
    $title = htmlspecialchars($row['title'], ENT_QUOTES);
    $img = htmlspecialchars($row['b_img'], ENT_QUOTES);
    $type_name = htmlspecialchars($row['type_name'], ENT_QUOTES);
    $reg_date = htmlspecialchars($row['regdat'], ENT_QUOTES);
    $i++;
    echo '<div class="rownav1"><div class="thuimg"><a href="add_pro.php?id=' . '">';
    if($row['b_img'] != ''){ echo '<img src="img/'.$img.'" style="width:60px;height:80px;" >';}
    else{echo '<img src="img/defimg.png" style="width:60px;height:80px;" >';};
    echo '</a></div><div style="padding:5px;"><p style="font-size:17px;font-weight:bold;">&nbsp;Titolo: ' . $title .'</p><p style="font-size:15px;">&nbsp;ISBN: '. $isbn . '</p><span style="font-size:11px;"><p>&nbsp;&nbsp;Scuola: </p><p>&nbsp;&nbsp;Stato Pubblicato: '. $reg_date 
    . '</p><p>&nbsp;&nbsp;Status: </p></span></div></div>';
  }       
    $stmt = LoadDBAccess::getConnect()->prepare('SELECT COUNT(book_id) FROM books');
    $stmt->closeCursor();
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_COLUMN);
    $records = htmlspecialchars($result[0], ENT_QUOTES);    
  if($records > 1){$msg = "$records Risultati.<br />";
  }else{ $msg = "$records Risultato.<br />";}
  $current_page = ($start/$pagerows + 1);
  if($current_page != 1){
    $msg .= '<br /><button class="btn" ><a href="result_products?13579zmks0TYUakloie3213579azqpduti9860alksnrz0TYUakloie3213579az79zmks0TYUakloie3213579azqpduti9820297d0e49da81108678c5f06c001d7d24f2=' . ($start - $pagerows). '&'.sha1('13579thequickbrownfox24680'). '='.md5('67890thequickbrownfox12345').'"> << Pagina Precedente </a> </button>&nbsp;&nbsp; ';}
  if($current_page != $pages){
    $msg .= '<button class="btn" ><a href="result_products?13579zmks0TYUakloie3213579azqpduti9860alksnrz0TYUakloie3213579az79zmks0TYUakloie3213579azqpduti9820297d0e49da81108678c5f06c001d7d24f2=' . ($start + $pagerows). '&'.sha1('24680thequickbrownfox13579').'='.md5('12345thequickbrownfox67890').'"> Pagina Successiva  >> </a></button>';}
    echo '<div style="padding: 3px 0 3px 0;"><p>' . $msg . '</p></div><br /></fieldset>';
?>
