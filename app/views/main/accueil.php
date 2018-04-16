<?php
use micro\orm\DAO;
use micro\js\Jquery;
use micro\views\Gui;
?>
<!DOCTYPE html>
<html>


<body>
  <div class="container">
<div class='form-group'>
<h2>Service d'assistance informatique</h2>
<p>
Notre service Hepldesk est chargé de répondre aux demandes d'assistance émanant des utilisateurs. Ceux-ci entrent en contact
avec le helpdesk dans le but de trouver une réponse à un problème technique informatique, tant logiciel que matériel.
Les utilisateurs peuvent joindre notre centre d'assistance :
<p>- par email: helpdesk@gmail</p>
<p>- par téléphone: 02********</p>
<p>- sur notre site en créant un ticket</p>

Nos techniciens sont disponibles 24h/24 7j/7 pour répondre à vos demandes.
</p>

<?php
if(Auth::isAdmin()==0){
$objects=DAO::getAll("ticket", "idUser=".Auth::getUser()->getId());
}else {
  $objects=DAO::getAll("ticket");
}
?>
<table class='table table-condensed'>

<thead><tr><th>Tickets</th><th>Nombres</th></tr></thead>
  <tbody><tr class='info'><td>Nouveau</td><td><?php echo $this->NombreTicketNouveau() ;?></td></tr>
  <tr class='warning'><td>En attente</td><td><?php echo $this->NombreTicketAttente() ;?></td></tr>
  <tr class='active'><td>Attribué</td><td><?php echo $this->NombreTicketAttribuer() ;?></td></tr>
  <tr class='success'><td>Résolu</td><td><?php echo $this->NombreTicketResolu() ;?></td></tr>
  <tr class='off'><td>Clos</td><td><?php echo $this->NombreTicketClos() ;?></td></tr></tbody></table>
</table>


<a class='btn btn-primary' href='tickets/frm'>Créer un nouveau ticket</a>
</div>
</div>
</body>
</html>
