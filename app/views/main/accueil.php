<?php
use micro\orm\DAO;

if(Auth::isAdmin()==1||(Auth::isAdmin()==2)){
$objects=DAO::getAll($this->model);
}else{
$objects=DAO::getAll("ticket", "idUser=".Auth::getUser()->getId());
}
echo "<body>";
 echo "<div class='form-group'>";
  echo "<table class='table table-condensed'>";
if(Auth::isAdmin()==1||(Auth::isAdmin()==2)){
  echo "<thead><tr><th>Tickets</th><th>Nombres</th></tr></thead>".
      "<tbody><tr class='info'><td>Nouveau</td><td>".$this->NombreTicketNouveau()."</td></tr>
    <tr class='warning'><td>En attente</td><td>".$this->NombreTicketAttente()."</td></tr>
    <tr class='active'><td>Attribué</td><td>".$this->NombreTicketAttribuer()."</td></tr>
    <tr class='success'><td>Résolu</td><td>".$this->NombreTicketResolu()."</td></tr>
    <tr class='off'><td>Clos</td><td>".$this->NombreTicketClos()."</td></tr></tbody></table>";
  echo "<a class='btn btn-primary' href='tickets/frm'>Créer un nouveau ticket</a>";
}
  echo "</div>";
echo "</body>";
?>
