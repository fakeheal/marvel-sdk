<?php



declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class ComicSummary extends Dto
{
	protected static array $attributeMap = ['resourceUri' => 'resourceURI'];


	/**
	 * @param ?string $resourceUri The path to the individual comic resource.
	 * @param ?string $name The canonical name of the comic.
	 */
	public function __construct(
		public ?string $resourceUri = null,
		public ?string $name = null,
	) {
	}
}
