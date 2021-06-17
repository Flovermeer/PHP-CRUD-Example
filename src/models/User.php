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
}

return new User($db);
