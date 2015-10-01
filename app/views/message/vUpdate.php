<?php 
use micro\views\Gui;
?>
<form method="POST" action="messages/update">
<div class="for-group">
	<label for="idTicket">Ticket</label>
	<input type="hidden" name="id" value="<?php echo $message->getId()?>">
		<select class="form-control" name="idTicket" id="idTicket">
			<?php echo Gui::select($tickets, $idTickets,"Selectionner un ticket...")?>
		</select>
	<label for="contenu">contenu du message</label>
	
	<textarea class="form-control ckeditor" id="contenu" name="contenu">
		<?= $message->getContenu()?>
	</textarea>
</div>
	<input type="text" class="form-control" disabled name="utilisateur" value="<?=$_SESSION["user"]?>">

<div class="form-group">
	<input type="submit" class="btn btn-primary" value="Modifier">
</div>
</form>