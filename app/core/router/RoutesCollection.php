<?php


namespace App\Core\Router;


use App\Core\Collection;

/**
 * Class RoutesCollection
 * @package App\Core\Router
 * @deprecated
 */
class RoutesCollection extends Collection
{
    public function _add($item): Collection
    {
        foreach ($this->_getAll() as $item => $value)
        {
            if ($item['uri'] == $value['uri'])
            {
                return $this;
            } else {
                $this->collection[] = $item;
                return $this;
            }
        }

        return parent::_add($item);
    }
}