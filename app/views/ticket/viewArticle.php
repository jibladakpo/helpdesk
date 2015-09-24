<form method="post" action="tickets/update">
<fieldset>

<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $ticket->getId()?>">
	<label for="type">Type</label>
	

	</select>
	<label>Statut</label>
	<?php echo $ticket->getStatut()?>
	<br><label for="titre">Catégorie</label>
	<?php echo $ticket->getCategorie()?></div>
	<label for="titre">Titre</label>
	<?php echo $ticket->getTitre()?>
	<br><label for="description">Description</label>
<?php echo $ticket->getDescription()?>

<div class="form-group">
	
	<label>Emetteur</label>
	<?php echo $ticket->getUser()?><br>
	<label for="dateCreation">Date de création</label>
	<?php echo $ticket->getDateCreation()?>

</div>

</fieldset>
</form>
