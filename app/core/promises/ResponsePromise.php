<?php


namespace App\Core\promises;


class ResponsePromise extends Promise
{
    private $method;
    private $uri;
    private $timestamp;

    public function __construct(string $method, string $uri, string $timestamp)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->timestamp = $timestamp;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}