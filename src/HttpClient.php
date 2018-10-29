<?php
namespace Chimcoders\Stage;

abstract class HttpClient
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    abstract public function send($method, $url, $options) : Response;

    public function get($url, $options)
    {
        $this->send(self::METHOD_GET, $url, $options);
    }

    public function post($url, $options)
    {
        $this->send(self::METHOD_POST, $url, $options);
    }

    public function put($url, $options)
    {
        $this->send(self::METHOD_PUT, $url, $options);
    }

    public function patch($url, $options)
    {
        $this->send(self::METHOD_PATCH, $url, $options);
    }

    public function delete($url, $options)
    {
        $this->send(self::METHOD_DELETE, $url, $options);
    }
}
