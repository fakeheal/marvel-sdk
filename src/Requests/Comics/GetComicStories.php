<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Comics;

use Chronoarc\Marvel\Dto\StoryDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use DateTimeInterface;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getComicStoryCollection
 *
 * Fetches lists of comic stories in a specific comic issue, with optional filters. See notes on
 * individual parameters below.
 */
class GetComicStories extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $comicId The comic ID.
     * @param ?DateTimeInterface $modifiedSince Return only stories which have been modified since the specified date.
     * @param ?array $series Return only stories contained the specified series
     * @param ?array $events Return only stories which take place during the specified events
     * @param ?array $creators Return only stories which feature work by the specified creators
     * @param ?array $characters Return only stories which feature the specified characters
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources.
     */
    public function __construct(
        protected int                $comicId,
        protected ?DateTimeInterface $modifiedSince = null,
        protected ?array             $series = null,
        protected ?array             $events = null,
        protected ?array             $creators = null,
        protected ?array             $characters = null,
        protected ?array             $orderBy = null,
        protected ?int               $limit = null,
        protected ?int               $offset = null,
    )
    {
    }


    public function resolveEndpoint(): string
    {
        return "/comics/$this->comicId/stories";
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
            'series' => $this->series ? implode(',', $this->series) : null,
            'events' => $this->events ? implode(',', $this->events) : null,
            'creators' => $this->creators ? implode(',', $this->creators) : null,
            'characters' => $this->characters ? implode(',', $this->characters) : null,
            'orderBy' => $this->orderBy,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
