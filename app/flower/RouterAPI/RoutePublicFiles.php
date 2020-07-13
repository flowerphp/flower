<?php


namespace Flower\RouterAPI;


use Flower\Environ;

class RoutePublicFiles
{
    public static function setRoutes(Environ $environ)
    {
        $listFiles = $environ->getAPICore()->getRootDirectory()->listContents("./public",true);
        foreach ($listFiles as $file)
        {
            $data = $environ->getAPICore()->getRootDirectory()->read($file['path']);

            $environ->getRouter()->getRootRouter()->get("/".str_replace("public/","",$file['path']), function () use ($data, $file) {
                header("content-type: " . mime_content_type($file['path']));
                print $data;
            });
        }
    }
}