<?php

namespace Offres\Entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of offre
 *
 * @author sylvain
 */
class Offre {
   
    public $id;
    public $titre;
    public $description;
    public $cp;
    public $ville;
    public $date_creation;
    public $type;
    public $societe_id;
    
    
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
    
    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCp() {
        return $this->cp;
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
        return $this->societe_id;
    }

    public function setId($id) {
        $this->id = $id;
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
        $this->cp = $cp;
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
        $this->societe_id = $societe_id;
        return $this;
    }

 
}
