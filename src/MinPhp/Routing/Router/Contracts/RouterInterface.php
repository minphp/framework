<?php

namespace MinPhp\Routing\Router\Contracts;

use MinPhp\Http\Contracts\RequestInterface;
use MinPhp\Page\Contracts\PageInterface;

interface RouterInterface
{
    public function handleRequest(RequestInterface $request): ?PageInterface;
}