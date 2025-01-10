<?php

declare(strict_types=1);

namespace Chronoarc\Marvel;

use BackedEnum;
use Saloon\Http\Request as SaloonRequest;

abstract class Request extends SaloonRequest
{
    /**
     * Convert an array to comma separated values to be included in the query params.
     *
     * @param ?array $array
     * @return string|null
     */
    protected function toCsv(?array $array): ?string
    {
        return $array ? implode(',', $array) : null;
    }

    /**
     * Convert an array of enums to comma separated values to be included in the query params.
     *
     * @param array|null $array
     * @return string|null
     */
    protected function enumToCsv(?array $array): ?string
    {
        if (!$array) {
            return null;
        }

        return $this->toCsv(array_map(fn(BackedEnum $enum) => $enum->value, $array));
    }
}
