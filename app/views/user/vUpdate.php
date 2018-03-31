<form method="post" action="users/update">
<fieldset>
<legend>Modifier un utilisateur</legend>
<div class="alert alert-info">Utilisateur : <?php echo $user->toString()?></div>
<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $user->getId()?>">
	<input type="mail" name="mail" value="<?php echo $user->getMail()?>" placeholder="Entrez l'adresse email" class="form-control">
	<input type="text" name="login" value="<?php echo $user->getLogin()?>" placeholder="Entrez un login" class="form-control">
	<input type="password" name="password" value="<?php echo $user->getPassword()?>" placeholder="Entrez le mot de passe" class="form-control">
	<div class="checkbox">
		<label class="radio-inline"><input type="checkbox" name="admin" <?php echo ($user->getAdmin()?"checked":"")?> value="1">Administrateur ?</label>
		<label class="radio-inline"><input type="checkbox" name="admin" <?php echo ($user->getAdmin()?"checked":"")?> value="2">Technicien ?</label>
	</div>
</div>
<div class="form-group">
	<input type="submit" value="Modifier" class="btn btn-default">
	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>users">Annuler</a>
</div>
</fieldset>
</form>
