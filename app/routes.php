<?php

use Flower\Creature;

$Environ->getRouter()->getRootRouter()->get("/", function () {
    Creature::include(new MainCreature());
});
