<?php
use micro\orm\DAO;
?>

<fieldset>

<div class="form-group">
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
	</div>

<?php } ?>
<form class="form-group" action='Ticket/nouveauMess' method='post' name='ajax'>
	<input type='hidden' name="idUser" id="idUser" value="<?php echo $user ?>">
	<input type='hidden' name="idTicket" id="idTicket" value="<?php echo $idTicket ?>">
	<label for="newMess">Contenu de votre message : </label> <br>
	<textarea name="newMess" style="width:100%; height:100px; display:block; margin-bottom:10px; border:2px #aaa solid; border-radius:5px;" id="newMess"></textarea>
	<button class="btn btn-primary" name="btAjouter" value="submit">Ajouter</button>
	<a href="tickets" class="btn btn-primary" id="btReadElent">Retour</a>
</form>
