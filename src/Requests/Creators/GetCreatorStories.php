<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Creators;

use Chronoarc\Marvel\Dto\Story\StoryDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use DateTimeInterface;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getCreatorStoryCollection
 *
 * Fetches lists of comic stories by a specific creator with optional filters. See notes on individual
 * parameters below.
 */
class GetCreatorStories extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $creatorId The ID of the creator.
     * @param ?DateTimeInterface $modifiedSince Return only stories which have been modified since the specified date.
     * @param ?array $comics Return only stories contained in the specified comics.
     * @param ?array $series Return only stories contained the specified series.
     * @param ?array $events Return only stories which take place during the specified events.
     * @param ?array $characters Return only stories which feature the specified characters.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function __construct(
        protected int                $creatorId,
        protected ?DateTimeInterface $modifiedSince = null,
        protected ?array             $comics = null,
        protected ?array             $series = null,
        protected ?array             $events = null,
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
        return "/creators/$this->creatorId/stories";
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

    /**
     * @return array|string[]
     */
    public function defaultQuery(): array
    {
        return array_filter([
            'modifiedSince' => $this->modifiedSince?->format('Y-m-d\TH:i:sP'),
            'comics' => $this->toCsv($this->comics),
            'series' => $this->toCsv($this->series),
            'events' => $this->toCsv($this->events),
            'characters' => $this->toCsv($this->characters),
            'orderBy' => $this->orderBy,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
