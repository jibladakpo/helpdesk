<?php
use micro\orm\DAO;
use micro\js\Jquery;
use micro\controllers\BaseController;
use micro\views\Gui;
/**
 * Contrôleur par défaut (défini dans config => documentRoot)
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class DefaultC extends BaseController {

	/**
	 * Affiche la page par défaut du site
	 * @see BaseController::index()
	 */
	public function index() {
		if(Auth::isAuth()){
		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser(),"id"=>Auth::getIdA()));
		$this->loadView("main/vFooter");
		if(Auth::isAdmin()==1){
		$this->loadView("main/vDefault");
		}
		Jquery::getOn("click", ".btAjax", "sample/ajaxSample","#response");
		echo Jquery::compile();

		}else{

			$this->loadView("main/vHeader",array("infoUser"=>""));
			$this->loadView("main/frm_log");
			$this->loadView("main/vFooter");
			Jquery::getOn("click", ".btAjax", "sample/ajaxSample","#response");
			echo Jquery::compile();
		}
	}

	/**
	 * Affiche la page de test
	 */
	public function test() {
		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser()));
		$this->loadView("main/vTest");
		$this->loadView("main/vFooter");
	}
	/**
	 * Connecte le premier administrateur trouvé dans la BDD
	 */
	public function asAdmin(){
		$_SESSION["user"]=DAO::getOne("User", "admin=1");
		$_SESSION['KCFINDER'] = array(
				'disabled' => false
		);
		$this->index();
	}

	/**
	 * Connecte le premier utilisateur (non admin) trouvé dans la BDD
	 */
	public function asUser(){
		$_SESSION["user"]=DAO::getOne("User", "admin=0");
		$_SESSION['KCFINDER'] = array(
				'disabled' => true
		);
		$this->index();
	}

	/**
	 * Connecte le premier technicien (non admin) trouvé dans la BDD
	 */
	public function asTech(){
		$_SESSION["user"]=DAO::getOne("User", "admin=2");
		$_SESSION['KCFINDER'] = array(
				'disabled' => false
		);
		$this->index();
	}
	/**
	* Méthode connexion utilisateur
	*/
	public function connect(){
		$login=$_POST["login"];
		$password=$_POST["pwd"];

	if($login&&$password){
		$_SESSION["user"]=DAO::getOne("User","login='".$login."' and password='".$password."'");
		$_SESSION['KCFINDER'] = array(
				'login' => $login,
				'disabled' => true
		);
		$this->index();
	}else{
		$info['error']='Erreur d\'identification, Veuillez réessayer s\'il vous plaît !';
		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser()));
		$this->loadView("main/frm_log",$info);
		$this->loadView("main/vFooter");
	}
	}

	public function lost(){

		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser()));
		$this->loadView("main/lost_mdp");
		$this->loadView("main/vFooter");
		Jquery::getOn("click", ".btAjax", "sample/ajaxSample","#response");
	}
	/**
	 * Déconnecte l'utilisateur actuel
	 */
	public function disconnect(){
		$_SESSION = array();
		$_SESSION['KCFINDER'] = array(
				'disabled' => true
		);
		$this->index();
	}

	public function ckEditorSample(){
		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser()));
		echo "<div class='container'>";
		echo "<h1>Exemple ckEditor</h1>";
		echo "<textarea id='editor1'>Exemple de <strong>contenu</strong></textarea>";
		echo Jquery::execute("CKEDITOR.replace( 'editor1');");
		echo "</div>";
		$this->loadView("main/vFooter");
	}

	public function ajaxSample(){
		$users=DAO::getAll("User");
		echo '<ul class="list-group">';
		foreach ($users as $u){
			echo '<li class="list-group-item" id="'.$u->getId().'"><input type="checkbox" class="ck">&nbsp;'.$u->toString()."</li>";
		}
		echo "</ul>";
		echo "<button id='btClose' class='btn btn-primary'>Fermer</button>";
		Jquery::bindMethods(true,false);
		Jquery::getOn("click", ".list-group-item", "users/frm","#response");
		Jquery::doJqueryOn(".ck", "click", "$(event.target).parent()", "toggleClass",array("disabled","$(event.target).prop('checked')"));
		Jquery::doJqueryOn(".list-group-item", "mouseenter", "this", "addClass",array("active"));
		Jquery::doJqueryOn(".list-group-item", "mouseout", "this", "removeClass","active");
		Jquery::doJqueryOn("#btClose", "click", "#response", "html","");
		Jquery::doJqueryOn("#btClose", "click", "#main", "show");
		Jquery::doJquery("#main", "hide");
		echo Jquery::compile();
	}
}
