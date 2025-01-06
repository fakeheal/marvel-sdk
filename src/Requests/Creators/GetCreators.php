<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Creators;

use Chronoarc\Marvel\Dto\EventDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use DateTimeInterface;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getCreatorCollection
 *
 * Fetches lists of comic creators with optional filters. See notes on individual parameters below.
 */
class GetCreators extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param ?string $firstName Filter by creator first name (e.g. Brian).
     * @param ?string $middleName Filter by creator middle name (e.g. Michael).
     * @param ?string $lastName Filter by creator last name (e.g. Bendis).
     * @param ?string $suffix Filter by suffix or honorific (e.g. Jr., Sr.).
     * @param ?string $nameStartsWith Filter by creator names that match critera (e.g. B, St L).
     * @param ?string $firstNameStartsWith Filter by creator first names that match critera (e.g. B, St L).
     * @param ?string $middleNameStartsWith Filter by creator middle names that match critera (e.g. Mi).
     * @param ?string $lastNameStartsWith Filter by creator last names that match critera (e.g. Ben).
     * @param ?DateTimeInterface $modifiedSince Return only creators which have been modified since the specified date.
     * @param ?array $comics Return only creators who worked on in the specified comics.
     * @param ?array $series Return only creators who worked on the specified series.
     * @param ?array $events Return only creators who worked on comics that took place in the specified events.
     * @param ?array $stories Return only creators who worked on the specified stories.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function __construct(
        protected ?string            $firstName = null,
        protected ?string            $middleName = null,
        protected ?string            $lastName = null,
        protected ?string            $suffix = null,
        protected ?string            $nameStartsWith = null,
        protected ?string            $firstNameStartsWith = null,
        protected ?string            $middleNameStartsWith = null,
        protected ?string            $lastNameStartsWith = null,
        protected ?DateTimeInterface $modifiedSince = null,
        protected ?array             $comics = null,
        protected ?array             $series = null,
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
        return "/creators";
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
     * @return array
     */
    public function defaultQuery(): array
    {
        return array_filter([
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'suffix' => $this->suffix,
            'nameStartsWith' => $this->nameStartsWith,
            'firstNameStartsWith' => $this->firstNameStartsWith,
            'middleNameStartsWith' => $this->middleNameStartsWith,
            'lastNameStartsWith' => $this->lastNameStartsWith,
            'modifiedSince' => $this->modifiedSince?->format('Y-m-d\TH:i:sP'),
            'comics' => $this->toCsv($this->comics),
            'series' => $this->toCsv($this->series),
            'events' => $this->toCsv($this->events),
            'stories' => $this->toCsv($this->stories),
            'orderBy' => $this->orderBy,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
