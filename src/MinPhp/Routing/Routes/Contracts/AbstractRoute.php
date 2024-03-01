<?php

namespace MinPhp\Routing\Routes\Contracts;

abstract readonly class AbstractRoute
{
    public function __construct(
        private string $path,
        private string $page
    ) {}

    abstract public function method(): string;

    public function getPath(): string
    {
        return $this->path;
    }

    public function getPage(): string
    {
        return $this->page;
    }
}