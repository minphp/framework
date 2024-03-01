<?php

namespace MinPhp\Routing\Routes\Methods;

use MinPhp\Routing\Routes\Contracts\AbstractRoute;

readonly class Post extends AbstractRoute
{
    public function method(): string
    {
        return 'POST';
    }
}