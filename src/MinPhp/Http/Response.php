<?php

namespace MinPhp\Http;

use MinPhp\Http\Constants\HttpStatusCode;
use MinPhp\Http\Contracts\ResponseInterface;

class Response implements ResponseInterface {

    private int $statusCode = HttpStatusCode::STATUS_200;
    private array $headers = [];
    private string $body;

    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    public function addHeader(string $name, string $value): void
    {
        $this->headers[$name] = $value;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function send(): never
    {
        foreach ($this->headers as $name => $value) {
            header($name . ": " . $value);
        }

        http_response_code($this->statusCode);

        echo $this->body;
        exit();
    }
}
