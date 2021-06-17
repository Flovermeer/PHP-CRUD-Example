<?php

namespace Api;

use Api\Model;

require_once __DIR__ . '/Model.php';

class Step extends Model
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db);
        $this->readAll = $db->prepare('SELECT * FROM steps ORDER BY id');
        $this->readOne = $db->prepare('SELECT * FROM steps WHERE id=:id');
        $this->create = $db->prepare('INSERT INTO steps VALUES(DEFAULT, :description, :number, :recipe_id)');
        $this->update = $db->prepare('UPDATE steps SET description=:description, number=:number, recipe_id=:recipe_id');
        $this->delete = $db->prepare('DELETE FROM steps WHERE id=:id');
    }

    public function readAll()
    {
        $this->readAll->execute();
        return $this->readAll->fetchAll();
    }

    public function readOne(int $id)
    {
        $this->readOne->bindValue(':id', $id);
        $this->readOne->execute();
        return $this->readOne->fetch();
    }

    public function create($data)
    {
        $data = filter_input_array(INPUT_POST, [
            'description' => FILTER_SANITIZE_SPECIAL_CHARS,
            'number' => FILTER_SANITIZE_NUMBER_INT,
            'recipe_id' => FILTER_SANITIZE_NUMBER_INT
        ]);

        try {
            $this->create->bindValue(':description', $data['description']);
            $this->create->bindValue(':number', $data['number']);
            $this->create->bindValue(':recipe_id', $data['recipe_id']);

            $this->create->execute();

            return $this->readOne($this->db->lastInsertId());
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->delete->bindValue(':id', $id);
            $this->delete->execute();
            return "Step: $id deleted";
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        return 'Not implemented yiet';
    }
}

return new Step($db);
