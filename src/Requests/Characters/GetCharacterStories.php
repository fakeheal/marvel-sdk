<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Characters;

use Chronoarc\Marvel\Dto\StoryDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use DateTimeInterface;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getCharacterStoryCollection
 *
 * Fetches lists of comic stories  featuring a specific character with optional filters. See notes on
 * individual parameters below.
 */
class GetCharacterStories extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $characterId The character ID.
     * @param ?DateTimeInterface $modifiedSince Return only stories which have been modified since the specified date.
     * @param ?array $comics Return only stories contained in the specified
     * @param ?array $series Return only stories contained the specified series
     * @param ?array $events Return only stories which take place during the specified events
     * @param ?array $creators Return only stories which feature work by the specified creators
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function __construct(
        protected int                $characterId,
        protected ?DateTimeInterface $modifiedSince = null,
        protected ?array             $comics = null,
        protected ?array             $series = null,
        protected ?array             $events = null,
        protected ?array             $creators = null,
        protected ?array             $orderBy = null,
        protected ?int               $limit = null,
        protected ?int               $offset = null,
    )
    {
    }


    public function resolveEndpoint(): string
    {
        return "/characters/$this->characterId/stories";
    }

    /**
     * @param Response $response
     * @return StoryDataWrapper
     * @throws InvalidAttributeTypeException
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): StoryDataWrapper
    {
        return StoryDataWrapper::fromJson($response->json());
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'modifiedSince' => $this->modifiedSince?->format('Y-m-d\TH:i:sP'),
            'comics' => $this->comics ? implode(',', $this->comics) : null,
            'series' => $this->series ? implode(',', $this->series) : null,
            'events' => $this->events ? implode(',', $this->events) : null,
            'creators' => $this->creators,
            'orderBy' => $this->orderBy,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
