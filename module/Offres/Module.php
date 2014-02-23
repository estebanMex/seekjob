<?php
namespace Offres;

use Offres\Entity\Offre;
use Offres\Model\OffreTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'offres' =>  function($sm) {
                    $tableGateway = $sm->get('OffreTableGateway');
                    $table = new OffreTable($tableGateway);
                    return $table;
                },
                'OffreTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Offre());
                    return new TableGateway('offre', $dbAdapter, null, $resultSetPrototype);
                }
                ),
            );
    }

    public function getAutoloaderConfig()
    {
        return array(
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
