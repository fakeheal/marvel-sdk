<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Traits;

trait HasComplexArrayTypes
{
    /**
     * Override this to specify the item types (and key types, if necessary) of attributes.
     * Valid values look like ['attributeName' => SomeType::class].
     */
    protected static array $complexArrayTypes = [];

    /**
     * Retrieves the type of items in a complex array attribute.
     *
     * @param string $attributeName
     * @return array|string
     */
    protected static function getArrayType(string $attributeName): array|string
    {
        return static::$complexArrayTypes[$attributeName] ?? 'array';
    }
}