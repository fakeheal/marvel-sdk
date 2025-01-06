<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class Image extends Dto
{
    /**
     * @param ?string $path The directory path of to the image.
     * @param ?string $extension The file extension for the image.
     */
    public function __construct(
        public ?string $path = null,
        public ?string $extension = null,
    )
    {
    }
}
