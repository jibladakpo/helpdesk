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
		$this->messageWarning("Vous devez vous connecter pour acceder à ce module.<br>".Auth::getInfoUser("warning"));
		$this->finalize();
	}
}