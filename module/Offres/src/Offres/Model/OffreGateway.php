<?php

/**
 * Description of OffreDao
 *
 * @author esteban
 */

namespace Offres\Model;

use PDO;
use Offres\Model\Entity\Tag;

class OffreGateway {

	public function selectAllOffre() {
		$tabOffres = array();
		$dsn = "mysql:host=localhost;dbname=seekjob;charset=UTF8";
		$pdo = new PDO($dsn, "root", "");
		$sql = "CALL select_offre_homePage()";
		$ret = $pdo->query($sql);

		while ($o = $ret->fetch(PDO::FETCH_ASSOC)) {
			$offre = new Entity\Offre(
					$cp = $o['cp'], $date_creation = $o['date_creation'], $description = $o['description'], $id = $o['id'], $societe_id = $o['societe_id'], $denomination = $o['denomination'], $titre = $o['titre'], $type = $o['type'], $ville = $o['ville']);
//Recuperer toutes les competences de chaque offre
			$pdo2 = new PDO($dsn, "root", "");
			$allTags = "CALL selectAllTagByOffreId(" . $o['id'] . ")";
			$ret2 = $pdo2->query($allTags);
			while ($tag = $ret2->fetch()) {
//				var_dump($tag);
//				$tagIn = new Tag($tag['tag_id'], $tag['titre']);
				$offre->setTabCompetences(new Tag($tag['tag_id'], $tag['titre']));
			}
//var_dump($offre->getTabCompetences());
			$tabOffres[] = $offre;
		}
		return $tabOffres;
	}

	public function selectOffreById($id) {
		$dsn = "mysql:host=localhost;dbname=seekjob;charset=UTF8";
		$pdo = new PDO($dsn, "root", "");
		$sql = "CALL selectOffreById(" . $id . ")";
		$ret = $pdo->query($sql);
		$offre = null;

		while ($o = $ret->fetch(PDO::FETCH_ASSOC)) {
			$offre = new Entity\Offre(
					$cp = $o['cp'], $date_creation = $o['date_creation'], $description = $o['description'], $id = $o['id'], $societe_id = $o['societe_id'], $denomination = $o['denomination'], $titre = $o['titre'], $type = $o['type'], $ville = $o['ville']);
//			var_dump($offre);
//			die();
//echo $o['id'] . '<br />';
//Recuperer toutes les competences de chaque offre
			$pdo2 = new PDO($dsn, "root", "");
			$allTags = "CALL selectAllTagByOffreId(" . $o['id'] . ")";
			$ret2 = $pdo2->query($allTags);
			while ($tag = $ret2->fetch()) {
//				var_dump($tag);
//				$tagIn = new Tag($tag['tag_id'], $tag['titre']);
				$offre->setTabCompetences(new Tag($tag['tag_id'], $tag['titre']));
			}
		}

		return $offre;
	}

	public function createOffre(Entity\Offre $toCreateOffre) {
		try {
			$dsn = "mysql:host=localhost;dbname=seekjob;charset=UTF8";
			$pdo = new PDO($dsn, "root", "");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$stmt = $pdo->prepare("CALL createOffre(:titre, :description, :cp, :ville, :type, :societe_conection_id) ");

			$stmt->execute(array(
				'titre' => $toCreateOffre->getTitre(),
				'description' => $toCreateOffre->getDescription(),
				'cp' => $toCreateOffre->getCp(),
				'ville' => $toCreateOffre->getVille(),
				'type' => $toCreateOffre->getType(),
				'societe_conection_id' => $toCreateOffre->getSociete_conection_id()
			));

			return $stmt->rowCount();
			//
		} catch (Exception $e) {

			echo "ERREUR : {$e->getMessage()} \n";
			echo $e->getTraceAsString() . "\n";
			echo "Code erreur : {$e->getCode()}\n";

			return false;
		}
		echo '=====================';
		var_dump($toCreateOffre);
		echo '=====================';
	}

}
