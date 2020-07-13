<?php

namespace Flower;

use App\Core\Core;
use App\Core\Environment;
use App\Core\session\Session;
use App\Core\View;
use Flower\CoreAPI\CoreAPI;

class Environ
{

    private $Core;
    private $Session;
    private $Env;
    private $View;
    private $Router;

    /**
     * Environ constructor.
     */
    public function __construct()
    {
        $this->Env = new Environment();

        $this->View = new View();

        $this->Core = new CoreAPI(new Core());

        $this->Session = new Session(
            $this->getAPICore()->getConfig()->getApplication()->getName(),
            $this->getAPICore()->getCore(), [
                "timestamp" => time(),
                "outSessionWork" => strtotime("+365 day"),
                "sessionId" => ":id"
            ]
        );

        $this->Router = new RouterAPI\RouterAPI($this->getAPICore());

    }

    /**
     * @return RouterAPI\RouterAPI
     */
    public function getRouter(): RouterAPI\RouterAPI
    {
        return $this->Router;
    }

    /**
     * @return Session
     */
    public function getSession(): Session
    {
        return $this->Session;
    }

    /**
     * @return View
     */
    public function getView(): View
    {
        return $this->View;
    }

    /**
     * @return Environment
     */
    public function getEnv(): Environment
    {
        return $this->Env;
    }

    /**
     * @return CoreAPI
     */
    public function getAPICore(): CoreAPI
    {
        return $this->Core;
    }

}