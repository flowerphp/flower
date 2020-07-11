<?php


namespace App\Core;


use Jenssegers\Blade\Blade;

class View
{
    /**
     * @param string $viewName
     * @param array|null $data
     * @return string
     */
    public static function View(string $viewName, array $data = [])
    {
        $Blade = new Blade(
            $_SERVER['DOCUMENT_ROOT']."/resources/views",
            $_SERVER['DOCUMENT_ROOT']."/app/cache");

        return $Blade->render($viewName, $data);
    }
}