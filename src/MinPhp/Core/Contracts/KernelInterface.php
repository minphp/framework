<?php

namespace MinPhp\Core\Contracts;

interface KernelInterface
{
    public function run(array $routes): void;
}