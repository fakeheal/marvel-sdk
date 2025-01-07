<?php

namespace Chronoarc\Marvel\Traits;

trait HasEnumerableAttributes
{
    protected static array $enumTypes = [];


    protected static function getEnumType(string $attributeName): array|string
    {
        if (!array_key_exists($attributeName, static::$enumTypes)) {
            return 'string';
        }

        return static::$enumTypes[$attributeName];
    }
}
