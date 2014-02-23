<?php

namespace Offres\Controller;

use Offres\Model\Entity\Offre;
use Offres\Model\OffreTable;
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
        
            private function getOffre() {
        // Service Manager
        // Composant qui stocke les objets associées à des clés
        // et qui sait les créer (avec new, avec une fabrique, avec singleton,
        // avec une fabrique abstraite, avec un builder...)
        $adapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $gateway = new \Zend\Db\TableGateway\TableGateway("offre", $adapter);
  
        return new \Offres\Model\OffreTable($gateway);
    }
        
	public function indexAction() {
           
            $offre = $this->getOffre();
            
	return new ViewModel(array(
                    "listeOffre"=>$offre->fetchAll(),
               ));
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
            $id = $this->params("id");
           $offre = $this->getOffre();
		return new ViewModel(array("listeOffre" => $offre->find($id)));
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
            
            if(!$this->request->getPost()){
                die();
                    $data = array_merge_recursive(
                    $this->request->getPost()->toArray()
                    );
//                    var_dump($data);
//                    die();
                    
                     $offre = $this->getOffre();
                     $offre->save($data);
            }    
          
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
           $id = $this->params("id");
           $offre = $this->getOffre();
           $offre->delete($id);
           
		return new ViewModel();
	}

}
