<?php 
use micro\views\Gui;
?>

<div class="for-group">
	<label for="contenu">Message</label>
		<?= $message->getContenu()?>
</div>
	<input type="text" class="form-control" disabled name="utilisateur" value="<?=$_SESSION["user"]?>">
