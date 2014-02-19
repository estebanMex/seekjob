<?php

namespace Offres\Controller;

use Offres\Model\CandidatureGateway;

use Offres\Model\Entity\Candidature;
use Offres\Model\OffreGateway;
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
