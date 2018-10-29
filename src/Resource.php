<?php
namespace Chimcoders\Stage;

class Resource
{
    protected $client;
    protected $http;

    public function __construct(Client $client, HttpClient $http)
    {
        $this->client = $client;
        $this->http = $http;
    }
}