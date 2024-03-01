<?php

namespace MinPhp\Http\Contracts;

interface ResponseInterface
{
    public function setStatusCode(int $statusCode): void;

    public function addHeader(string $name, string $value): void;

    public function setBody(string $body): void;

    public function send(): never;
}