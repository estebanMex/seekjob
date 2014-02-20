<?php

namespace Offres\Controller;

use Offres\Model\Entity\Candidat;
use Offres\Model\Entity\Societe;
use Offres\Model\UserAccountGateway;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class OffresController extends AbstractActionController {

	/**
	 * 
	 * @var Request
	 */
	protected $request;

	//TODO recuperer toutes les offres
	/**
	 * 
	 * @return ViewModel
	 */
	public function indexAction() {
		return new ViewModel();
	}

	//@TODO recuperer les offres selons les criteres selectionnees
	/**
	 * 
	 * @return ViewModel
	 */
	public function rechercheAction() {
		return new ViewModel();
	}

	//TODO recuperer le detail de l'offre choisi
	/**
	 * 
	 * @return ViewModel
	 */
	public function detailAction() {
		return new ViewModel();
	}

	//TODO Creer formulaire d'inscription
	/**
	 * 
	 * @return ViewModel
	 */
	public function inscriptionAction() {
		$erreurs = array();


		if ($this->request->isPost()) {
			$data = $this->request->getPost();
			$userGateway = new UserAccountGateway();

			$mailIsFree = $userGateway->mailIsFree($data['email']);

			if ($mailIsFree > 0) {
				//@TODO  return Flash message  'ce mail est dejà pris'
				$erreurs[] = 'ce mail est dejà pris';
				return new ViewModel(array('data' => $data, 'erreurs' => $erreurs));
			}

			if ($mailIsFree === 0) {
				//@TODO trouver pour quoi on recupere par le lastID
				$lastIdInsert = $userGateway->createUserCredentials($data['email'], $data['password']);
			}

			if ($data->type === 'Candidat') {
				$candidatToCreate = new Candidat($data['nom'], $data['prenom'], $data['tel'], $data['cp'], $data['ville']);
				$candidatToCreate->setCv($this->request->getFiles()->cv['name'])
						->setLettre_motivation($this->request->getFiles()->cv['name'])
						->setConection_id($lastIdInsert);
				$userGateway->createCandidat($candidatToCreate);
				//@TODO if all is ok redirect + FLASH MSG
				//				return $this->redirect()->toRoute("home");
			}

			if ($data->type === 'Entreprise') {
				$societeToCreate = new Societe($data['nom'], $data['prenom'], $data['tel'], $data['cp'], $data['ville']);

				$societeToCreate->setDenomination($data['denomination'])->setLogo($this->request->getFiles()->logo['name'])
						->setConection_id($lastIdInsert);
				$userGateway->createSociete($societeToCreate);
				//@TODO if all is ok redirect + FLASH MSG
				//				return $this->redirect()->toRoute("home");
			}

			if (sizeof($erreurs) > 0) {
				return new ViewModel(array('data' => $data, 'erreurs' => $erreurs));
			} else {
				//@TODO all fields is ok we nedd make redirection
				//return new ViewModel(array('data' => $data, 'erreurs' => $erreurs));
				return $this->redirect()->toRoute("home");
			}
		}
		return new ViewModel();
	}

	//TODO afficher le formulaire d'ajout d'une offre
	/**
	 * 
	 * @return ViewModel
	 */
	public function ajouterAction() {
		return new ViewModel();
	}

	//TODO afficher le formulaire de modification d'une offre
	/**
	 * 
	 * @return ViewModel
	 */
	public function modifierAction() {
		return new ViewModel();
	}

	//TODO suppresion d'une offre
	//TODO penser à securiser l'appel de cette page afin 'eviter la suppression en masse
	public function supprimerAction() {
		return new ViewModel();
	}

}
