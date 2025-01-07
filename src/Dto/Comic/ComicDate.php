<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Dto\Comic;

use Chronoarc\Marvel\Dto;

final class ComicDate extends Dto
{
    /**
     * @param ?string $type A description of the date (e.g. onsale date, FOC date).
     * @param ?string $date
     */
    public function __construct(
        public ?string $type = null,
        public ?string $date = null,
    )
    {
    }
}
