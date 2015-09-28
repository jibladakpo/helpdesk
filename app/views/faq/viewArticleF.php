<form method="post" action="viewArticle">
<fieldset>

<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $ticket->getId()?>">

	</select>
	
	<br><label for="titre">Catégorie</label>
	<?php echo $ticket->getCategorie()?></div>
	<label for="titre">Titre</label>
	<?php echo $ticket->getTitre()?>
	<br><label for="description">Contenu</label>
<?php echo $ticket->getContenu()?>

<div class="form-group">
	
	<label>Emetteur</label>
	<?php echo $ticket->getUser()?><br>
	<label for="dateCreation">Date de création</label>
	<?php echo $ticket->getDateCreation()?>

</div>

</fieldset>
</form>
