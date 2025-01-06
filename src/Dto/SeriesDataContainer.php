<?php



declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class SeriesDataContainer extends Dto
{
	protected static array $complexArrayTypes = ['results' => Series::class];


	/**
	 * @param ?int $offset
	 * @param ?int $limit
	 * @param ?int $total
	 * @param ?int $count
	 * @param Series[]|null $results
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
