<?php

/**
 * Description of Societe
 *
 * @author esteban
 */

namespace Offres\Model\Entity;

class Societe extends User {

	protected $denomination;
	protected $logo;

	public function getDenomination() {
		return $this->denomination;
	}

	public function getLogo() {
		return $this->logo;
	}

	public function setDenomination($denomination) {
		$this->denomination = $denomination;
		return $this;
	}

	public function setLogo($logo) {
		$this->logo = $logo;
		return $this;
	}

}
