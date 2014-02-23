<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Offres\Form;
use Zend\Form\Form;
/**
 * Description of OffreForm
 *
 * @author sylvain
 */
class OffreForm extends Form{
    public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('offre');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'titre',
             'type' => 'Text',
             'options' => array(
                 'label' => 'titre',
             ),
         ));
         $this->add(array(
             'name' => 'description',
             'type' => 'textarea',
             'options' => array(
                 'label' => 'description',
             ),
         ));
         $this->add(array(
             'name' => 'cp',
             'type' => 'Text',
             'options' => array(
                 'label' => 'cp',
             ),
         ));
         $this->add(array(
             'name' => 'ville',
             'type' => 'Text',
             'options' => array(
                 'label' => 'ville',
             ),
         ));
         $this->add(array(
             'name' => 'type',
             'type' => 'Text',
             'options' => array(
                 'label' => 'type',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
}
