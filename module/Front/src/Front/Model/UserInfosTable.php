<?php
namespace Front\Model;

use Zend\Db\TableGateway\TableGateway;
use My\Db\Table;

class UserInfosTable extends Table
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

   

    public function find($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('user_id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function save(UserInfos $userInfos)
    {
        $data = array(
            'name'  => $userInfos->name,
            'value'  => $userInfos->value,
        );

        $id = (int)$userInfos->user_id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getfind($id)) {
                $this->tableGateway->update($data, array('user_id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function delete($id)
    {
        $this->tableGateway->delete(array('user_id' => $id));
    }
}