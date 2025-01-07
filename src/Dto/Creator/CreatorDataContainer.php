<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Dto\Creator;

use Chronoarc\Marvel\Dto;

final class CreatorDataContainer extends Dto
{
    protected static array $complexArrayTypes = ['results' => Creator::class];


    /**
     * @param ?int $offset
     * @param ?int $limit
     * @param ?int $total
     * @param ?int $count
     * @param Creator[]|null $results
     */
    public function __construct(
        public ?int   $offset = null,
        public ?int   $limit = null,
        public ?int   $total = null,
        public ?int   $count = null,
        public ?array $results = null,
    )
    {
    }
}
