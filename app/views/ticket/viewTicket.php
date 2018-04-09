<?php
use micro\orm\DAO;
?>

<fieldset>

<div class="form-group">
	<form name="frm2Titre" id="frm2Titre" onSubmit="return false;">
	<input type="hidden" name="id" value="<?php echo $ticket->getId()?>">
	<label for="type">Type</label>

	</select>
	<label>Statut</label>
	<?php echo $ticket->getStatut()?>
	<br><label for="titre">Catégorie</label>
	<?php echo $ticket->getCategorie()?></div>
	<label for="titre">Titre</label>
	<?php echo $ticket->getTitre()?>
	<br><label for="description">Description</label>
<?php echo $ticket->getDescription()?>

<div class="form-group">

	<label>Emetteur</label>
	<?php echo $ticket->getUser()?><br>
	<label for="dateCreation">Date de création</label>
	<?php echo $ticket->getDateCreation()?>
</form>
</div>

</fieldset>


<?php
$idTicket = $ticket->getId();
$msg = DAO::getAll("message", "idTicket='".$idTicket."'");
$user = $_SESSION["user"]->getId();

foreach ($msg as $oklm){ ?>

	<div class="form-group" style="background-color:<?php if ($oklm->getUser()->getAdmin()==1){echo '#FFC3C3;';}else if ($oklm->getUser()->getAdmin()==2){echo '#95fa8d;';} else{echo '#D4F8F9;';}?>padding:20px; margin-top:10px;  display:block; overflow:hidden; border:solid #aaa 2px; border-radius:5px;">
		<p id="contMess" name="contMess"><?= $oklm->getContenu();?></p>
		<br>
		<p id="userMess" name="userMess" style="float:right; display:block; padding:10px;"><?= $oklm->getUser();?></p>
		<p id="userMess" name="userMess" style="float:right; display:block; padding:10px;"><?= $oklm->getDate();?></p>
	</div>

<?php } ?>
<div class="form-group">
<form class="form-group" action='Messages/nouveauMess' method='post' name='ajax'>
	<input type='hidden' name="idUser" id="idUser" value="<?php echo $user ?>">
	<input type='hidden' name="idTicket" id="idTicket" value="<?php echo $idTicket ?>">
	<p><label for="newMess">Contenu de votre message : </label> </p>
	<textarea name="newMess" id="newMess" placeholder="Entrez votre message" class="form-control"></textarea>
</div>
	<div class="form-group">
	<button class="btn btn-primary" name="btAjouter" value="submit">Ajouter</button>
	<a href="tickets" class="btn btn-primary" id="btReadElent">Retour</a>
</div>
</form>
