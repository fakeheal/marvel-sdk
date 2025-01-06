<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Contracts;

interface JsonDeserializable
{
    public static function fromJson(mixed $data): mixed;
}
