<?php
use micro\orm\DAO;
use micro\js\Jquery;
use micro\utils\StrUtils;
use micro\views\Gui;
class Accueil extends \_DefaultController {

	public function vAccueil(){
		$id=Auth::getUser()->getId();
		$this->loadView("main/accueil");
	}

	public function NombreTicketNouveau() {
		$id=Auth::getUser()->getId();
		if(Auth::isAdmin()==0){
		return DAO::$db->query("SELECT Count(id) AS nb FROM `ticket` WHERE idStatut =1 AND idUser=$id")->fetchColumn();
	}else {
			return DAO::$db->query("SELECT Count(id) AS nb FROM `ticket` WHERE idStatut =1 ")->fetchColumn();
		}

	}

	public function NombreTicketAttente() {
		$id=Auth::getUser()->getId();
		if(Auth::isAdmin()==0){
		return DAO::$db->query("SELECT Count(id) AS nb FROM `ticket` WHERE idStatut =3 AND idUser=$id")->fetchColumn();
	}else {
			return DAO::$db->query("SELECT Count(id) AS nb FROM `ticket` WHERE idStatut =3 ")->fetchColumn();
		}

	}

	public function NombreTicketAttribuer() {
		$id=Auth::getUser()->getId();
		if(Auth::isAdmin()==0){
		return DAO::$db->query("SELECT Count(id) AS nb FROM `ticket` WHERE idStatut =2 AND idUser=$id")->fetchColumn();
	}else {
			return DAO::$db->query("SELECT Count(id) AS nb FROM `ticket` WHERE idStatut =2 ")->fetchColumn();
		}

	}

	public function NombreTicketResolu() {
		$id=Auth::getUser()->getId();
		if(Auth::isAdmin()==0){
		return DAO::$db->query("SELECT Count(id) AS nb FROM `ticket` WHERE idStatut =4 AND idUser=$id")->fetchColumn();
	}else {
			return DAO::$db->query("SELECT Count(id) AS nb FROM `ticket` WHERE idStatut =4 ")->fetchColumn();
		}

	}

	public function NombreTicketClos() {
		$id=Auth::getUser()->getId();
		if(Auth::isAdmin()==0){
		return DAO::$db->query("SELECT Count(id) AS nb FROM `ticket` WHERE idStatut =5 AND idUser=$id")->fetchColumn();
	}else {
			return DAO::$db->query("SELECT Count(id) AS nb FROM `ticket` WHERE idStatut =5 ")->fetchColumn();
		}

	}




}
