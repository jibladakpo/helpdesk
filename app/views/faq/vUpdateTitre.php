<form name="frmTitre" id="frmTitre" onsubmit="return false">
<div class="form-group">
	<label for="titre">Titre :</label>
	<input type="hidden" id="id" value="<?$faq->getId()?>">
	<input type="text" class="form-control" id="titre" name="titre" value="<?=$faq->getTitre()?>">
</div>
<a class="btn btn-primary" id="btUpdateTitre">Modifier titre</a>
</form>