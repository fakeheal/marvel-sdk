<?php



declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class SeriesSummary extends Dto
{
	protected static array $attributeMap = ['resourceUri' => 'resourceURI'];


	/**
	 * @param ?string $resourceUri The path to the individual series resource.
	 * @param ?string $name The canonical name of the series.
	 */
	public function __construct(
		public ?string $resourceUri = null,
		public ?string $name = null,
	) {
	}
}
