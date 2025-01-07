<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Series;

use Chronoarc\Marvel\Dto\CharacterDataWrapper;
use Chronoarc\Marvel\Request;
use DateTimeInterface;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getSeriesCharacterWrapper
 *
 * Fetches lists of characters which appear in specific series, with optional filters. See notes on
 * individual parameters below.
 */
class GetSeriesCharacters extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $seriesId The series id.
     * @param ?string $name Return only characters matching the specified full character name (e.g. Spider-Man).
     * @param ?string $nameStartsWith Return characters with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only characters which have been modified since the specified date.
     * @param ?array $comics Return only characters which appear in the specified comics (accepts a comma-separated list of ids).
     * @param ?array $events Return only characters which appear comics that took place in the specified events (accepts a comma-separated list of ids).
     * @param ?array $stories Return only characters which appear the specified stories (accepts a comma-separated list of ids).
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function __construct(
        protected int                $seriesId,
        protected ?string            $name = null,
        protected ?string            $nameStartsWith = null,
        protected ?DateTimeInterface $modifiedSince = null,
        protected ?array             $comics = null,
        protected ?array             $events = null,
        protected ?array             $stories = null,
        protected ?array             $orderBy = null,
        protected ?int               $limit = null,
        protected ?int               $offset = null,
    )
    {
    }


    public function resolveEndpoint(): string
    {
        return "/series/$this->seriesId/characters";
    }

    /**
     * @param Response $response
     * @return CharacterDataWrapper
     */
    public function createDtoFromResponse(Response $response): CharacterDataWrapper
    {
        return CharacterDataWrapper::fromJson($response->json());
    }

    /**
     * @return array|string[]
     */
    public function defaultQuery(): array
    {
        return array_filter([
            'name' => $this->name,
            'nameStartsWith' => $this->nameStartsWith,
            'modifiedSince' => $this->modifiedSince?->format('Y-m-d\TH:i:sP'),
            'comics' => $this->toCsv($this->comics),
            'events' => $this->toCsv($this->events),
            'stories' => $this->toCsv($this->stories),
            'orderBy' => $this->orderBy,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
