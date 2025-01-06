<?php



declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class Series extends Dto
{
	protected static array $attributeMap = ['resourceUri' => 'resourceURI'];
	protected static array $complexArrayTypes = ['urls' => Url::class];


	/**
	 * @param ?int $id
	 * @param ?string $title The canonical title of the series.
	 * @param ?string $description A description of the series.
	 * @param ?string $resourceUri The canonical URL identifier for this resource.
	 * @param Url[]|null $urls
	 * @param ?int $startYear
	 * @param ?int $endYear
	 * @param ?string $rating The age-appropriateness rating for the series.
	 * @param ?string $modified
	 * @param ?Image $thumbnail
	 * @param ?ComicList $comics
	 * @param ?StoryList $stories
	 * @param ?EventList $events
	 * @param ?CharacterList $characters
	 * @param ?CreatorList $creators
	 * @param ?SeriesSummary $next
	 * @param ?SeriesSummary $previous
	 */
	public function __construct(
		public ?int $id = null,
		public ?string $title = null,
		public ?string $description = null,
		public ?string $resourceUri = null,
		public ?array $urls = null,
		public ?int $startYear = null,
		public ?int $endYear = null,
		public ?string $rating = null,
		public ?string $modified = null,
		public ?Image $thumbnail = null,
		public ?ComicList $comics = null,
		public ?StoryList $stories = null,
		public ?EventList $events = null,
		public ?CharacterList $characters = null,
		public ?CreatorList $creators = null,
		public ?SeriesSummary $next = null,
		public ?SeriesSummary $previous = null,
	) {
	}
}
