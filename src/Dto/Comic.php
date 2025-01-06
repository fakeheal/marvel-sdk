<?php



declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class Comic extends Dto
{
	protected static array $attributeMap = ['resourceUri' => 'resourceURI'];

	protected static array $complexArrayTypes = [
		'textObjects' => TextObject::class,
		'urls' => Url::class,
		'variants' => ComicSummary::class,
		'collections' => ComicSummary::class,
		'collectedIssues' => ComicSummary::class,
		'dates' => ComicDate::class,
		'prices' => ComicPrice::class,
		'images' => Image::class,
	];


	/**
	 * @param ?int $id
	 * @param ?int $digitalId
	 * @param ?string $title The canonical title of the comic.
	 * @param ?float $issueNumber
	 * @param ?string $variantDescription If the issue is a variant (e.g. an alternate cover, second printing, or director’s cut), a text description of the variant.
	 * @param ?string $description The preferred description of the comic.
	 * @param ?string $modified
	 * @param ?string $isbn The ISBN for the comic (generally only populated for collection formats).
	 * @param ?string $upc The UPC barcode number for the comic (generally only populated for periodical formats).
	 * @param ?string $diamondCode The Diamond code for the comic.
	 * @param ?string $ean The EAN barcode for the comic.
	 * @param ?string $issn The ISSN barcode for the comic.
	 * @param ?string $format The publication format of the comic e.g. comic, hardcover, trade paperback.
	 * @param ?int $pageCount
	 * @param TextObject[]|null $textObjects
	 * @param ?string $resourceUri The canonical URL identifier for this resource.
	 * @param Url[]|null $urls
	 * @param ?SeriesSummary $series
	 * @param ComicSummary[]|null $variants
	 * @param ComicSummary[]|null $collections
	 * @param ComicSummary[]|null $collectedIssues
	 * @param ComicDate[]|null $dates
	 * @param ComicPrice[]|null $prices
	 * @param ?Image $thumbnail
	 * @param Image[]|null $images
	 * @param ?CreatorList $creators
	 * @param ?CharacterList $characters
	 * @param ?StoryList $stories
	 * @param ?EventList $events
	 */
	public function __construct(
		public ?int $id = null,
		public ?int $digitalId = null,
		public ?string $title = null,
		public ?float $issueNumber = null,
		public ?string $variantDescription = null,
		public ?string $description = null,
		public ?string $modified = null,
		public ?string $isbn = null,
		public ?string $upc = null,
		public ?string $diamondCode = null,
		public ?string $ean = null,
		public ?string $issn = null,
		public ?string $format = null,
		public ?int $pageCount = null,
		public ?array $textObjects = null,
		public ?string $resourceUri = null,
		public ?array $urls = null,
		public ?SeriesSummary $series = null,
		public ?array $variants = null,
		public ?array $collections = null,
		public ?array $collectedIssues = null,
		public ?array $dates = null,
		public ?array $prices = null,
		public ?Image $thumbnail = null,
		public ?array $images = null,
		public ?CreatorList $creators = null,
		public ?CharacterList $characters = null,
		public ?StoryList $stories = null,
		public ?EventList $events = null,
	) {
	}
}
