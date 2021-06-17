<?php

namespace Api;

interface IController
{
    function create();
    function readAll();
    function readOne(int $id);
    function update(int $id);
    function delete(int $id);
}
