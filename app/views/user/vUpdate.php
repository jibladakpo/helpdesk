<form method="post" action="users/update">
<fieldset>
<legend>Modifier un utilisateur</legend>
<div class="alert alert-info">Utilisateur : <?php echo $user->toString()?></div>
<div class="form-group">
	<p><input type="hidden" name="id" value="<?php echo $user->getId()?>"></p>
	<label>Nom</label>
	<p><input type="text" name="nom" value="<?php echo $user->getNom()?>" placeholder="Entrez un nom" class="form-control"></p>
	<label>Prénom</label>
	<p><input type="text" name="prenom" value="<?php echo $user->getPrenom()?>" placeholder="Entrez un prenom" class="form-control"></p>
	<label>Adresse</label>
	<p><input type="text" name="adresse" value="<?php echo $user->getAdresse()?>" placeholder="Entrez une adresse" class="form-control"></p>
	<label>Mail</label>
	<p><input type="mail" name="mail" value="<?php echo $user->getMail()?>" placeholder="Entrez un adresse email" class="form-control"></p>
	<label>Login</label>
	<p><input type="text" name="login" value="<?php echo $user->getLogin()?>" placeholder="Entrez un login" class="form-control"></p>
	<label>Mot de passe</label>
	<p><input type="password" name="password" value="<?php echo $user->getPassword()?>" placeholder="Entrez le mot de passe" class="form-control"></p>

	<label>Type d'utilisateur</label>
	<div class="checkbox">
		<label><input type="checkbox" name="admin[]" <?php if ($user->getAdmin()==1){echo ($user->getAdmin()?"checked":"checked");}?> value="1">Administrateur ?</label>
		<label><input type="checkbox" name="admin[]" <?php if ($user->getAdmin()==2){echo ($user->getAdmin()?"checked":"checked");}?> value="2">Technicien ?</label>
	</div>
</div>

<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default">
	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>users">Annuler</a>
</div>

</fieldset>
</form>
