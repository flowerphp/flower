<?php


namespace App\Core\session;


use App\Core\Core;
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
            "timestamp" => time()
        ]);

        $this->setSessionData();

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
            $SessionId = $this->generateIdSession();

            try {
                $this->getCore()->getFileSystem()->write("./app/cache/sessions/" . $SessionId . ".session", json_encode($defaultData));
            } catch (FileExistsException $e) {
                // If error
            } finally {
                setcookie($this->getSessionName(),$SessionId);
            }
        }

    }

    private function setSessionData()
    {
        try {
            $this->session = json_decode(
                $this
                    ->getCore()
                    ->getFileSystem()
                    ->read("./app/cache/sessions/" . $_COOKIE[$this->getSessionName()] . ".session")
                , true);
        } catch (FileNotFoundException $e) {
            // If error
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