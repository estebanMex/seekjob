<?php
namespace Front\Entity;

class UserInfos
{
    public $user_id;
    public $name;
    public $value;


    public function exchangeArray($data)
    {
        $this->user_id     = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->value  = (isset($data['value'])) ? $data['value'] : null;
    }
}