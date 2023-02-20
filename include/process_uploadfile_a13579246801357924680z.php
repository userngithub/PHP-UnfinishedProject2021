<?php
try{
    
	$isbn = filter_var( isset($_POST['isbn']), FILTER_SANITIZE_STRING);
    if ((!empty($isbn)) && (preg_match('/[a-z0-9\-\s]/i',$isbn)) &&
			(strlen($isbn) <= 11)) {
		$isbntrim = trim(ucwords(strtolower($isbn)));		
		}else{$isbntrim = NULL;}
	$title = filter_var( isset($_POST['titolo']), FILTER_SANITIZE_STRING);			
	if ((!empty($title)) && (preg_match('/[a-z0-9\-\s\']/i',$title)) &&
				(strlen($title) <= 255)) {
			$titletrim = trim(ucwords(strtolower($title)));				
			}else{$titletrim = NULL;}
   $query = new UniVar('SELECT COUNT(book_id) FROM books WHERE book_id=:id');
    $stmt = LoadDBAccess::getConnect()->prepare($query->getUniVar());
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_COLUMN);
    echo $result; 

    if ($result == 0){
    if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit']) ){
        $file = $_FILES['file_upload'];
        
        $fileName = basename($_FILES['file_upload']['name']);
        $fileTmpName = $_FILES['file_upload']['tmp_name'];
        $fileSize = $_FILES['file_upload']['size'];
        $fileError = $_FILES['file_upload']['error'];
        $fileType = $_FILES['file_upload']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                  //  $fileNameNew = uniqid('', true).".". $fileActualExt;
                    $fileNameNew = uniqid('', true)."-"."@yue78@#31nmcfdteopyrtgdsfr".".". $fileActualExt;
                    $fileDestination = $_SERVER('DOCUMENT_ROOT').'/defi/img/'. $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo '<p style="color:green;">Caricamento dell\'immagine con successo! Nome file: ' . $fileName.'test' . $fileTmpName.'</p>'; 
                   // header("Location: index.php?uploadsuccess");
                }else{
                    echo "La grandezza dell'immagine deve essere non superiore a 1GB";
                }
            }else{
                echo "C'&egrave; l'errore nel caricamento dell'immagine.";
            }
        }else{
            echo "Il formato deve essere .jpg, .jpeg, .png";
        }
    } 
}else{print 'Error';}
}catch(Exception $e)              
{print  $e->getMessage();}
?>