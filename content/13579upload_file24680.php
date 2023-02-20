<fieldset>
<legend><h1>Scambiamo il tuo Libro</h1></legend>
<?php require_once(ServerDocumentRoot::getServerDR(). '/defi/include/process_uploadfile_a13579246801357924680z.php')?>
<form action="/defi/index.php?content=13579upload_file24680" method="post" enctype="multipart/form-data">
  <!--  <label for="last_name" >ISBN*:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input type="text" class="ininside" name="isbn" id="isbn" placeholder="ISBN" maxlength="50" required
	  value="<?php if (isset($_POST['isbn'])) echo trim(ucwords(strtolower($_POST['isbn']))); ?>">
    </div></div><br />

         <label for="first_name">Titolo*:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
      <input type="text" class="ininside" name="titolo" id="titolo" placeholder="Titolo del Libro" maxlength="50" required
	  value="<?php if (isset($_POST['titolo'])) echo trim(ucwords(strtolower($_POST['titolo']))); ?>" >
    </div></div><br />


    <input type="submit" class="insubmit" name="reguser" value="&nbsp;&nbsp;Pubblica&nbsp;&nbsp;" style="cursor:pointer;" />     
    <br /><br />-->
    <label for="first_name">Immagine del libro:</label>
    <div class="inform">
    <div style="margin:0;width:auto;">
	<input type="file" class="ininside" name="file_upload" id="file_upload" >
	<button type="submit" name="submit" style="padding:2px 8px;margin:0 8px 8px 8px;border:1px #808A9B  solid;">Invia</button>
    </div></div> 
    
    <input type="hidden" name="token" value="<?php echo $token; ?>" >
	</form>
</fieldset>