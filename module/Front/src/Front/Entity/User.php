<?php
namespace Front\Entity;

class User
{
    public $id;
    public $role;
    public $email;
    public $password;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->role = (isset($data['role'])) ? $data['role'] : null;
        $this->email  = (isset($data['email'])) ? $data['email'] : null;
        $this->password  = (isset($data['password'])) ? $data['password'] : null;
    }
}