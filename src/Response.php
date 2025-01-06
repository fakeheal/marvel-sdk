<?php

declare(strict_types=1);

namespace Chronoarc\Marvel;

use Chronoarc\Marvel\Contracts\JsonDeserializable;
use Chronoarc\Marvel\Traits\JsonDeserialize;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

abstract class Response implements JsonDeserialize, WithResponse
{
	use JsonDeserialize;
	use HasResponse;
}
