<?php



declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class EventList extends Dto
{
	protected static array $attributeMap = ['collectionUri' => 'collectionURI'];
	protected static array $complexArrayTypes = ['items' => EventSummary::class];


	/**
	 * @param ?int $available
	 * @param ?int $returned
	 * @param ?string $collectionUri The path to the full list of events in this collection.
	 * @param EventSummary[]|null $items
	 */
	public function __construct(
		public ?int $available = null,
		public ?int $returned = null,
		public ?string $collectionUri = null,
		public ?array $items = null,
	) {
	}
}
