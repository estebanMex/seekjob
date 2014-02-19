<?php

/**
 * Description of Candidat
 *
 * @author esteban
 */

namespace Offres\Model\Entity;

class Candidat extends User {

	protected $cv;
	protected $lettre_motivation;

	public function getCv() {
		return $this->cv;
	}

	public function getLettre_motivation() {
		return $this->lettre_motivation;
	}

	public function setCv($cv) {
		$this->cv = $cv;
		return $this;
	}

	public function setLettre_motivation($lettre_motivation) {
		$this->lettre_motivation = $lettre_motivation;
		return $this;
	}

}
