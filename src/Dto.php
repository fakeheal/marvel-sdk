<?php

declare(strict_types=1);

namespace Chronoarc\Marvel;

use Chronoarc\Marvel\Contracts\JsonDeserializable;
use Chronoarc\Marvel\Traits\JsonDeserialize;
use Chronoarc\Marvel\Traits\HasArrayableAttributes;

class Dto implements JsonDeserializable
{
	use JsonDeserialize;
	use HasArrayableAttributes;
}
