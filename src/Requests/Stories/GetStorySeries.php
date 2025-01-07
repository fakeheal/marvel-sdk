<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Stories;

use Chronoarc\Marvel\Dto\Series\SeriesDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use DateTimeInterface;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getStorySeriesCollection
 *
 * Fetches lists of comic series in which the specified story takes place. See notes on individual
 * parameters below.
 */
class GetStorySeries extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $storyId The story ID.
     * @param ?array $events Return only series which have comics that take place during the specified events.
     * @param ?string $title Filter by series title.
     * @param ?string $titleStartsWith Return series with titles that begin with the specified string (e.g. Sp).
     * @param ?int $startYear Return only series matching the specified start year.
     * @param ?DateTimeInterface $modifiedSince Return only series which have been modified since the specified date.
     * @param ?array $comics Return only series which contain the specified comics.
     * @param ?array $creators Return only series which feature work by the specified creators.
     * @param ?array $characters Return only series which feature the specified characters.
     * @param ?string $seriesType Filter the series by publication frequency type.
     * @param ?array $contains Return only series containing one or more comics with the specified format.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function __construct(
        protected int                $storyId,
        protected ?array             $events = null,
        protected ?string            $title = null,
        protected ?string            $titleStartsWith = null,
        protected ?int               $startYear = null,
        protected ?DateTimeInterface $modifiedSince = null,
        protected ?array             $comics = null,
        protected ?array             $creators = null,
        protected ?array             $characters = null,
        protected ?string            $seriesType = null,
        protected ?array             $contains = null,
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
        return "/stories/$this->storyId/series";
    }

    /**
     * @param Response $response
     * @return SeriesDataWrapper
     * @throws InvalidAttributeTypeException
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): SeriesDataWrapper
    {
        return SeriesDataWrapper::fromJson($response->json());
    }

    /**
     * @return array|string[]
     */
    public function defaultQuery(): array
    {
        return array_filter([
            'events' => $this->toCsv($this->events),
            'title' => $this->title,
            'titleStartsWith' => $this->titleStartsWith,
            'startYear' => $this->startYear,
            'modifiedSince' => $this->modifiedSince?->format('Y-m-d\TH:i:sP'),
            'comics' => $this->toCsv($this->comics),
            'creators' => $this->toCsv($this->creators),
            'characters' => $this->toCsv($this->characters),
            'seriesType' => $this->seriesType,
            'contains' => $this->contains,
            'orderBy' => $this->orderBy,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
