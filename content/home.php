<?php if(isset($_SESSION['note'])){
      echo $_SESSION['note'];
      unset($_SESSION['note']);
    }else{ echo '<h1>Home page</h1><br />';}
?>


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
        }else{
        $pages = 1;
        }                   
        if ((isset($_GET['35zmks0@#TYUakloie32=1000'])) &&( is_numeric($_GET['35zmks0@#TYUakloie32=1000'])))
        {
        $start = htmlspecialchars($_GET['35zmks0@#TYUakloie32=1000'], ENT_QUOTES);
        }else{
        $start = 0;
        }
        $stmt = LoadDBAccess::getConnect()->prepare('SELECT book_id, isbn, title, type_name, DATE_FORMAT(reg_date, \'%d %M, %Y\') AS regdat FROM books AS b JOIN types AS t ON b.type_id = t.type_id ORDER BY reg_date DESC LIMIT :i, :p');
        $stmt->bindParam(':i', $start, PDO::PARAM_INT);
        $stmt->bindParam(':p', $pagerows, PDO::PARAM_INT);
        $stmt->closeCursor();
        $stmt->execute();
        while($row = $stmt->fetch()){
            $isbn = htmlspecialchars($row['isbn'], ENT_QUOTES);
            $title = htmlspecialchars($row['title'], ENT_QUOTES);
            $type_name = htmlspecialchars($row['type_name'], ENT_QUOTES);
            $reg_date = htmlspecialchars($row['regdat'], ENT_QUOTES);
            echo '<div class="rownav1"><span style="font-weight:bold;">Titolo:</span>&nbsp;'. $title .' - '. $isbn . '<a href="add_pro.php?id=' . '">&nbsp; metti nel carello</a></div>';
            }
         
        $stmt = LoadDBAccess::getConnect()->prepare('SELECT COUNT(book_id) FROM books');
        $stmt->closeCursor();
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_COLUMN);
        
        $records = htmlspecialchars($result[0], ENT_QUOTES);
        
        if($records > 1){
          echo '<p>&nbsp;'.$records . ' Risultati.<br />';
          echo "<br /><button class='btn' onclick=\"location.href ='result_products'\" >Pagina Successiva >></button>";
       }else{ echo '<p>&nbsp;'. $records . ' Risultato.<br />';}
       echo '<p>';
       
        ?>
