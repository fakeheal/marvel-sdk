<?php

namespace Chronoarc\Marvel;

use Saloon\Http\Connector;

abstract class Resource
{
    public function __construct(
        protected Connector $connector,
    )
    {
    }
}
