<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class Url extends Dto
{
    /**
     * @param ?string $type A text identifier for the URL.
     * @param ?string $url A full URL (including scheme, domain, and path).
     */
    public function __construct(
        public ?string $type = null,
        public ?string $url = null,
    )
    {
    }
}
