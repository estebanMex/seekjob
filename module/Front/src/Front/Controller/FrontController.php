<?php
namespace Front\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\AuthenticationService;

class FrontController extends AbstractActionController
{
    protected $user;
    protected $userInfos;
    
    public function getUserTable()
    {
        if (!$this->user) {
            $sm = $this->getServiceLocator();
            $this->user = $sm->get('toto');
        }
        return $this->user;
    }
    
     public function getUserInfosTable()
    {
        if (!$this->userInfos) {
            $sm = $this->getServiceLocator();
            $this->userInfos = $sm->get('Front\Model\UserInfosTable');
        }
        return $this->userInfos;
    }
    public function indexAction()
    {   
        
//        $sm = $this->getServiceLocator();
//        $auth = new AuthenticationService();
//        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
//        $authAdapter = new AuthAdapter($dbAdapter, // connection
//                               'user', // nom de la table
//                               'email',
//                               'password'
//                               );
//         $authAdapter->setIdentity('co@test.fr')
//            ->setCredential('0000');
//        $auth->setAdapter($authAdapter);
// 
//        var_dump($auth->getIdentity());
//        var_dump($auth->authenticate());die;

        //var_dump($this->getUserInfosTable()->fetchAll());die;
        return new ViewModel(array(
            'users' => $this->getUserTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}