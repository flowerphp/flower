<?php


namespace App\Core\session;


class Session
{
    /**
     * @var string
     */
    private $sessionName;

    /**
     * Session constructor.
     * @param $sessionName string
     */
    public function __construct(string $sessionName)
    {
        $this->sessionName = $sessionName;
    }


    /**
     * @return string
     */
    public function getSessionName(): string
    {
        return $this->sessionName;
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


}