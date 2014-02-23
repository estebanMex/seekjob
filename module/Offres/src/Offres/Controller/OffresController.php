<?php

namespace Offres\Controller;

use Offres\Model\Entity\Offre;
use Offres\Model\OffreTable;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Form\OffreForm;

class OffresController extends AbstractActionController {

    /**
     * 
     * @var Request
     */
    protected $request;
    protected $offres;

    //TODO recuperer toutes les offres
    /**
     * 
     * @return ViewModel
     */
    private function getOffre() {
        $sm = $this->getServiceLocator();
        $this->offres = $sm->get('offres');
        return $this->offres;
    }

    public function indexAction() {

        $offre = $this->getOffre();
        
        return new ViewModel(array(
            "listeOffre" => $offre->fetchAll(),
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
         return new ViewModel(array("offre" => $offre->find($id)));
    }

    //TODO Creer formulaire d'inscription
    /**
     * 
     * @return ViewModel
     */
    public function inscriptionAction() {
        return new ViewModel();
    }

    /**
     * 
     * @return ViewModel
     * @var $data
     * @var $offre
     * @var $this->request
     * 
     */
    public function ajouterAction() {
        
         $form = new \Offres\Form\OffreForm;
         $form->get('submit')->setValue('ajouter');
         
         $request = $this->getRequest();
         if ($request->isPost()) {
             $offre = new \Offres\Entity\Offre();
             $form->setInputFilter($offre->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $offre->exchangeArray($form->getData());
            
                  $this->getOffre()->save($offre);
                 // Redirect to list of albums
                 return $this->redirect()->toRoute('offres_ajouter');
             }
         }
         return array('form' => $form);

    }

  
    /**
     * 
     * @return ViewModel
     */
    public function modifierAction() {

        return new ViewModel();
    }
    
    /**
     * 
     * @return \Zend\View\Model\ViewModel
     * @var $id
     * @var $offre
     * 
     */
    
    public function supprimerAction() {
        $id = $this->params("id");
        $offre = $this->getOffre();
        $offre->delete($id);

        return new ViewModel();
    }
    

}
