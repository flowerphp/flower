<?php


use App\Core\View;
use Flower\Creature;

class MainCreature extends Creature
{
    public function use(array $args)
    {
        print View::View('index');
    }
}