<form method="post" action="users/update">
<fieldset>
<legend>Mes informations</legend>
<div class="alert alert-info">Utilisateur : <?php echo $user->toString()?></div>
<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $user->getId()?>">
	
	<label>E-mail</label><p><?php echo $user->getMail()?></p>
	
	<label>Login</label><p><?php echo $user->getLogin()?></p>

</div>
<div class="form-group">

	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>users">Retour</a>
</div>
</fieldset>
</form>
