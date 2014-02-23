<?php

namespace Offres\Entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
/**
 * Description of offre
 *
 * @author sylvain
 */
class Offre implements InputFilterAwareInterface{
   
    public $id;
    public $titre;
    public $description;
    public $cp;
    public $ville;
    public $date_creation;
    public $type;
    public $societe_id;
    protected $inputFilter;
    
    
     public function exchangeArray($data)
    {
         
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->titre = (isset($data['titre'])) ? $data['titre'] : null;
        $this->description  = (isset($data['description'])) ? $data['description'] : null;
        $this->cp  = (isset($data['cp'])) ? $data['cp'] : null;
        $this->ville  = (isset($data['ville'])) ? $data['ville'] : null;
        $this->date_creation  = (isset($data['date_creation'])) ? $data['date_creation'] : null;
        $this->type = (isset($data['type'])) ? $data['type'] : null;
        $this->societe_id  = (isset($data['societe_id'])) ? $data['societe_id'] : null;
    }
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }

    public function getId() {
        return (int)$this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCp() {
        return (int)$this->cp;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getDate_creation() {
        return $this->date_creation;
    }

    public function getType() {
        return $this->type;
    }

    public function getSociete_id() {
        return (int)$this->societe_id;
    }

    public function setId($id) {
        $this->id = (int) $id;
        return $this;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setCp($cp) {
        $this->cp = (int) $cp;
        return $this;
    }

    public function setVille($ville) {
        $this->ville = $ville;
        return $this;
    }

    public function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function setSociete_id($societe_id) {
        $this->societe_id = (int) $societe_id;
        return $this;
    }

   
    public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }


     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'titre',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 255,
                         ),
                     ),
                 ),
             ));
             
             $inputFilter->add(array(
                  'name'     => 'cp',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));
             
             $inputFilter->add(array(
                 'name'     => 'ville',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 255,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'description',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                         ),
                     ),
                 ),
             ));
             
             $inputFilter->add(array(
                 'name'     => 'type',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 255,
                         ),
                     ),
                 ),
             ));

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }

}
