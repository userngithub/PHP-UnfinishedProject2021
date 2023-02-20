         
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/defi/include/classes/function.php');
require_once(ServerDocumentRoot::getServerDR() . '/defi/include/classes/uni_var.php');
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1))
{ header("Location: /login");
  exit();
}
?>

  <?php

    try{
        $dbcon = LoadConnectDB::getConnectDB();
        $pagerows = 25;
        if ((isset($_GET['p']) && is_numeric($_GET['p']))) { 
        $pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
        }else{
        $stmt = "SELECT COUNT(userid) FROM users";
        $res = mysqli_query ($dbcon, $stmt);
        $row = mysqli_fetch_array ($res, MYSQLI_NUM);
        $records = htmlspecialchars($row[0], ENT_QUOTES);
        if ($records > $pagerows){ 
        $pages = ceil ($records/$pagerows);                                                   
        }else{
        $pages = 1;
        }
        }                                                    
        if ((isset($_GET['i'])) &&( is_numeric($_GET['i'])))
        {
        $start = htmlspecialchars($_GET['i'], ENT_QUOTES);
        }else{
        $start = 0;
        }
        $query = "SELECT last_name, first_name, email, ";
        $query .= "DATE_FORMAT(registration_date, '%M %d, %Y')";
        $query .=" AS regdat, userid FROM users ORDER BY registration_date ASC";
        $query .=" LIMIT ?, ?";
        
        $stmt = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "ii", $start, $pagerows); 
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        
        if ($res) {		
        $i = 1;			
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $user_id = htmlspecialchars($row['userid'], ENT_QUOTES);
            $last_name = htmlspecialchars($row['last_name'], ENT_QUOTES);
            $first_name = htmlspecialchars($row['first_name'], ENT_QUOTES);
            $email = htmlspecialchars($row['email'], ENT_QUOTES);
            $registration_date = htmlspecialchars($row['regdat'], ENT_QUOTES);
            $i++;
            echo '<div class="rownav'.($i % 2).'"><a href="edit_user.php?id=' . $user_id . '">Edit</a>' . ' | '. '<a href="delete_user.php?id=' . $user_id . '">Delete</a>'
                . ' | ' . $last_name . ' | ' . $first_name . ' | ' . $email . ' | ' . $registration_date . '</div>';
            }                                            
            mysqli_free_result ($res);	
        }
        else {
        echo '<p>C\'è qualcosa non va bene nel programma..</p>';
        exit;
        }           
        $stmt = "SELECT COUNT(userid) FROM users";
        $res = mysqli_query ($dbcon, $stmt);
        $row = mysqli_fetch_array ($res, MYSQLI_NUM);
        $users = htmlspecialchars($row[0], ENT_QUOTES);
        mysqli_close($dbcon);     
        $msg = "<p>$users Results</p>";
         if($pages > 1){
             $current_page = ($start/$pagerows) + 1;
             if($current_page != 1){
                $msg .= '<button class="btn"><a href="view_users.php?i=' . ($start - $pagerows) . '&p=' . sha1(mt_rand(1,1000000)) . $pages . sha1(mt_rand(1,1000000)) . sha1(mt_rand(1,1000000)) . '"> << Previous </a> </button> ';
               // $msg .= ' ' .$row. ' ';
                }
             if($current_page != $pages){
                $msg .= '<button class="btn"><a href="view_users.php?i=' . ($start + $pagerows) . '&p=' . sha1(mt_rand(1,1000000)). $pages . sha1(mt_rand(1,1000000)) . sha1(mt_rand(1,1000000)) . ' "> Next  >> </a></button>';
             }
             echo '<div style="padding: 3px 0 3px 0;">' . $msg . '</div>'; 
         } 
     }
        catch(Exception $e)                
           {
            print $e->getMessage();
           }
           catch(Error $e)
           {
            print $e->getMessage();
           }
        ?>