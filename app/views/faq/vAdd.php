<form name="frmTitre" id="frmTitre" onsubmit="return false">
<div class="form-group">
	<label for="titre">Titre :</label>
	<input type="text" class="form-control" value="<?php echo $faq->getTitre()?>" id="titre" name="titre" >
</div>
<a class="btn btn-primary" id="btAddTitre">Ajouter titre</a>
<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>faqs">Annuler</a>
</form>