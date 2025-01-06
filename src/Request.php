<?php

declare(strict_types=1);

namespace Chronoarc\Marvel;

use Saloon\Http\Request as SaloonRequest;

abstract class Request extends SaloonRequest
{
    /**
     * Convert an array to comma separated values to be included in the query params.
     *
     * @param array $array
     * @return string|null
     */
    protected static function toCsv(array $array): ?string
    {
        return $array ? implode(',', $array) : null;
    }
}
