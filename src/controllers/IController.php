<?php

namespace Api;

interface IController
{
    function create($data);
    function readAll();
    function readOne(int $id);
    function update(int $id);
    function delete(int $id);
}
