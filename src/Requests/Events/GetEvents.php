<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Events;

use Chronoarc\Marvel\Dto\EventDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use DateTimeInterface;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getEventsCollection
 *
 * Fetches lists of events with optional filters. See notes on individual parameters below.
 */
class GetEvents extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param ?string $name Return only events which match the specified name.
     * @param ?string $nameStartsWith Return events with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only events which have been modified since the specified date.
     * @param ?array $creators Return only events which feature work by the specified creators.
     * @param ?array $characters Return only events which feature the specified characters.
     * @param ?array $series Return only events which are part of the specified series.
     * @param ?array $comics Return only events which take place in the specified comics.
     * @param ?array $stories Return only events which take place in the specified stories.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function __construct(
        protected ?string            $name = null,
        protected ?string            $nameStartsWith = null,
        protected ?DateTimeInterface $modifiedSince = null,
        protected ?array             $creators = null,
        protected ?array             $characters = null,
        protected ?array             $series = null,
        protected ?array             $comics = null,
        protected ?array             $stories = null,
        protected ?array             $orderBy = null,
        protected ?int               $limit = null,
        protected ?int               $offset = null,
    )
    {
    }


    public function resolveEndpoint(): string
    {
        return "/events";
    }


    /**
     * @param Response $response
     * @return EventDataWrapper
     * @throws InvalidAttributeTypeException
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): EventDataWrapper
    {
        return EventDataWrapper::fromJson($response->json());
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
            'creators' => $this->toCsv($this->creators),
            'characters' => $this->toCsv($this->characters),
            'series' => $this->toCsv($this->series),
            'comics' => $this->toCsv($this->comics),
            'stories' => $this->toCsv($this->stories),
            'orderBy' => $this->orderBy,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
