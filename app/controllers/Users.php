<?php
use micro\orm\DAO;
use micro\js\Jquery;
use micro\views\Gui;
/**
 * Gestion des users
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class Users extends \_DefaultController {

	public function Users(){
		parent::__construct();
		$this->title="Utilisateurs";
		$this->model="User";
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
		
	
		echo "<table class='table table-striped'>";
		echo "<thead><tr> " .$this->model."</thead>";
		echo "<tbody>";
		foreach ($objects as $object){
	
			echo "<tr>";
	
			echo "<td><a href= '".$baseHref."/view/".$object->getId()."'>$object</a> </td>";
			if(Auth::isAdmin()==1){echo "<td class='td-center'><a class='btn btn-primary btn-xs' href='".$baseHref."/frmUpdate/".$object->getId()."'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>".
					"<td class='td-center'><a class='btn btn-warning btn-xs' href='".$baseHref."/delete/".$object->getId()."'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>";}
	
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		if(Auth::isAdmin()==1){echo "<a class='btn btn-primary' href='".$config["siteUrl"].$baseHref."/frm'>Ajouter...</a>";}
	}

	public function frm($id=NULL){
		$user=$this->getInstance($id);
		$this->loadView("user/vAdd",array("user"=>$user));
	}
	
	public function frmUpdate($id=NULL){
		$user=$this->getInstance($id);
		$this->loadView("user/vUpdate",array("user"=>$user));
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);
		$object->setAdmin(isset($_POST["admin"]));
	}

	public function tickets(){
		$this->forward("tickets");
	}
	
	public function view($id=NULL){
		$user=$this->getInstance($id);
		$this->loadView("user/account",array("user"=>$user));
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
}