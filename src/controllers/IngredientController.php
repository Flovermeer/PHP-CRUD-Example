<?php

namespace Api;

use Api\IController;
use Api\Ingredient;

require_once __DIR__ . '/IController.php';
require_once __DIR__ . '/../models/Ingredient.php';
class IngredientController implements IController
{

    public function __construct($db)
    {
        $this->ingredients = new Ingredient($db);
    }

    public function create($data)
    {
        $result = $this->ingredients->create($data);
        return json_encode($result);
    }

    public function readAll()
    {
        $result = $this->ingredients->readAll();
        return json_encode($result);
    }

    public function readOne(int $id)
    {
        $result = $this->ingredients->readOne($id);
        return json_encode($result);
    }

    public function update(int $id)
    {
        $result = $this->ingredients->update($id);
        return json_encode($result);
    }

    public function delete(int $id)
    {
        $result = $this->ingredients->delete($id);
        return json_encode($result);
    }
}

return new IngredientController($db);
