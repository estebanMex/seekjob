<?php
namespace Front;

use Front\Entity\User;
use Front\Model\UserTable;
use Front\Entity\UserInfos;
use Front\Model\UserInfosTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'toto' =>  function($sm) {
                    $tableGateway = $sm->get('UserTableGateway');
                    $table = new UserTable($tableGateway);
                    return $table;
                },
                'UserTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new User());
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                },
                'Front\Model\UserInfosTable' =>  function($sm) {
                    $tableGateway = $sm->get('UserInfosTableGateway');
                    $table = new UserInfosTable($tableGateway);
                    return $table;
                },
                'UserInfosTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new UserInfos());
                    return new TableGateway('user_infos', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }

    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                    'My' => __DIR__ . '/../../vendor/my/library',
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}