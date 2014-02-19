<?php

namespace Offres\Model;

use Offres\Model\Entity\Candidat;
use Offres\Model\Entity\Societe;

/**
 * Description of Usergateway
 *
 * @author esteban
 */
class UserGateway {
	/*
	 * Methodes Candidat
	 */

	function createSociete(Societe $pSociete) {
		
	}

	function updateSociete(Societe $pSociete) {
		
	}

//
//	function selectOneSociete() {
//		
//	}
//
//	function selectAllSociete() {
//		
//	}
//
//	function deleteSociete() {
//		
//	}

	/*
	 * Methodes Candidat
	 */

	function createCandidat(Candidat $pCandidat) {
		try {
			$dsn = "mysql:host=localhost;dbname=seekjob;charset=UTF8";
			$pdo = new PDO($dsn, "root", "");
			////createCandidat(NULL, pNom, pPrenom, pTel, pVille, pCp, CURRENT_TIMESTAMP, pCv, pLettre, pConnection_id)
			$stmt = $pdo->prepare("CALL createCandidat(:pNom,:pPrenom,:pTel,:pVille, :pCp, :pCv, :pLettre, :pConnection_id)");
			$stmt->execute(array(
				'pNom' => $pCandidat->getNom(),
				'pPrenom' => $pCandidat->getPrenom(),
				'pTel' => $pCandidat->getTel(),
				'pVille' => $pCandidat->getVille(),
				'pCp' => $pCandidat->getCp(),
				'pCv' => $pCandidat->getCv(),
				'pLettre' => $pCandidat->getCv(),
				'pConnection_id' => $pCandidat->getConection_id()
			));
		} catch (Exception $e) {
			echo "ERREUR : {$e->getMessage()} \n";
			echo $e->getTraceAsString() . "\n";
			echo "Code erreur : {$e->getCode()}\n";

			die();
		}
	}

	function updateCandidat(Candidat $pCandidat) {
		
	}

//
//	function selectOneCandidat() {
//		
//	}
//
//	function selectAllCandidat() {
//		
//	}
//
//	function deleteCandidat() {
//		
//	}
}
