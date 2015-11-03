<form method="post" action="tickets/update">
<fieldset>
<legend>Modifier le statut du ticket</legend>
<div class="form-group">
	<input type="submit" value="Modifier" class="btn btn-default">
	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>tickets">Annuler</a>
</div>

<div class="alert alert-info">Ticket : <?php echo $ticket->toString()?></div>
<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $ticket->getId()?>">
</div>

<div class="form-group">
	<label for="idStatut">Statut</label>
	<select class="form-control" name="idStatut">
	<?php echo $listStatut?>
	</select>
	<label>Emetteur</label>
	<div class="form-control" disabled><?php echo $ticket->getUser()?></div>
	<label for="dateCreation">Date de création</label>
	<input type="text" name="dateCreation" id="dateCreation" value="<?php echo $ticket->getDateCreation()?>" disabled class="form-control">

	<input type="hidden" name="idUser" value="<?php echo $ticket->getUser()->getId()?>">
</div>

<div class="form-group">
	<input type="submit" value="Modifier" class="btn btn-default">
	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>tickets">Annuler</a>
</div>
</fieldset>
</form>
