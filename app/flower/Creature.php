<?php


namespace Flower;


class Creature implements CreatureInterface
{
    /**
     * Creature constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param array $args
     */
    public function use(array $args)
    {

    }

    /**
     * @param CreatureInterface $creature
     * @param string[] $args
     */
    public static function include(CreatureInterface $creature, string ...$args)
    {
        $creature->use($args);
    }
}