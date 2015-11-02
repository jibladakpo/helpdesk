<?php
/**
 * Représente un utilisateur
 * @author jcheron
 * @version 1.1
 * @package helpdesk.models
 */
class User extends Base {
	/**
	 * @Id
	 */
	private $id;
	private $login = "";
	private $password = "";
	private $mail = "";
	private $admin = false;
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getLogin() {
		return $this->login;
	}
	public function setLogin($login) {
		$this->login = $login;
		return $this;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = sha1($password);
		return $this;
	}
	public function getMail() {
		return $this->mail;
	}
	public function setMail($mail) {
		$this->mail = $mail;
		return $this;
	}
	public function getAdmin() {
		return $this->admin;
	}
	public function setAdmin($admin) {
		$this->admin = $admin;
		return $this;
	}
	
	public function getTech(){
		return $this->admin;
	}
	
	public function setTech($tech) {
		$this->admin = $tech;
		return $this;
	}
	public function toString() {
		$uType = "Utilisateur";
		if ($this->admin) {
			$uType = "Administrateur";
		}
		return $this->mail . "-" . $this->login . " (" . $uType . ")";
	}
}