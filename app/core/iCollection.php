<?php


namespace App\Core;


interface iCollection
{
    public function _add($item) : Collection;
    public function _remove(int $id) : Collection;
    public function _get(int $id);
    public function _getAll() : array;
}