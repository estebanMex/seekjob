<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Conection\Mapper;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;
use PDO;
/**
 * Description of ConectMapper
 *
 * @author sylvain
 */
class ConectMapper {
    
        /**
	 * 
	 * @var gateway
         * 
	 */
   protected $gateway;
    
   
    public function __construct() {
        $this->gateway = new PDO('mysql:dbname=seekjob2;host=127.0.0.1', 'root', '');
        $this->gateway->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    
     /**
      * 
      * @param type $name
      */
    
    public function isCandidat($name){
        isset($name)&&($name=="nomCandidat")?true : false;
    }
    
    /**
      * 
      * @param type $name
      */
    
    public function isSociete($name){
         isset($name)&&($name=="nomSociete")?true : false;
    }
        /**
	 * 
	 * @var login
         * @var password
         * 
	 */
    public function conect($login, $password){
       
        $data =  $this->gateway->prepare("SELECT * FROM conection WHERE mail=:mail AND password=:password");
        $data ->execute(array(
                'mail'=>$login,
                'password'=>$password
                )
                );
        $isNul= $data->fetch(PDO::FETCH_ASSOC);
      if ($isNul === null) {
        $data = "Mauvais login/pass";
    } else {

        
        $i = $isNul['id'];
        $data =  $this->gateway->prepare("SELECT * FROM candidat WHERE conection_id =:id");
       $data ->execute(array(
                'id'=>$i,
                ) );
       
        $candidat = $data->fetch(PDO::FETCH_ASSOC);

       $data =  $this->gateway->prepare("SELECT * FROM societe WHERE conection_id =:id");
       $data ->execute(array(
                'id'=>$i,
                ) );
       $societe = $data->fetch(PDO::FETCH_ASSOC);
        // On enregistre dans la session le login de l'utilisateur qui s'est connectÃ©

      foreach ($isNul as $key => $value) {
            $_SESSION[$key] = $value;
        }
        if ($societe != null) {
            foreach ($societe as $key => $value) {
                $_SESSION[$key] = $value;
            }
            
        } else {
            foreach ($candidat as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }
      //  var_dump($_SESSION);
     
          // Si on vient d'une page sÃ©curisÃ©e
        // on redirige vers la page d'origine

        if (isset($_SESSION["securedPage"])) {
            $page = $_SESSION["securedPage"];
            unset($_SESSION["securedPage"]);
        } else {

            // Sinon on redirigera vers l'index avec un message
            $page = "index.php";

            $_SESSION["flashMessage"] = "Bienvenue" . $membre['nomSociete'] . ", vous Ãªtes connectÃ©";
        }
        
        // rediriger et quitter 
        header("Location: ../");
        exit();
    }
        
    }
    
}
