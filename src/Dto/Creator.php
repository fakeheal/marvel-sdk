<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class Creator extends Dto
{
    protected static array $attributeMap = ['resourceUri' => 'resourceURI'];
    protected static array $complexArrayTypes = ['urls' => Url::class];


    /**
     * @param ?int $id
     * @param ?string $firstName The first name of the creator.
     * @param ?string $middleName The middle name of the creator.
     * @param ?string $lastName The last name of the creator.
     * @param ?string $suffix The suffix or honorific for the creator.
     * @param ?string $fullName The full name of the creator (a space-separated concatenation of the above four fields).
     * @param ?string $modified
     * @param ?string $resourceUri The canonical URL identifier for this resource.
     * @param Url[]|null $urls
     * @param ?Image $thumbnail
     * @param ?SeriesList $series
     * @param ?StoryList $stories
     * @param ?ComicList $comics
     * @param ?EventList $events
     */
    public function __construct(
        public ?int        $id = null,
        public ?string     $firstName = null,
        public ?string     $middleName = null,
        public ?string     $lastName = null,
        public ?string     $suffix = null,
        public ?string     $fullName = null,
        public ?string     $modified = null,
        public ?string     $resourceUri = null,
        public ?array      $urls = null,
        public ?Image      $thumbnail = null,
        public ?SeriesList $series = null,
        public ?StoryList  $stories = null,
        public ?ComicList  $comics = null,
        public ?EventList  $events = null,
    )
    {
    }
}
