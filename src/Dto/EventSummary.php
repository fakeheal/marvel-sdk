<?php



declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class EventSummary extends Dto
{
	protected static array $attributeMap = ['resourceUri' => 'resourceURI'];


	/**
	 * @param ?string $resourceUri The path to the individual event resource.
	 * @param ?string $name The name of the event.
	 */
	public function __construct(
		public ?string $resourceUri = null,
		public ?string $name = null,
	) {
	}
}
