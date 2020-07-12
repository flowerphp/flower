<?php


namespace App\Core\session;


use App\Core\Core;
use App\Core\Environment;
use League\Flysystem\FileExistsException;
use League\Flysystem\FileNotFoundException;

class Session
{
    /**
     * @var string
     */
    private $sessionName;

    /**
     * @var Core
     */
    private $core;

    /**
     * @var array
     */
    private $session = [];

    /**
     * Session constructor.
     * @param $sessionName string
     * @param Core $core
     */
    public function __construct(string $sessionName, Core $core)
    {
        $this->core = $core;
        $this->sessionName = $sessionName;

        $this->createSession([
            "timestamp" => time(),
            "outSessionWork" => strtotime("+365 day"),
            "sessionId" => ":id"
        ]);

    }


    /**
     * @return Core
     */
    public function getCore() : Core
    {
        return $this->core;
    }

    /**
     * @return string
     */
    public function getSessionName(): string
    {
        return $this->sessionName;
    }

    public function createSession($defaultData = [])
    {
        if (!$this->isAlreadySession())
        {
           $this->writeSession($defaultData);
        }

        $this->setSessionData();
    }

    /**
     * @return bool
     * @param array $defaultData
     */
    private function writeSession(array $defaultData) : bool
    {
        $SessionId = $this->generateIdSession();
        $defaultData = str_replace([":id"], [$SessionId], $defaultData);
        $this->setSessionData($defaultData);
        try {
            $this->getCore()->getFileSystem()->write(Environment::APP_SESSIONS_PATH . $SessionId . Environment::EXT_SESSIONS, json_encode($defaultData));
        } catch (FileExistsException $e) {
            return false;
        } finally {
            setcookie($this->getSessionName(),$SessionId, strtotime("+365 day"));
        }
        return true;
    }

    /**
     * @param array $data
     */
    private function setSessionData($data = [])
    {

        if (empty($data))
        {
            try {
                $this->session = json_decode(
                    $this
                        ->getCore()
                        ->getFileSystem()
                        ->read(Environment::APP_SESSIONS_PATH . $_COOKIE[$this->getSessionName()] . Environment::EXT_SESSIONS)
                    , true);
            } catch (FileNotFoundException $e) {
                // If error
            }
        } else {
            $this->session = $data;
        }
    }



    private function generateIdSession()
    {
        return
            rand(0, 99999999) .
            hash("sha256", rand(0, 99999999)) .
            rand(0, 99999999) .
            hash("sha256", rand(0, 99999999)) ;
    }

    /**
     * @return bool
     */
    public function isAlreadySession() : bool
    {
        if (empty($_COOKIE[$this->getSessionName()]))
            return false;
        else
            return true;
    }

    /**
     * @return array
     */
    public function getSession() : array
    {
        return $this->session;
    }


}