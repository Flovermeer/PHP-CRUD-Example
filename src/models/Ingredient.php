<?php

namespace Api;

use Api\Model;

require_once __DIR__ . '/Model.php';

class Ingredient extends Model
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db);
        $this->readAll = $db->prepare('SELECT * FROM ingredients ORDER BY id');
        $this->readOne = $db->prepare('SELECT * FROM ingredients WHERE id=:id');
        $this->create = $db->prepare('INSERT INTO ingredients VALUES(DEFAULT, :name)');
        $this->update = $db->prepare('UPDATE ingredients SET name=:name');
        $this->delete = $db->prepare('DELETE FROM ingredients WHERE id=:id');
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
            'name' => FILTER_SANITIZE_SPECIAL_CHARS,
        ]);

        try {
            $this->create->bindValue(':name', $data['name']);

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
            return "Ingredient: $id deleted";
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        return 'Not implemented yiet';
    }
}

return new Ingredient($db);
