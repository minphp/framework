<?php

namespace MinPhp\Http\Contracts;

interface RequestInterface
{
    public function getMethod(): string;

    public function getUri(): string;
}