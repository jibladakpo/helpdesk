<?php
use micro\orm\DAO;
use micro\views\Gui;
/**
 * Gestion des articles de la Faq
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class Faqs extends \_DefaultController {
	public function Faqs(){
		parent::__construct();
		$this->title="Foire aux questions";
		$this->model="Faq";
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);
		$object->setUser(Auth::getUser());
		$categorie=DAO::getOne("Categorie", $_POST["idCategorie"]);
		$object->setCategorie($categorie);
	}

	public function test(){
		$faqs=DAO::getAll("Faq","1=1 order by dateCreation limit 1,1");
		foreach ($faqs as $faq){
			echo $faq."<br>";
		}
		echo DAO::$db->query("SELECT max(id) FROM Faq")->fetchColumn();
		$ArticleMax=DAO::getOne("Faq","id=(SELECT max(id) FROM Faq)");
		echo $ArticleMax;
	}
	
	public function frm($id=NULL){
		$faq=$this->getInstance($id);
		$categories=DAO::getAll("Categorie");
		if($faq->getCategorie()==null){
			$cat=-1;
		}else{
			$cat=$faq->getCategorie()->getId();
		}
		$listCat=Gui::select($categories,$cat,"Sélectionner une catégorie ...");
		$this->loadView("faq/vAdd",array("faq"=>$faq,"listCat"=>$listCat));
	}
	

	public function frmUpdate($id=NULL){
		$faq=$this->getInstance($id);
		$categories=DAO::getAll("Categorie");
		if($faq->getCategorie()==null){
			$cat=-1;
		}else{
			$cat=$faq->getCategorie()->getId();
		}
		$listCat=Gui::select($categories,$cat,"Sélectionner une catégorie ...");
		$this->loadView("faq/vUpdate",array("faq"=>$faq,"listCat"=>$listCat));
	}
	public function view($id=NULL){
		$ticket=$this->getInstance($id);
		$this->loadView("faq/viewArticleF",array("ticket"=>$ticket));
	

	}
	
	public function getInstance($id = NULL) {
		$obj=parent::getInstance($id);
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
		echo "<a class='btn btn-primary' href='".$config["siteUrl"].$baseHref."/frm'>Ajouter...</a>";
	}
}