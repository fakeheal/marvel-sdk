<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class StorySummary extends Dto
{
    protected static array $attributeMap = ['resourceUri' => 'resourceURI'];


    /**
     * @param ?string $resourceUri The path to the individual story resource.
     * @param ?string $name The canonical name of the story.
     * @param ?string $type The type of the story (interior or cover).
     */
    public function __construct(
        public ?string $resourceUri = null,
        public ?string $name = null,
        public ?string $type = null,
    )
    {
    }
}
