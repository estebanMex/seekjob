<?php

/**
 * Description of User
 *
 * @author esteban
 */

namespace Offres\Model\Entity;

class User {

	protected $nom;
	protected $prenom;
	protected $tel;
	protected $cp;
	protected $ville;
	protected $id;
	protected $conection_id;
	protected $date_inscription;

	function __construct($nom = null, $prenom = null, $tel = null, $cp = null, $ville = null, $id = null, $conection_id = null, $date_inscription = null) {
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->tel = $tel;
		$this->cp = $cp;
		$this->ville = $ville;
		$this->id = $id;
		$this->conection_id = $conection_id;
		$this->date_inscription = $date_inscription;
	}

	public function getConection_id() {
		return $this->conection_id;
	}

	public function getCp() {
		return $this->cp;
	}

	public function getDate_inscription() {
		return $this->date_inscription;
	}

	public function getId() {
		return $this->id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getPrenom() {
		return $this->prenom;
	}

	public function getTel() {
		return $this->tel;
	}

	public function getVille() {
		return $this->ville;
	}

	public function setConection_id($conection_id) {
		$this->conection_id = $conection_id;
		return $this;
	}

	public function setCp($cp) {
		$this->cp = $cp;
		return $this;
	}

	public function setDate_inscription($date_inscription) {
		$this->date_inscription = $date_inscription;
		return $this;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function setNom($nom) {
		$this->nom = $nom;
		return $this;
	}

	public function setPrenom($prenom) {
		$this->prenom = $prenom;
		return $this;
	}

	public function setTel($tel) {
		$this->tel = $tel;
		return $this;
	}

	public function setVille($ville) {
		$this->ville = $ville;
		return $this;
	}

}
