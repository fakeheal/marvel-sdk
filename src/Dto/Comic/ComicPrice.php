<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Dto\Comic;

use Chronoarc\Marvel\Dto;

final class ComicPrice extends Dto
{
    /**
     * @param ?string $type A description of the price (e.g. print price, digital price).
     * @param ?float $price
     */
    public function __construct(
        public ?string $type = null,
        public ?float  $price = null,
    )
    {
    }
}
