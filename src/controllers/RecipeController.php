<?php

namespace Api;

use Api\IController;
use Api\Recipe;

require_once __DIR__ . '/IController.php';
require_once __DIR__ . '/../models/Recipe.php';
class RecipeController implements IController
{

    public function __construct($db)
    {
        $this->recipes = new Recipe($db);
    }

    public function create($data)
    {
        $result = $this->recipes->create($data);
        return json_encode($result);
    }

    public function readAll()
    {
        $result = $this->recipes->readAll();
        return json_encode($result);
    }

    public function readOne(int $id)
    {
        $result = $this->recipes->readOne($id);
        return json_encode($result);
    }

    public function update(int $id)
    {
        $result = $this->recipes->update($id);
        return json_encode($result);
    }

    public function delete(int $id)
    {
        $result = $this->recipes->delete($id);
        return json_encode($result);
    }
}

return new RecipeController($db);
