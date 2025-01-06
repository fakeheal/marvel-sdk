<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Comics;

use Chronoarc\Marvel\Dto\CharacterDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getComicCharacterCollection
 *
 * Fetches lists of characters which appear in a specific comic with optional filters. See notes on
 * individual parameters below.
 */
class GetComicCharacters extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $comicId The comic id.
     * @param ?string $name Return only characters matching the specified full character name (e.g. Spider-Man).
     * @param ?string $nameStartsWith Return characters with names that begin with the specified string (e.g. Sp).
     * @param ?\DateTimeInterface $modifiedSince Return only characters which have been modified since the specified date.
     * @param ?array $series Return only characters which appear the specified series
     * @param ?array $events Return only characters which appear comics that took place in the specified events
     * @param ?array $stories Return only characters which appear the specified stories
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function __construct(
        protected int                 $comicId,
        protected ?string             $name = null,
        protected ?string             $nameStartsWith = null,
        protected ?\DateTimeInterface $modifiedSince = null,
        protected ?array              $series = null,
        protected ?array              $events = null,
        protected ?array              $stories = null,
        protected ?array              $orderBy = null,
        protected ?int                $limit = null,
        protected ?int                $offset = null,
    )
    {
    }


    public function resolveEndpoint(): string
    {
        return "/comics/$this->comicId/characters";
    }


    /**
     * @param Response $response
     * @return CharacterDataWrapper
     * @throws InvalidAttributeTypeException
     * @throws \JsonException
     */
    public function createDtoFromResponse(Response $response): CharacterDataWrapper
    {
        return CharacterDataWrapper::fromJson($response->json());
    }


    public function defaultQuery(): array
    {
        return array_filter([
            'name' => $this->name,
            'nameStartsWith' => $this->nameStartsWith,
            'modifiedSince' => $this->modifiedSince?->format('Y-m-d\TH:i:sP'),
            'series' => $this->series ? implode(',', $this->series) : null,
            'events' => $this->events ? implode(',', $this->events) : null,
            'stories' => $this->stories ? implode(',', $this->stories) : null,
            'orderBy' => $this->orderBy,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
