<?php

namespace Api;

use Api\IController;
use Api\Step;

require_once __DIR__ . '/IController.php';
require_once __DIR__ . '/../models/Step.php';

class StepController implements IController
{

    public function __construct($db)
    {
        $this->steps = new Step($db);
    }

    public function create($data)
    {
        $result = $this->steps->create($data);
        return json_encode($result);
    }

    public function readAll()
    {
        $result = $this->steps->readAll();
        return json_encode($result);
    }

    public function readOne(int $id)
    {
        $result = $this->steps->readOne($id);
        return json_encode($result);
    }

    public function update(int $id)
    {
        $result = $this->steps->update($id);
        return json_encode($result);
    }

    public function delete(int $id)
    {
        $result = $this->steps->delete($id);
        return json_encode($result);
    }
}

return new StepController($db);
