<?php

namespace MinPhp\Http;

use MinPhp\Http\Contracts\RequestInterface;

readonly class Request implements RequestInterface {

    public function __construct(
        private string $method,
        private string $uri
    ) {}

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}