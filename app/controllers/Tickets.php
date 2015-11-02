<?php
use micro\orm\DAO;
use micro\js\Jquery;
use micro\views\Gui;
/**
 * Gestion des tickets
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class Tickets extends \_DefaultController {
	public function Tickets(){
		parent::__construct();
		$this->title="Tickets";
		$this->model="Ticket";
	}
	
	/**
	 * Affiche la liste des instances de la class du modèle associé $model
	 * @see BaseController::index()
	 */
	public function index($message=null){
		global $config;
		$baseHref=get_class($this);
		if(isset($message)){
			if(is_string($message)){
				$message=new DisplayedMessage($message);
			}
			$message->setTimerInterval($this->messageTimerInterval);
			$this->_showDisplayedMessage($message);
		}
		$objects=DAO::getAll($this->model);
	
		if($this->title=="Tickets"){
			echo "<table class='table table-condensed'>";
	
			echo "<thead><tr><th>Mes tickets</th><th>Nombres</th></tr></thead>".
					"<tbody><tr class='info'><td>Nouveau</td><td>".$this->NombreTicketNouveau()."</td></tr>
				<tr class='warning'><td>En attente</td><td>".$this->NombreTicketAttente()."</td></tr>
				<tr class='active'><td>Attribué</td><td>".$this->NombreTicketAttribuer()."</td></tr>
				<tr class='success'><td>Résolu</td><td>".$this->NombreTicketResolu()."</td></tr></tbody></table>";
	
		}
			
	
		echo "<table class='table table-striped'>";
		echo "<thead><tr> " .$this->model."</thead>";
		echo "<tbody>";
		foreach ($objects as $object){
	
			echo "<tr>";
	
			echo "<td><a href= '".$baseHref."/view/".$object->getId()."'>$object</a> </td>";
			echo "<td class='td-center'><a class='btn btn-primary btn-xs' href='".$baseHref."/frmUpdate/".$object->getId()."'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>".
					"<td class='td-center'><a class='btn btn-warning btn-xs' href='".$baseHref."/delete/".$object->getId()."'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>";
	
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "<a class='btn btn-primary' href='".$config["siteUrl"].$baseHref."/frm'>Ajouter...</a>";
	}
	
	public function messages($id){
		$ticket=DAO::getOne("Ticket", $id[0]);
		if($ticket!=NULL){
			echo "<h2>".$ticket."</h2>";
			$messages=DAO::getOneToMany($ticket, "messages");
			echo "<table class='table table-striped'>";
			echo "<thead><tr><th>Messages</th></tr></thead>";
			echo "<tbody>";
			foreach ($messages as $msg){
				echo "<tr>";
				echo "<td title='message' data-content='".htmlentities($msg->getContenu())."' data-container='body' data-toggle='popover' data-placement='bottom'>".$msg->toString()."</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo Jquery::execute("$(function () {
					  $('[data-toggle=\"popover\"]').popover({'trigger':'hover','html':true})
				})");
		}
	}

	public function frm($id=NULL){
		$ticket=$this->getInstance($id);
		$categories=DAO::getAll("Categorie");
		if($ticket->getCategorie()==null){
			$cat=-1;
		}else{
			$cat=$ticket->getCategorie()->getId();
		}
		$listCat=Gui::select($categories,$cat,"Sélectionner une catégorie ...");
		$listType=Gui::select(array("demande","intervention"),$ticket->getType(),"Sélectionner un type ...");

		$this->loadView("ticket/vAdd",array("ticket"=>$ticket,"listCat"=>$listCat,"listType"=>$listType));
		echo Jquery::execute("CKEDITOR.replace( 'description');");
	}
	

	public function frmUpdate($id=NULL){
		$ticket=$this->getInstance($id);
		$categories=DAO::getAll("Categorie");
		$statuts = DAO::getAll("statut");
		if($ticket->getCategorie()==null){
			$cat=-1;
		}else{
			$cat=$ticket->getCategorie()->getId();
		}

		if($ticket->getStatut()==null){
			$stt=-1;
		}else{
			$stt=$ticket->getStatut()->getId();
		}
		$listCat=Gui::select($categories,$cat,"Sélectionner une catégorie ...");
		$listType=Gui::select(array("demande","intervention"),$ticket->getType(),"Sélectionner un type ...");
		$listStatut=Gui::select($statuts,$stt,"Modifier le statut ...");
		
		$this->loadView("ticket/vUpdate",array("ticket"=>$ticket,"listCat"=>$listCat,"listType"=>$listType,"listStatut"=>$listStatut));
		echo Jquery::execute("CKEDITOR.replace( 'description');");
	}
	public function view($id=NULL){
		$ticket=$this->getInstance($id);
		$this->loadView("ticket/viewArticle",array("ticket"=>$ticket));
	}
	
	public function newT() {
		
		return 	$this->loadView("ticket/newT");
	
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);
		$categorie=DAO::getOne("Categorie", $_POST["idCategorie"]);
		$object->setCategorie($categorie);
		$statut=DAO::getOne("Statut", $_POST["idStatut"]);
		$object->setStatut($statut);
		$user=DAO::getOne("User", $_POST["idUser"]);
		$object->setUser($user);
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::getInstance()
	 */
	public function getInstance($id = NULL) {
		$obj=parent::getInstance($id);
		if(null==$obj->getType())
			$obj->setType("intervention");
		if($obj->getStatut()===NULL){
			$statut=DAO::getOne("Statut", 1);
			$obj->setStatut($statut);
		}
		if($obj->getUser()===NULL){
			$obj->setUser(Auth::getUser());
		}
		if($obj->getDateCreation()===NULL){
			$obj->setdateCreation(date('d-m-Y H:i:s'));
		}
		return $obj;
	}


	/* (non-PHPdoc)
	 * @see BaseController::isValid()
	 */
	public function isValid() {
		return Auth::isAuth();
	}

	/* (non-PHPdoc)
	 * @see BaseController::onInvalidControl()
	 */
	public function onInvalidControl() {
		$this->initialize();
		$this->messageDanger("<strong>Autorisation refusée</strong>,<br>Merci de vous connecter pour accéder à ce module.&nbsp;".Auth::getInfoUser("danger"));
		$this->finalize();
		exit;
	}

}