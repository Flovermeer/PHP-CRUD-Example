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

    public function create($data)
    {

        $result = $this->users->create($data);
        return json_encode($result);
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
        $result = $this->users->update($id);
        return json_encode($result);
    }

    public function delete(int $id)
    {
        $result = $this->users->delete($id);
        return json_encode($result);
    }

    public function getUserRecipes(int $id)
    {
        $result = $this->users->getRecipes($id);
        return json_encode($result);
    }
}

return new UserController($db);
