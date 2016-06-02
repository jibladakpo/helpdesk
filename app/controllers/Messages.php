<?php
use micro\orm\DAO;
/**
 * Gestion des messages
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class Messages extends \_DefaultController {
	public function Messages(){
		parent::__construct();
		$this->title="Messages";
		$this->model="Message";
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
	
		if($this->title=="Messages"){
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
	
	/* (non-PHPdoc)
	 *@see _DefaultController::frm()
	 */
	public function frm($id = NULL){

		$message=$this->getInstance($id);
		if(isset($id)){
			$idTicket=$message->getTicket()->getId();
		}else{
			$idTicket=-1;
		}
		$tickets=DAO::getAll("Ticket");
		$this->loadView("message/vadd",array("message"=>$message,"tickets"=>$tickets));
		
	}
	
	public function frmUpdate($id = NULL){

		$message=$this->getInstance($id);
		if(isset($id)){
			$idTicket=$message->getTicket()->getId();
		}else{
			$idTicket=-1;
		}
		$tickets=DAO::getAll("Ticket");
		$this->loadView("message/vUpdate",array("message"=>$message,"tickets"=>$tickets));
		
	}
	
	protected function setValuesToObject(&$object){
		parent::setValuesToObject($object);
		$ticket=DAO::getOne("Ticket", $_POST['idTicket']);
		$object->setTicket($ticket);
		$object->setUser($_SESSION["user"]);
	}
	
	public function isValid(){
		return Auth::isAuth();
		
	}
	
	public function onInvalidControl(){
		$this->initialize();
		$this->messageDanger("<strong>Autorisation refusée</strong>,<br>Merci de vous connecter pour accéder à ce module.&nbsp;".$this->loadView("main/frm_log"));
		$this->finalize();
		exit;
	}
	
	public function view($id=NULL){
		if(Auth::isAuth()){
		$message=$this->getInstance($id);
		$this->loadView("message/viewMessage",array("message"=>$message));
		}
	}
}