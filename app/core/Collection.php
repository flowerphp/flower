<?php


namespace App\Core;


class Collection implements iCollection
{

    private $collection;


    /**
     * @param $item
     * @return mixed
     */
    public function _add($item) : Collection
    {
        $this->collection[] = $item;
        return $this;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function _remove(int $id) : Collection
    {
        array_splice($this->collection, $id, 1);
        return $this;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function _get(int $id)
    {
        return $this->collection[$id];
    }

    /**
     * @return array
     */
    public function _getAll(): array
    {
        return $this->collection;
    }
}