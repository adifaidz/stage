<?php
namespace Chimcoders\Stage;

use InvalidArgumentException;

abstract class Client
{
    protected $http;
    protected $currentVersion = 'v1';
    protected $supportedVersions = [];

    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function use(string $version)
    {
        if(!in_array($version, $this->supportedVersions))
            throw InvalidArgumentException;
        $this->currentVersion = $version;

        return $this;
    }

    public function version() : string
    {
        return $this->currentVersion;
    }

    public function resource( string $name, ?string $version) : Resource
    {
        if(!$version)
            $version = $this->version();

        if(!in_array($version, $this->supportedVersions))
            throw InvalidArgumentException;

        $class = sprintf('%s\%s\%s',$this->getResourceNamespace(), $version, $name);

        return $this->buildResource($class);
    }

    protected function buildResource(string $class) : Resource
    {
        return new $class($this, $this->http);
    }

    abstract public function getResourceNamespace();
}
