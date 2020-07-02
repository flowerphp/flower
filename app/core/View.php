<?php


namespace App\Core;


class View
{
    public static function View(string $view_name, Core $core,  array $data = null)
    {
        return $core->getBlade()->render($view_name, $data);
    }
}