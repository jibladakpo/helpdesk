<?php
use micro\orm\DAO;
use micro\js\Jquery;
use micro\views\Gui;
?>
<form method="post" action="s">
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
<?php echo"	<a class='btn btn-default' href='users/frmUpdateAccount/".$user->getId()."'>Mofifier compte</a> ";?>
<?php if(Auth::isAdmin()==1){
	echo "<a class='btn btn-default' href='".$config['siteUrl']."users'>Retour</a>";
	}
	?>
</div>

</form>
