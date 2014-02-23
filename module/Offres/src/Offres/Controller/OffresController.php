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

    //TODO take all offres
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
    
    
    public function mesOffresAction() {
       $id = 1;//$this->params("id");
        $offre = $this->getOffre();
        
        return new ViewModel(array("listeOffre" => $offre->findBySociete($id)));
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
                // redirect to Offre_ajouter
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
        
        
       $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('home', array(
                 'action' => 'index'
             ));
         }

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
              $offre = $this->getOffre();
             $offres = $offre->find($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('home', array(
                 'action' => 'index'
             ));
         }
         
         $form  = new \Offres\Form\OffreForm();
         $form->bind($offres);
         $form->get('submit')->setAttribute('value', 'modifier');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($offres->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                $offre->save($offres);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('home');
             }
         }

         return array(
             'id' => $id,
             'form' => $form,
         );
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
