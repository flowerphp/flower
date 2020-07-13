<?php


namespace Flower;


interface CreatureInterface
{
    public function __construct();

    public static function include(CreatureInterface $creature);

    public function use(array $args);
}