<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Events;

use Chronoarc\Marvel\Dto\StoryDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use DateTimeInterface;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getEventStoryCollection
 *
 * Fetches lists of comic stories from a specific event, with optional filters. See notes on individual
 * parameters below.
 */
class GetEventStories extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $eventId The ID of the event.
     * @param ?DateTimeInterface $modifiedSince Return only stories which have been modified since the specified date.
     * @param ?array $comics Return only stories contained in the specified.
     * @param ?array $series Return only stories contained the specified series.
     * @param ?array $creators Return only stories which feature work by the specified creators.
     * @param ?array $characters Return only stories which feature the specified characters.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function __construct(
        protected int                $eventId,
        protected ?DateTimeInterface $modifiedSince = null,
        protected ?array             $comics = null,
        protected ?array             $series = null,
        protected ?array             $creators = null,
        protected ?array             $characters = null,
        protected ?array             $orderBy = null,
        protected ?int               $limit = null,
        protected ?int               $offset = null,
    )
    {
    }

    /**
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/events/$this->eventId/stories";
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
            'comics' => $this->toCsv($this->comics),
            'series' => $this->toCsv($this->series),
            'creators' => $this->toCsv($this->creators),
            'characters' => $this->toCsv($this->characters),
            'orderBy' => $this->orderBy,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
