<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class Character extends Dto
{
    protected static array $attributeMap = ['resourceUri' => 'resourceURI'];
    protected static array $complexArrayTypes = ['urls' => Url::class];


    /**
     * @param ?int $id
     * @param ?string $name The name of the character.
     * @param ?string $description A short bio or description of the character.
     * @param ?string $modified
     * @param ?string $resourceUri The canonical URL identifier for this resource.
     * @param Url[]|null $urls
     * @param ?Image $thumbnail
     * @param ?ComicList $comics
     * @param ?StoryList $stories
     * @param ?EventList $events
     * @param ?SeriesList $series
     */
    public function __construct(
        public ?int        $id = null,
        public ?string     $name = null,
        public ?string     $description = null,
        public ?string     $modified = null,
        public ?string     $resourceUri = null,
        public ?array      $urls = null,
        public ?Image      $thumbnail = null,
        public ?ComicList  $comics = null,
        public ?StoryList  $stories = null,
        public ?EventList  $events = null,
        public ?SeriesList $series = null,
    )
    {
    }
}
