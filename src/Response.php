<?php
namespace Chimcoders\Stage;

abstract class Response
{
    abstract public function toArray();
    abstract public function toString();
}