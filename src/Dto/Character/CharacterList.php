<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Dto\Character;

use Chronoarc\Marvel\Dto;

final class CharacterList extends Dto
{
    protected static array $attributeMap = ['collectionUri' => 'collectionURI'];
    protected static array $complexArrayTypes = ['items' => CharacterSummary::class];


    /**
     * @param ?int $available
     * @param ?int $returned
     * @param ?string $collectionUri The path to the full list of characters in this collection.
     * @param CharacterSummary[]|null $items
     */
    public function __construct(
        public ?int    $available = null,
        public ?int    $returned = null,
        public ?string $collectionUri = null,
        public ?array  $items = null,
    )
    {
    }
}
