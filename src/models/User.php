<?php

namespace Api;

use Api\Model;

require_once __DIR__ . '/Model.php';

class User extends Model
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db);
        $this->readAll = $db->prepare('SELECT id, firstname, lastname, username, email FROM users');
        $this->readOne = $db->prepare('SELECT id, firstname, lastname, username, email FROM users WHERE id=:id');
        $this->create = $db->prepare('INSERT INTO users VALUES(DEFAULT, :firstname, :lastname, :username, :email, :password)');
        $this->update = $db->prepare('UPDATE users SET firstname=:firstname, lastname=:lastname, username=:username, email=:email, password=:password WHERE id=:id');
        $this->delete = $db->prepare('DELETE FROM users WHERE id=:id');
        $this->getRecipes = $db->prepare('SELECT * FROM recipes WHERE author_id=:id');
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
        $input = filter_input_array(INPUT_POST, [
            'firstname' => FILTER_SANITIZE_SPECIAL_CHARS,
            'lastname' => FILTER_SANITIZE_SPECIAL_CHARS,
            'username' => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_SANITIZE_EMAIL,
        ]);

        try {
            $this->create->bindValue(':firstname', $input['firstname']);
            $this->create->bindValue(':lastname', $input['lastname']);
            $this->create->bindValue(':username', $input['username']);
            $this->create->bindValue(':email', $input['email']);
            $this->create->bindValue(':password', password_hash($data['password'], PASSWORD_ARGON2I));
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
            return "User: $id deleted";
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        return 'Not implemented yiet';
    }

    public function getRecipes($id)
    {
        try {
            $this->getRecipes->bindValue(':id', $id);
            $this->getRecipes->execute();

            return $this->getRecipes->fetchAll();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
}

return new User($db);
