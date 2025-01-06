<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class CreatorSummary extends Dto
{
    protected static array $attributeMap = ['resourceUri' => 'resourceURI'];


    /**
     * @param ?string $resourceUri The path to the individual creator resource.
     * @param ?string $name The full name of the creator.
     * @param ?string $role The role of the creator in the parent entity.
     */
    public function __construct(
        public ?string $resourceUri = null,
        public ?string $name = null,
        public ?string $role = null,
    )
    {
    }
}
