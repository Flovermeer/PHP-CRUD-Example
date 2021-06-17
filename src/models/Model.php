<?php

namespace Api;

abstract class Model
{
    protected \PDOStatement $readAll;
    protected \PDOStatement $readOne;
    protected \PDOStatement $create;
    protected \PDOStatement $update;
    protected \PDOStatement $delete;

    function __construct(protected \PDO $db)
    {
    }
}
