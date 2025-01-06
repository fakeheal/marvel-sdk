<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class ComicDataContainer extends Dto
{
	protected static array $complexArrayTypes = ['results' => Comic::class];


	/**
	 * @param ?int $offset
	 * @param ?int $limit
	 * @param ?int $total
	 * @param ?int $count
	 * @param Comic[]|null $results
	 */
	public function __construct(
		public ?int $offset = null,
		public ?int $limit = null,
		public ?int $total = null,
		public ?int $count = null,
		public ?array $results = null,
	) {
	}
}