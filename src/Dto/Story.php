<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class Story extends Dto
{
    protected static array $attributeMap = ['resourceUri' => 'resourceURI'];


    /**
     * @param ?int $id
     * @param ?string $title The story title.
     * @param ?string $description A short description of the story.
     * @param ?string $resourceUri The canonical URL identifier for this resource.
     * @param ?string $type The story type e.g. interior story, cover, text story.
     * @param ?string $modified
     * @param ?Image $thumbnail
     * @param ?ComicList $comics
     * @param ?SeriesList $series
     * @param ?EventList $events
     * @param ?CharacterList $characters
     * @param ?CreatorList $creators
     * @param ?ComicSummary $originalissue
     */
    public function __construct(
        public ?int           $id = null,
        public ?string        $title = null,
        public ?string        $description = null,
        public ?string        $resourceUri = null,
        public ?string        $type = null,
        public ?string        $modified = null,
        public ?Image         $thumbnail = null,
        public ?ComicList     $comics = null,
        public ?SeriesList    $series = null,
        public ?EventList     $events = null,
        public ?CharacterList $characters = null,
        public ?CreatorList   $creators = null,
        public ?ComicSummary  $originalissue = null,
    )
    {
    }
}
