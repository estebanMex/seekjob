<?php

namespace Offres\Model;

use Exception;
use Offres\Model\Entity\Candidat;
use Offres\Model\Entity\Societe;
use PDO;

/**
 * Description of Usergateway
 *
 * @author esteban
 */
class UserAccountGateway {
	/*
	 * Methodes User
	 */

	/**
	 * 
	 * @param string $pMail
	 * @return boolean
	 */
	function mailIsFree($pMail) {
		try {
			$dsn = "mysql:host=localhost;dbname=seekjob;charset=UTF8";
			$pdo = new PDO($dsn, "root", "");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$stmt = $pdo->prepare("CALL mailExist(:pMail)");

			$stmt->execute(array(
				'pMail' => $pMail
			));

			return $stmt->rowCount();
			//
		} catch (Exception $e) {

			echo "ERREUR : {$e->getMessage()} \n";
			echo $e->getTraceAsString() . "\n";
			echo "Code erreur : {$e->getCode()}\n";

			return false;
		}
	}

	function createUserCredentials($pMail, $pPassword) {

		$pdo = new PDO('mysql:dbname=seekjob;host=127.0.0.1', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		$stmt = $pdo->prepare("CALL createUserCredentials(:pMail, :pPassword); ");
		try {
			$pdo->beginTransaction();

			$stmt->execute(array(
				'pMail' => $pMail,
				'pPassword' => $pPassword
			));

			$pdo->commit();


			$data = $pdo->prepare("SELECT LAST_INSERT_ID() FROM conection");
			$data->execute();
			$arrayListe = $data->fetch(PDO::FETCH_ASSOC);
			$lastInsertId = $arrayListe['LAST_INSERT_ID()'];


			$stmt->closeCursor();

			return $lastInsertId;
		} catch (PDOExecption $e) {
			$pdo->rollback();
			print "Error!: " . $e->getMessage() . "</br>";
			return false;
		}
	}

	/*
	 * Methodes Candidat
	 */

	function createSociete(Societe $pSociete) {
		try {
			$dsn = "mysql:host=localhost;dbname=seekjob;charset=UTF8";
			$pdo = new PDO($dsn, "root", "");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$stmt = $pdo->prepare("CALL createSociete(:pNom, :pPrenom, :pTel, :pVille, :pCp, :pDenomination,:pLogo, :pConnection_id)");
			$stmt->execute(array(
				'pNom' => $pSociete->getNom(),
				'pPrenom' => $pSociete->getPrenom(),
				'pTel' => $pSociete->getTel(),
				'pVille' => $pSociete->getVille(),
				'pCp' => $pSociete->getCp(),
				'pLogo' => $pSociete->getLogo(),
				'pDenomination' => $pSociete->getDenomination(),
				'pConnection_id' => $pSociete->getConection_id()
			));
		} catch (Exception $e) {
			echo "ERREUR : {$e->getMessage()} \n";
			echo $e->getTraceAsString() . "\n";
			echo "Code erreur : {$e->getCode()}\n";
		}
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
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$stmt = $pdo->prepare("CALL createCandidat(:pCp, :pCv,  :pNom, :pPrenom, :pTel, :pVille, :pLettre, :pConnection_id)");

			$stmt->execute(array(
				'pCp' => $pCandidat->getCp(),
				'pCv' => $pCandidat->getCv(),
				'pNom' => $pCandidat->getNom(),
				'pPrenom' => $pCandidat->getPrenom(),
				'pTel' => $pCandidat->getTel(),
				'pVille' => $pCandidat->getVille(),
				'pLettre' => $pCandidat->getLettre_motivation(),
				'pConnection_id' => $pCandidat->getConection_id()
			));
		} catch (Exception $e) {
			echo "ERREUR : {$e->getMessage()} \n";
			echo $e->getTraceAsString() . "\n";
			echo "Code erreur : {$e->getCode()}\n";
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
