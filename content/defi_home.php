<?php if(isset($_SESSION['note'])){
      echo $_SESSION['note'];
      unset($_SESSION['note']);
    }else{ echo '<h1>Home page</h1>';}
?>


<?php

    //try{
      $dbcon = new PDO('mysql:host=localhost;dbname=admintable', 'user_ad', 'az19');
       // $dbcon = LoadConnectDB::getConnectDB();
       // $pagerows = new UniVar(25);
       $pagerows = 2;

       
       /* if ((isset($_GET['&23@#=ptrio)(d']) && is_numeric($_GET['&23@#=ptrio)(d']))) { 
        $pages = htmlspecialchars($_GET['&23@#ptrio)(d'], ENT_QUOTES);
        }else{
       // $query = new UniVar('SELECT COUNT(book_id) FROM books');
        
       // $stmt = LoadDBAccess::getConnect()->prepare($query->getUniVar());
*/
        $stmt = $dbcon->prepare('SELECT COUNT(book_id) FROM books');
        $stmt->bindParam(':book_id', $id, PDO::PARAM_INT);
        $stmt->closeCursor();
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_COLUMN);
          
        $records = htmlspecialchars($result[0], ENT_QUOTES);
      //  if ($records > $pagerows->getUniVar()){ 
      //  $pages = ceil ($records/$pagerows->getUniVar()); 
        //echo $records;
        if ($records > $pagerows){ 
            $pages = ceil ($records/$pagerows);                                                   
        }else{
        $pages = 1;
        }
       // }  //echo $pages;                                                    
        if ((isset($_GET['i'])) &&( is_numeric($_GET['i'])))
        {
        $start = htmlspecialchars($_GET['i'], ENT_QUOTES);
        }else{
        $start = 0;
        }
        //$query = new UniVar('SELECT title, type_name FROM books AS b JOIN types AS t ON b.type_id = t.type_id ORDER BY reg_date ASC');
       // $stmt = LoadDBAccess::getConnect()->prepare($query->getUniVar());
      //  echo $pages; 
        $stmt = $dbcon->prepare('SELECT book_id, isbn, title, type_name, DATE_FORMAT(reg_date, \'%d %M, %Y\') AS regdat FROM books AS b JOIN types AS t ON b.type_id = t.type_id ORDER BY reg_date DESC LIMIT :i, :p');
        $stmt->bindParam(':i', $start, PDO::PARAM_INT);
        $stmt->bindParam(':p', $pagerows, PDO::PARAM_INT);
        $stmt->closeCursor();
        $stmt->execute();
        $i = 1;

        
        
        while($row = $stmt->fetch()){
            $isbn = htmlspecialchars($row['isbn'], ENT_QUOTES);
            $title = htmlspecialchars($row['title'], ENT_QUOTES);
            $type_name = htmlspecialchars($row['type_name'], ENT_QUOTES);
            $reg_date = htmlspecialchars($row['regdat'], ENT_QUOTES);
            $i++;
            echo '<div class="rownav'.($i % 2).'"><a href="add_pro.php?id=' . '">Metti nel carello</a>' . $isbn .' - '. $title . ' - '. $type_name . ' - '. $reg_date . '</div>';
            }
         
        $stmt = $dbcon->prepare('SELECT COUNT(book_id) FROM books');
        $stmt->closeCursor();
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_COLUMN);
        
        $records = htmlspecialchars($result[0], ENT_QUOTES);
        
        if($records > 1){
          $msg = "$records Risultati.<br />";
       }else{ $msg = "$records Risultato.<br />";}
        $current_page = ($start/$pagerows + 1);
        if($current_page != 1){
           $msg .= '<button id="bt"><a href="products?i=' . ($start - $pagerows). '"> << Pagina Precedente </a> </button>&nbsp;&nbsp; ';
         //  $msg .= ' ' .$record. ' ';
           }
        // if($pages > 1){
          //  $current_page = ($start/$pagerows->getUniVar()) + 1;
/*      $p = isset($_GET['i']);
                for($i=0;$i<$pages;$i++){ 
                  $y = $i+1;
                 
                  $msg .= '<a href="products?i='  .$p. '" style="text-decoration:none;">&nbsp;' .$y. '</a>';
                } */
              
        // } 
         if($current_page != $pages){
          $msg .= ' <button id="bt"><a href="products?i=' . ($start + $pagerows). '"> Pagina Successiva  >> </a></button>';
       }
       echo '<div style="padding: 3px 0 3px 0;"><p>' . $msg . '</p></div>';
       

         /*
     }
        catch(Exception $e)                
           {
            print $e->getMessage();
           }
           catch(Error $e)
           {
            print $e->getMessage();
           } */
        ?>
