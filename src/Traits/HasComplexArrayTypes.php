<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Traits;

trait HasComplexArrayTypes
{
    protected static array $complexArrayTypes = [];


    protected static function getArrayType(string $attributeName): array|string
    {
        if (!array_key_exists($attributeName, static::$complexArrayTypes)) {
            return 'array';
        }

        return [static::$complexArrayTypes[$attributeName]];
    }
}
