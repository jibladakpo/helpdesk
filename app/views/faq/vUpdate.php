<form method="post" action="faqs/update">
<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $faq->getId()?>">
	<label for="titre">Titre :</label>
	<input type="text" class="form-control" value="<?php echo $faq->getTitre()?>" id="titre" name="titre" >
	<label for="idCategorie">Catégorie</label>
	<select class="form-control" name="idCategorie">
	<?php echo $listCat;?>
	</select>
	<label for="description">Texte</label>
	<textarea name="contenu" id="contenu" placeholder="Entrez le contenu" class="form-control ckeditor"><?php echo $faq->getContenu()?></textarea>
</div>


	
<div class="form-group">

	<label>Emetteur</label>
	<div class="form-control" disabled><?php echo $faq->getUser()?></div>
	<label for="dateCreation">Date de création</label>
	<input type="text" name="dateCreation" id="dateCreation" value="<?php echo $faq->getDateCreation()?>" disabled class="form-control">
	<input type="hidden" name="idUser" value="<?php echo $faq->getUser()->getId()?>">
</div>

<input type="submit" value="Modifier" class="btn btn-default">
<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>faqs">Annuler</a>

</form>