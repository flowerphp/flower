<?php


namespace App\Core\Promises;


class MysqlDatabasesConfigPromise extends Promise
{
    private $enabled;
    private $host;
    private $user_name;
    private $data_base_name;
    private $password;

    /**
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @param string $data_base_name
     */
    public function setDataBaseName($data_base_name)
    {
        $this->data_base_name = $data_base_name;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param string $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @return string
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getDataBaseName()
    {
        return $this->data_base_name;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->user_name;
    }
}