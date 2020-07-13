<?php

namespace Flower;

use App\Core\Core;
use App\Core\session\Session;
use Flower\CoreAPI\CoreAPI;

class Environ
{

    private $Core;
    private $Session;

    /**
     * Environ constructor.
     */
    public function __construct()
    {
        $this->Core = new CoreAPI(new Core());

        $this->Session = new Session(
            $this->getAPICore()->getConfig()->getApplication()->getName(),
            $this->getAPICore()->getCore(), [
                "timestamp" => time(),
                "outSessionWork" => strtotime("+365 day"),
                "sessionId" => ":id"
            ]
        );
    }


    /**
     * @return CoreAPI
     */
    public function getAPICore(): CoreAPI
    {
        return $this->Core;
    }

}