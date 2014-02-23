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

    public function save($offre)
    {
       
        $data = array(
            'titre' =>  $offre->gettitre(),
            'description'  => $offre->getdescription(),
            'cp'  => $offre->getcp(),
            'ville'  => $offre->getville(),
            'type'  => $offre->gettype(),
            'societe_id'  => 1,
        );
        
        $id = $offre->getid();
       
        if ($id == 0) {
          
            $this->tableGateway->insert($data);
        } else {
            if ($offre->getid()) {
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