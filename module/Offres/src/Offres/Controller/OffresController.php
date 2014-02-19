<?php

namespace Offres\Controller;

use Zend\Http\Request;
use Offres\Model\Entity\Candidat;
use Offres\Model\UserGateway;
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
//		object(Zend\Stdlib\Parameters)[101]
//		public 'nom' => string 'zdgvqsd' (length = 7)
//		public 'prenom' => string 'qsdfqsfdv' (length = 9)
//		public 'email' => string 'mail@mail.fr' (length = 12)
//		public 'tel' => string '000000000' (length = 9)
//		public 'password' => string 'tototo' (length = 6)
//		public 'type' => string 'Candidat' (length = 8)
//		public 'cv' => string 'ServiceLargeURL11[1].png' (length = 24)
//		public 'denomination' => string 'socoetete' (length = 9)
//				

		if ($this->request->isPost()) {
			$data = $this->request->getPost();
			$userGateway = new UserGateway();

			if ($data->type === 'Candidat') {
				var_dump($data);
				/**
				 * @var \Candidat $candidatToCreate;
				 */
				$candidatToCreate = new Candidat($data['nom'], $data['prenom'], $data['tel'], $data['cp'], $data['ville']);
				var_dump($candidatToCreate);

				//$userGateway->createCandidat($pCandidat);
			} else if ($data->type === 'societe') {
				//$userGateway->createSociete($pSociete);
			}

//			if ($form->isValid()) {
//				//TODO inseerer dans la base de données
//				return $this->redirect()->toRoute("home");
//			}
		}
		return new ViewModel(array('data' => $data));
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
