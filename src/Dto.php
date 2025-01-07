<?php

declare(strict_types=1);

namespace Chronoarc\Marvel;

use Chronoarc\Marvel\Contracts\JsonDeserializable;
use Chronoarc\Marvel\Traits\HasArrayableAttributes;
use Chronoarc\Marvel\Traits\HasEnumerableAttributes;
use Chronoarc\Marvel\Traits\JsonDeserialize;

class Dto implements JsonDeserializable
{
    use JsonDeserialize;
    use HasArrayableAttributes;
}
