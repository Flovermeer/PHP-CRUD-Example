<?php

namespace Api;

use Api\Model;

require_once __DIR__ . '/Model.php';

class Recipe extends Model
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db);
        $this->readAll = $db->prepare('SELECT * FROM recipes ORDER BY id');
        $this->readOne = $db->prepare('SELECT * FROM recipes WHERE id=:id');
        $this->create = $db->prepare('INSERT INTO recipes VALUES(DEFAULT, :name, :difficulty, :price_category, :cooking_time, :baking_time, :meal_type, :author_id)');
        $this->update = $db->prepare('UPDATE recipes SET name=:name, difficulty=:difficulty, price_category=:price_category, cooking_time=:cooking_time, baking_time=:baking_time, meal_type=:meal_type, author_id=:author_id');
        $this->delete = $db->prepare('DELETE FROM recipes WHERE id=:id');
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
            'difficulty' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'price_category' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'cooking_time' => FILTER_SANITIZE_NUMBER_INT,
            'baking_time' => FILTER_SANITIZE_NUMBER_INT,
            'meal_type' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'author_id' => FILTER_SANITIZE_NUMBER_INT,
        ]);

        try {
            $this->create->bindValue(':name', $data['name']);
            $this->create->bindValue(':difficulty', $data['difficulty']);
            $this->create->bindValue(':price_category', $data['price_category']);
            $this->create->bindValue(':cooking_time', $data['cooking_time']);
            $this->create->bindValue(':baking_time', $data['baking_time']);
            $this->create->bindValue(':meal_type', $data['meal_type']);
            $this->create->bindValue(':author_id', $data['author_id']);

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
            return "Recipe: $id deleted";
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        return 'Not implemented yiet';
    }
}

return new Recipe($db);
