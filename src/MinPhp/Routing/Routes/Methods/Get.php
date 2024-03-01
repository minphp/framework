<?php

namespace MinPhp\Routing\Routes\Methods;

use MinPhp\Routing\Routes\Contracts\AbstractRoute;

readonly class Get extends AbstractRoute
{
    public function method(): string
    {
        return 'GET';
    }
}