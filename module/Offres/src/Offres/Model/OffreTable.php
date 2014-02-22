<?php
namespace Offres\Model;

use Zend\Db\TableGateway\TableGateway;
use My\Db\Table;


class OffreTable extends Table
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
      public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function find($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function save(Offre $offre)
    {
        $data = array(
            'role' =>  $offre->titre,
            'description'  => $offre->description,
            'cp'  => $offre->cp,
            'ville'  => $offre->ville,
            'date_creation'  => $offre->date_creation,
            'type'  => $offre->type,
            'societe_id'  => $offre->societe_id,
        );

        $id = (int)$user->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function delete($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}