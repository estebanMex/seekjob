<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Conection\Controller;

use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;


/**
 * Description of ConnectController
 *
 * @author sylvain
 */
class ConectController extends AbstractActionController {
    
        /**
	 * 
	 * @var Request
	 */
    protected $request;
    
    public function indexAction() {
        
       $Connect = new \Conection\Mapper\ConectMapper();
       $mail=$_POST['mail'];
       $password=$_POST['password'];
       $Connect->conect($mail, $password);
      $_SESSION['connect']=($Connect->isConected());
       
       
       
       
    return  header('location:../') ;
	}
    
}
