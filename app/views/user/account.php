<form method="post" action="users/update">
<fieldset>
<legend>Mes informations</legend>
<div class="alert alert-info">Mon compte : <?php echo $user->toString()?></div>
<div class="form-group">

	<input type="hidden" name="id" value="<?php echo $user->getId()?>">

	<p> <label>Nom</label> : <?php echo $user->getNom()?> </p>

	 <p> <label>Prenom</label> : <?php echo $user->getPrenom()?> </p>

	<p> <label>Adresse</label> : <?php echo $user->getAdresse()?> </p>

	<p><label>E-mail</label> : <?php echo $user->getMail()?> </p>

	<p> <label>Login</label> : <?php echo $user->getLogin()?> </p>

</div>
<div class="form-group">

<!--	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>users">Retour</a> -->
</div>

</form>
