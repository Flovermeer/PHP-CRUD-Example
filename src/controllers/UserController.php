<?php

namespace Api;

use Api\IController;
use Api\User;

require_once __DIR__ . '/IController.php';
require_once __DIR__ . '/../models/User.php';


class UserController implements IController
{

    public function __construct($db)
    {
        $this->users = new User($db);
    }

    public function create()
    {
    }

    public function readAll()
    {

        $result = $this->users->readAll();
        return json_encode($result);
    }

    public function readOne(int $id)
    {
        $result = $this->users->readOne($id);
        return json_encode($result);
    }

    public function update(int $id)
    {
    }

    public function delete(int $id)
    {
    }
}

return new UserController($db);
