<?php



declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class Event extends Dto
{
	protected static array $attributeMap = ['resourceUri' => 'resourceURI'];
	protected static array $complexArrayTypes = ['urls' => Url::class];


	/**
	 * @param ?int $id
	 * @param ?string $title The title of the event.
	 * @param ?string $description A description of the event.
	 * @param ?string $resourceUri The canonical URL identifier for this resource.
	 * @param Url[]|null $urls
	 * @param ?string $modified
	 * @param ?string $start
	 * @param ?string $end
	 * @param ?Image $thumbnail
	 * @param ?ComicList $comics
	 * @param ?StoryList $stories
	 * @param ?SeriesList $series
	 * @param ?CharacterList $characters
	 * @param ?CreatorList $creators
	 * @param ?EventSummary $next
	 * @param ?EventSummary $previous
	 */
	public function __construct(
		public ?int $id = null,
		public ?string $title = null,
		public ?string $description = null,
		public ?string $resourceUri = null,
		public ?array $urls = null,
		public ?string $modified = null,
		public ?string $start = null,
		public ?string $end = null,
		public ?Image $thumbnail = null,
		public ?ComicList $comics = null,
		public ?StoryList $stories = null,
		public ?SeriesList $series = null,
		public ?CharacterList $characters = null,
		public ?CreatorList $creators = null,
		public ?EventSummary $next = null,
		public ?EventSummary $previous = null,
	) {
	}
}
