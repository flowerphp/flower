<?php


namespace App\Core\router;


class Route
{

    private $method;
    private $path;
    private $fn;

    public function __construct(string $method, string $path, $fn)
    {
        $this->method = $method;
        $this->path = $path;
        $this->fn = $fn;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getFn()
    {
        return $this->fn;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    public function __toString()
    {
        return $this->getPath();
    }
}