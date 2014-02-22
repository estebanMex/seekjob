<?php
namespace My\Db;

use Zend\Db\TableGateway\TableGateway;

class Table
{

     public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

}