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
    
    public function findBySociete($id){
        $id  = (int) $id;
        $resultSet = $this->tableGateway->select(array('societe_id' => $id));
        $rowset = $this->tableGateway->select(array('societe_id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
               }
        return $rowset;
    }

}